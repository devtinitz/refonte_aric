<x-site.layout>
    <x-slot:title>Efficacité Énergétique | ARIC Solutions</x-slot>

    @foreach($sections as $section)
        @include('sections.sub-expertise.efficacite.' . $section->key)
    @endforeach

</x-site.layout>
