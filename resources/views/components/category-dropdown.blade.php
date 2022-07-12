<div class="dropdown">
    <button class="btn  btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
        data-bs-toggle="dropdown" aria-expanded="false">
        {{isset($currentCategory)?$currentCategory->name:" Filter By Categories";}}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li>
            <a class="dropdown-item" href="/">
                All
            </a>
        </li>
        @foreach ($categories as $cat)
        <li>
            <a class="dropdown-item"
                href="/?category={{$cat->slug}}{{request('search') ? '&search=' . request('search') : '' ;}}{{request('username') ? '&username=' . request('username') : '';}}">
                {{$cat->name}}
            </a>
        </li>
        @endforeach
    </ul>
</div>
