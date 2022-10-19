@extends('frontend.layout.main')
@section('main-container')
    <div class="col-12">
        <div class="bg-light rounded h-100 mt-2 p-4">
            <h6 class="mb-4">Create Role</h6>
            <form class="d-md-flex ms-4 " action="{{ Route('submitrole') }}" method="POST">
                @method('put')
                @csrf
                <div class="card-body">

                    <div class="row mb-4">
                        <label for="name" class="col-md-12 col-form-label">{{ __('Name') }}</label>


                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="row">
                        <label for="Permissions">Select permissions:</label><br>
                        @foreach ($permission as $perm)
                            <div class="form-control col">
                                <input type="checkbox" class="form-check-input" name="permission[]"
                                    value="{{ $perm->id }}">
                                <label for="{{ $perm->id }}" class="form-check-label">{{ $perm->name }}</label>

                            </div>
                            &nbsp;
                            &nbsp;
                        @endforeach
                    </div>
                    <br>
                    <div class='form-group'>
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>



            </form>
        </div>
    </div>
@endsection
