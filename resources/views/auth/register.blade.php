<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card shadow-sm my-3">
                    <div class="p-4 mx-5">
                        <h2 class="mb-3 text-primary text-center">Register</h2>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error )
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="/register" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name')
                                    is-invalid
                                @enderror" id="name" value="{{old('name')}}" name="name">
                                <x-error name='name'></x-error>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control @error('username')
                                is-invalid
                            @enderror" id="username" value="{{old('username')}}" name="username">
                                <x-error name='username'></x-error>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email')
                                is-invalid
                            @enderror" id="email" value="{{old('email')}}" name="email">
                                <x-error name='email'></x-error>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control  @error('password')
                                is-invalid
                            @enderror" id="password" value="" name="password">
                                <x-error name='password'></x-error>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
