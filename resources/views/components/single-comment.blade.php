@props(['comment'])
<x-card-wrapper>
    <div class=" d-flex mb-3">
        <div class="">
            <img src="{{$comment->author->avatar}}" height="50" width="50" class="rounded-circle" alt="">
        </div>
        <div class="ms-3">
            <h6 class="mb-0">{{$comment->author->name}}</h6>
            <small class="text-black-50">{{$comment->created_at->format('d-M-y')}}</small>
        </div>
    </div>
    <p class="mt-1">
        {{$comment->body}}
    </p>
</x-card-wrapper>
