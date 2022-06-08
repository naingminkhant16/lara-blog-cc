<x-layout>
    <x-hero />
    <x-blogs-section :blogs="$blogs" :cats="$categories" :currentCategory="$currentCategory??null" />
    < <x-subscribe />
</x-layout>