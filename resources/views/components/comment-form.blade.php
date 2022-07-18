@props(['blog'])
<section class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            @auth
            <x-card-wrapper>
                <form action="/blogs/{{$blog->slug}}/comments" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea name="comment" class="form-control border-0" id="" cols="10" rows="5"
                            placeholder="Say Something..."></textarea>
                        <x-error name='comment' />
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class=" btn btn-primary">Submit</button>
                    </div>
                </form>
            </x-card-wrapper>
            @else
            <p class="text-center">Please
                <a href="/login">
                    login
                </a>
                to comment!
            </p>

            @endauth
        </div>
    </div>
</section>
