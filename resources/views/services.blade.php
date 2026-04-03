<x-site.layout>
    <x-slot:title>Nos Services | ARIC Solutions</x-slot>

    @foreach($sections as $section)
        @include('sections.services.' . $section->key)
    @endforeach

</x-site.layout>
