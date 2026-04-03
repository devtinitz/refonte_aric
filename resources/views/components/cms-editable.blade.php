@props([
    'key',
    'type' => 'text',
    'metadata' => [],
    'buttonClass' => null,
    'class' => '',
    'positionClass' => 'relative'
])
@php
    if ($buttonClass === null) {
        $buttonClass = ($type === 'image' || $type === 'video' || $type === 'media') 
            ? 'top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2' 
            : '-top-4 -right-4';
    }

    // Prévenir les conflits de positionnement (ex: si le composant est déjà 'absolute', on ne met pas 'relative')
    if (preg_match('/\b(absolute|relative|fixed|sticky)\b/', $class)) {
        $positionClass = '';
    }

    $content = \App\Models\Content::where('key', $key)->first();
    $displayValue = $content && $content->current_display_value 
        ? $content->current_display_value->value 
        : $slot;
    $isAdmin = auth()->check();
@endphp

<div id="cms-editable-{{ Str::slug($key) }}" 
     class="cms-editable {{ $positionClass }} group/cms {{ $class }}"
     data-cms-key="{{ $key }}"
     data-cms-type="{{ $type }}"
     data-cms-metadata="{{ json_encode($metadata) }}">
    
    <div class="cms-inner-content">
        @if(($type === 'image' || $type === 'video' || $type === 'media') && $content && $content->current_display_value)
            @php
                $url = $content->current_display_value->value;
                $slotStr = (string)$slot;
                
                $ext = strtolower(pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION));
                $isVideoUrl = in_array($ext, ['mp4', 'webm', 'ogg', 'mov', 'avi', 'wmv', 'mkv']);
                $isImageUrl = in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg']);
                
                if ($isVideoUrl && preg_match('/<img[^>]*>/i', $slotStr)) {
                    preg_match('/<img[^>]*class=["\']([^"\']*)["\']/i', $slotStr, $classMatches);
                    $classes = $classMatches[1] ?? '';
                    $videoTag = '<video autoplay muted loop playsinline class="' . $classes . '"><source src="' . $url . '"></video>';
                    $output = preg_replace('/<img[^>]*>/i', $videoTag, $slotStr);
                } elseif ($isImageUrl && preg_match('/<video[^>]*>/i', $slotStr)) {
                    preg_match('/<video[^>]*class=["\']([^"\']*)["\']/i', $slotStr, $classMatches);
                    $classes = $classMatches[1] ?? '';
                    $imgTag = '<img src="' . $url . '" class="' . $classes . '" alt="">';
                    $output = preg_replace('/<video[^>]*>.*?<\/video>/is', $imgTag, $slotStr);
                } else {
                    $pattern = '/(src=["\'])([^"\']*)(["\'])/i';
                    $replacement = '$1' . $url . '$3';
                    
                    if (preg_match($pattern, $slotStr)) {
                        $output = preg_replace($pattern, $replacement, $slotStr);
                        // Si on remplace une vidéo, on doit aussi mettre à jour ou supprimer le type MIME pour éviter les conflits (ex: type="video/mp4" pour un .webm)
                        if ($isVideoUrl) {
                            $mimeType = 'video/' . ($ext === 'mov' ? 'quicktime' : $ext);
                            // Chercher et remplacer l'attribut type existant (s'il y en a un)
                            if (preg_match('/type=["\']video\/[^"\']*["\']/i', $output)) {
                                $output = preg_replace('/type=["\']video\/[^"\']*["\']/i', 'type="' . $mimeType . '"', $output);
                            }
                        }
                    } else {
                        // FALLBACK: No tag found in slot, create one
                        if ($isVideoUrl) {
                            $mimeType = 'video/' . ($ext === 'mov' ? 'quicktime' : $ext);
                            $output = '<video autoplay muted loop playsinline class="w-full h-full object-cover"><source src="' . $url . '" type="' . $mimeType . '"></video>';
                        } else {
                            $output = '<img src="' . $url . '" class="w-full h-full object-cover" alt="">';
                        }
                    }
                }
            @endphp
            {!! $output !!}
        @elseif($type === 'icon' && $content && $content->current_display_value)
            @php
                $iconName = $content->current_display_value->value;
                $pattern = '/(data-lucide=["\'])([^"\']*)(["\'])/i';
                $slotStr = (string)$slot;
                
                if (preg_match($pattern, $slotStr)) {
                    $replacement = '$1' . $iconName . '$3';
                    $output = preg_replace($pattern, $replacement, $slotStr);
                } else {
                    $output = '<i data-lucide="' . $iconName . '"></i>';
                }
            @endphp
            {!! $output !!}
        @else
            {!! $displayValue !!}
        @endif
    </div>

    @if($isAdmin)
        <button class="cms-edit-btn absolute {{ $buttonClass }} min-w-[32px] h-8 px-3 rounded-full bg-tech-cyan text-tech-navy opacity-0 group-hover/cms:opacity-100 group-hover/section:opacity-100 transition-all shadow-lg flex items-center justify-center z-[2000] hover:scale-110 active:scale-95 group/btn" 
                title="Éditer : {{ $key }}"
                data-cms-trigger="{{ $key }}"
                data-cms-trigger-type="{{ $type }}">
            <i data-lucide="{{ $type === 'video' ? 'video' : ($type === 'image' ? 'image' : ($type === 'media' ? 'film' : 'pencil')) }}" class="w-4 h-4"></i>
            <span class="max-w-0 overflow-hidden group-hover/btn:max-w-xs group-hover/btn:ml-2 transition-all duration-300 text-[9px] font-black uppercase tracking-widest whitespace-nowrap">
                Modifier {{ $type === 'video' ? 'vidéo' : ($type === 'image' ? 'image' : ($type === 'media' ? 'image / vidéo' : 'texte')) }}
            </span>
        </button>
        
        <style>
            .cms-editable:hover {
                outline: 2px dashed #00a4bd;
                outline-offset: 4px;
                border-radius: 4px;
            }
            /* Live Mode overrides */
            .cms-mode-live .cms-edit-btn {
                display: none !important;
            }
            .cms-mode-live .cms-editable:hover {
                outline: none !important;
            }
        </style>
    @endif
</div>
