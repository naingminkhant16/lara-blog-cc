<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex">
            <a href="/#blogs" class="nav-link">Blogs</a>

            @auth
            <a href="" class="nav-link">Welcome {{auth()->user()->name}}</a>
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-link" type="submit">Logout</button>
            </form>
            @else
            <a href="/login" class="nav-link">Login</a>
            <a href="/register" class="nav-link">Register</a>
            @endauth

            <a href="#subscribe" class="nav-link">Subscribe</a>
        </div>
    </div>
</nav>
