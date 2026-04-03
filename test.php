<?php
$slotStr = '        <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover">
            <source src="/aric-hero.mp4" type="video/mp4">
        </video>';
$url = '/storage/cms/video-sur-la-cote-d-ivoire-generee-1775206885.mp4';
$pattern = '/(src=["\'])([^"\']*)(["\'])/i';
$replacement = '$1' . $url . '$3';
$output = preg_replace($pattern, $replacement, $slotStr);
echo $output;
