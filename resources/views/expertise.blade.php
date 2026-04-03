<x-site.layout>
    <x-slot:title>Notre Expertise | ARIC Solutions</x-slot>

    @foreach($sections as $section)
        @include('sections.expertise.' . $section->key)
    @endforeach

</x-site.layout>
