@props(['comment'])
<div class="p-3 my-3 border shadow-sm">
    <div class="d-flex mb-3">
        <div class="">
            <img src="https://sf.ezoiccdn.com/ezoimgfmt/kpopmembersbio.com/wp-content/uploads/2021/06/momo-768x576.jpg?ezimgfmt=ng:webp/ngcb1"
                height="50" width="50" class="rounded-circle" alt="">
        </div>
        <div class="ms-3">
            <h6 class="mb-0">{{$comment->author->name}}</h6>
            <small class="text-black-50">{{$comment->created_at->diffForHumans()}}</small>
        </div>
    </div>
    <p class="mt-1">
        {{$comment->body}}
    </p>
</div>
