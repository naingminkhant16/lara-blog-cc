<x-layout>
    <!-- singloe blog section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="text-center">
                    <img src="{{asset('storage/'.$blog->thumbnail)}}" class="mt-3 card-img-top" alt="..." />
                    <h3 class="my-3">{{$blog->title}}</h3>
                    <div class="">
                        <div class="">Author - <a href="/users/{{$blog->author->username}}">{{$blog->author->name}}</a>
                        </div>
                        <div class="badge bg-danger rounded my-2">
                            <a class="text-light text-decoration-none"
                                href="/categories/{{$blog->category->slug}}">{{$blog->category->name}}</a>
                        </div>
                        <div class="text-black-50">{{$blog->created_at->diffForHumans()}}</div>
                        @auth
                        <div class="">
                            <form action="/blogs/{{$blog->slug}}/subscription" method="POST">
                                @csrf
                                @if (Auth::user()->isSubscribed($blog))
                                <button class="btn btn-danger">Unubscribe</button>
                                @else
                                <button class="btn btn-warning">Subscribe</button>
                                @endif
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
                <p class="lh-md mt-3">
                    {!!$blog->body!!}
                </p>
            </div>
        </div>
    </div>
    {{-- comment form --}}
    <x-comment-form :blog="$blog" />

    @if ($blog->comments()->count())
    <x-comments :comments="$blog->comments()->latest()->paginate(3)" />
    @endif


    <x-blogs_you_may_like :randomBlogs="$randomBlogs" />

</x-layout>
