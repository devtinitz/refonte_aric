<x-site.layout>
    <x-slot:title>ARIC | Expert en Solutions Multitechniques & Énergétiques</x-slot>

    @foreach($sections as $section)
        @include('sections.' . $section->key)
    @endforeach

</x-site.layout>
