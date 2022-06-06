<x-layout>
    <x-slot name="title">
        <title>BLOGS</title>
    </x-slot>
    {{-- <x-slot name="content"> --}}
        @foreach ($blogs as $blog)
        {{-- @dd($loop) --}}
        <div>
            <h1>
                <a href="/blogs/{{$blog->slug}}">
                    {{$blog->title}}
                </a>
            </h1>
            <h4>Author -<a href="/users/{{$blog->author->username}}">{{$blog->author->name}}</a></h4>
            <div>
                <p>Category - <a href="/categories/{{$blog->category->slug}}">{{$blog->category->name}}</a></p>
                <p>
                    Published at -
                    {{$blog->created_at->diffForHumans()}}
                </p>
                <p>
                    {{$blog->intro}}
                </p>
            </div>
        </div>
        @endforeach
        {{-- @php
        $bs=new App\Models\Blog;
        dd($bs->find(1))
        @endphp --}}
        {{--
    </x-slot> --}}
</x-layout>