@extends('frontend.layout.main')
@section('main-container')
    {{-- <div class="container-xxl position-relative bg-white d-flex p-0">
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-headphones me-2"></i>DASHMIN</h3>
                            </a>
                            <h3 class="text-primary">Sign in</h3>
                        </div>
                        <hr>
                        <div class="card-body">







                                <div class="row mb-4">
                                    <label for="avatar" class="col-md-4 col-form-label">Image</label>


                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="bg-light rounded p-4 m-2 mb-0">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-9 p-3">

                    <h4 class="mb-4">Add a User</h4>

                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('addUser') }}">
                                @csrf

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Full name</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Email address</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Password</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Confirm Password</h6>

                                    </div>

                                    <div class="col-md-9 pe-5">

                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">

                                    </div>
                                </div>
                                <hr class="mx-n3">
                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Phone</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input id="phone" type="number" class="form-control" name="phone">
                                    </div>
                                </div>
                                <hr class="mx-n3">
                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Select role</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <select name="role" size="1" class="form-select" id="role">
                                            @foreach (Spatie\Permission\Models\Role::all() as $role)
                                                @if ($role->name == 'Admin')
                                                    {
                                                    @continue
                                                }@else{
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    }
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Upload CV</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <div class="col-md-12">
                                            <input id="avatar" type="file" class="form-control" name="avatar"
                                                required>
                                        </div>
                                        <div class="small text-muted mt-2">Upload your avatar
                                        </div>

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="px-5 py-4">
                                    <button type="submit" class="btn btn-primary btn-lg">Add user</button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection()
