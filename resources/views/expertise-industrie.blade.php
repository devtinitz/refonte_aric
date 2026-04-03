<x-site.layout>
    <x-slot:title>Froid Commercial & Industriel | ARIC Solutions</x-slot>

    @foreach($sections as $section)
        @include('sections.sub-expertise.industrie.' . $section->key)
    @endforeach

</x-site.layout>
