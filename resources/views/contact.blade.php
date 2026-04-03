<x-site.layout>
    <x-slot:title>Contact | ARIC Solutions</x-slot>

    @foreach($sections as $section)
        @include('sections.contact.' . $section->key)
    @endforeach

</x-site.layout>
