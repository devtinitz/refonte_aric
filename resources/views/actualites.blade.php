<x-site.layout>
    <x-slot:title>Actualités & Références | ARIC Solutions</x-slot>

    @foreach($sections as $section)
        @include('sections.actualites.' . $section->key)
    @endforeach

</x-site.layout>
