@props(['blogs','categories','currentCategory'])
<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <div class="">
        <div class="dropdown">
            <button class="btn  btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{isset($currentCategory)?$currentCategory->name:" Filter By Categories";}}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach ($categories as $cat)
                <li><a class="dropdown-item" href="/categories/{{$cat->slug}}">{{$cat->name}}</a></li>
                @endforeach
            </ul>
        </div>
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



    </div>
</section>