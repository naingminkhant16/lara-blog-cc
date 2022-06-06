<x-layout>
    <x-slot name='title'>
        <title>{{$blog->title}}</title>
    </x-slot>
    <h1>{{$blog->title}}</h1>
    <small>
        {{ $blog->created_at->diffForHumans() }}
    </small>
    <div>
        <p>
            {!!$blog->body!!}
        </p>
    </div>
    <a href="/">Go Back</a>
</x-layout>