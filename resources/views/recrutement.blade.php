<x-site.layout>
    <x-slot:title>Recrutement | ARIC Solutions</x-slot>

    @foreach($sections as $section)
        @include('sections.recrutement.' . $section->key)
    @endforeach

</x-site.layout>