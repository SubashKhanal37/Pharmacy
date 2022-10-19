@extends('frontend.layout.main')
@section('main-container')
    {{-- <div class="col-md-4">
                    <label for="name" class="form-label">Full name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                        id="validationCustom01" required>
                    @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                --}}
    <div class="bg-light rounded p-4 m-2 mb-0">
        <!-- Tabs navs -->


        <!-- Tabs content -->


        <div class="container" style="margin-top: 10px;">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="pill" href="#msg">Edit User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="pill" href="#pro">Change Password</a>
                </li>

            </ul>

            <div class="tab-content mt-3">
                <div class="tab-pane container active" id="msg">
                    <div class="card card-1" style="border-radius: 15px;">
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data"
                                action="{{ route('UpdateUser', $user->id) }}">
                                @csrf
                                @method('put')

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Full name</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ $user->name }}" required autocomplete="name" autofocus>

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
                                            value={{ $user->email }} required autocomplete="email">

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

                                        <h6 class="mb-0">Phone</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input id="phone" type="number" class="form-control"
                                            value="{{ $user->phone }}" name="phone">
                                    </div>
                                </div>
                                <hr class="mx-n3">
                                {{-- <div class="row align-items-center py-3">
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
                                </div> --}}

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
                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <div class="tab-pane container fade" id="pro">
                    <div class="card card-2">
                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                                <h6 class="mb-0">Password</h6>

                            </div>
                            <div class="col-md-9 pe-5">

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div> <br>
                        <form action="">
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">

                                    <h6 class="mb-0">Confirm Password</h6>

                                </div>

                                <div class="col-md-9 pe-5">

                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">

                                </div>
                            </div>
                            <hr class="mx-n3">
                            <div class="px-5 py-4">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @endsection
