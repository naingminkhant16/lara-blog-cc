<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card shadow-sm my-3">
                    <div class="p-4 mx-5">
                        <h2 class="mb-3 text-primary text-center">Login</h2>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">

                                @foreach ($errors->all() as $error )
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email')
                                is-invalid
                            @enderror" id="email" value="{{old('email')}}" name="email">
                                @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control  @error('password')
                                is-invalid
                            @enderror" id="password" value="" name="password">
                                @error('password')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
