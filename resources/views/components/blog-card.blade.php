@props(['blog'])
<div class="card">
    <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
        class="card-img-top" alt="..." />
    <div class="card-body">
        <h3 class="card-title">{{$blog->title}}</h3>
        <p class="fs-6 text-secondary">
            <a href="/?username={{$blog->author->username}}"> {{$blog->author->name}}</a>
            <span> - {{$blog->created_at->diffForHumans()}}</span>
        </p>
        <div class="tags my-3">
            <span class="badge bg-danger">
                <a href="/?category={{$blog->category->slug}}"
                    class="text-decoration-none text-light">{{$blog->category->name}}</a>
            </span>
        </div>
        <p class="card-text">
            {{Str::words($blog->body, 20)}}
        </p>
        <a href="/blogs/{{$blog->slug}}" class="btn btn-primary">Read More</a>
    </div>
</div>
