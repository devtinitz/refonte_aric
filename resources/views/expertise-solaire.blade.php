<x-site.layout>
    <x-slot:title>Énergie Solaire | ARIC Solutions</x-slot>

    @foreach($sections as $section)
        @include('sections.sub-expertise.solaire.' . $section->key)
    @endforeach

</x-site.layout>
