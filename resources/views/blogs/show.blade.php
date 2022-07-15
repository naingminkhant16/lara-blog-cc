<x-layout>
    <!-- singloe blog section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                    class="card-img-top" alt="..." />
                <h3 class="my-3">{{$blog->title}}</h3>
                <div class="">
                    <div class="">Author - <a href="/users/{{$blog->author->username}}">{{$blog->author->name}}</a>
                    </div>
                    <div class="badge bg-danger rounded my-2">
                        <a class="text-light text-decoration-none"
                            href="/categories/{{$blog->category->slug}}">{{$blog->category->name}}</a>
                    </div>
                    <div class="text-black-50">{{$blog->created_at->diffForHumans()}}</div>
                </div>
                <p class="lh-md mt-3">
                    {{$blog->body}}
                </p>
            </div>
        </div>
    </div>
    <x-comments :comments="$blog->comments" />
    <x-subscribe />
    <x-blogs_you_may_like :randomBlogs="$randomBlogs" />

</x-layout>
