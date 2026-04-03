<x-site.layout>
    <x-slot:title>Milieu Santé | ARIC Solutions</x-slot>

    @foreach($sections as $section)
        @include('sections.sub-expertise.sante.' . $section->key)
    @endforeach

</x-site.layout>
