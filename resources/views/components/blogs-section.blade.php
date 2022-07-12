@props(['blogs'])
<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <div class="">
        <x-category-dropdown />
        {{-- <select onchange="location.href=this.value" class="p-1 rounded-pill">
            <option value="/categories/first-link">First Link</option>
            <option value="/categories/second-link">second Link</option>
            <option value="/categories/third-link">third Link</option>
            <option value="/categories/fourth-link">fourth Link</option>
        </select> --}}
        {{-- <select name="" id="" class="p-1 rounded-pill mx-3">
            <option value="">Filter by Tag</option>
        </select> --}}
    </div>
    <form action="" class="my-3">
        <div class="input-group mb-3">
            <input name="search" type="text" autocomplete="false" class="form-control" value="{{request('search')}}"
                placeholder="Search Blogs..." />
            @if(request('category'))
            <input name="category" type="hidden" value="{{request('category')}}" />
            @endif

            @if(request('username'))
            <input name="username" type="hidden" value="{{request('username')}}" />
            @endif
            <button class="input-group-text bg-primary text-light" id="basic-addon2" type="submit">
                Search
            </button>
        </div>
    </form>
    <div class="row">

        @forelse ($blogs as $blog)
        <div class="col-md-4 mb-4">
            <x-blog-card :blog="$blog" />
        </div>
        @empty
        <h4 class="text-center my-4">No Blogs Found!</h4>
        @endforelse ($blogs as $blog)

        <div class="">
            {{$blogs->links()}}
        </div>

    </div>
</section>
