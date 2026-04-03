<x-site.layout>
    <x-slot:title>Génie Climatique (CVC) | ARIC Solutions</x-slot>

    @foreach($sections as $section)
        @include('sections.sub-expertise.tertiaire.' . $section->key)
    @endforeach

</x-site.layout>
