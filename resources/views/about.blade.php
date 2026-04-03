<x-site.layout>
    <x-slot:title>Qui sommes-nous | ARIC Solutions</x-slot>

    @foreach($sections as $section)
        @include('sections.about.' . $section->key)
    @endforeach

</x-site.layout>
