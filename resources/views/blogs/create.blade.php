<x-layout>
    <h1 class="my-3 text-center">
        Create Blog
    </h1>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <x-card-wrapper>
                <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-form.input name='title' />
                    <x-form.input name='slug' />
                    <x-form.input name='intro' />
                    <x-form.textarea name='body' />
                    <x-form.input name='thumbnail' type='file' />
                    <div class="mb-3">
                        <x-form.label name='category' />
                        <select name="category_id" id="category" class="form-select">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{old('category_id')==$category->id?'selected':'';}}>
                                {{$category->name}}</option>
                            @endforeach
                        </select>
                        <x-error name="category_id"></x-error>
                    </div>
                    <button class="btn btn-primary" type="submit">Upload</button>
                </form>
            </x-card-wrapper>
        </div>
    </div>
</x-layout>
