<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="mt-5">
                    <div class="list-group w-100">
                        <a href="/admin/blogs" class="list-group-item list-group-item-action">Dashboard</a>
                        <a href="/admin/blogs/create" class="list-group-item list-group-item-action">Create Blog</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="mt-5">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</x-layout>
