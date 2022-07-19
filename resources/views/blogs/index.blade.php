<x-layout>
    @if (session('status'))
    <div class="alert alert-info text-center">
        {{session('status')}}
    </div>
    @endif
    <x-hero />
    <x-blogs-section :blogs="$blogs" />
</x-layout>
