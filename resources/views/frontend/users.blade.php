@extends('frontend.layout.main')
@section('main-container')
    <div class="col-12">
        <div class="bg-light rounded h-100 mt-2 p-4">
            <h6 class="mb-4">Registered Users</h6>
            <a href="{{ route('regUser') }}"><button class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i> Add
                    User</button></a>
            <br><br>
            <form class="d-md-flex ms-4 " action="{{ Route('Search') }}" method="POST">
                @csrf
                <input class="form-control border-0 text-center" style="height: 2em;display:inline-block" type="text"
                    name="Search" value="{{ $search }}" placeholder="Search">
                <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>

                            <th scope="col">SN</th>
                            <th scope='col'>Avatar</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Verified</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><img class="rounded-circle me-lg-2" src="/storage/avatar/{{ $item->avatar }}"
                                        style="width: 40px; height: 40px;" alt=""></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if ($item->email_verified_at)
                                        <center>
                                            {{-- <div class="bg-success rounded-circle p-1 " style="width: 20px;height:20px">
                                            </div> --}}
                                            <i class="fa fa-check-circle text-primary" aria-hidden="true"></i>
                                        </center>
                                    @else
                                        <center>
                                            {{-- <div class="bg-danger rounded-circle p-1" style="width: 20px;height:20px">
                                            </div> --}}
                                            <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>

                                        </center>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ Route('editUser', $item->id) }}"><button
                                            class="btn btn-success">Edit</button></a><br><br>
                                    @if (!($item->id == 1))
                                        <form action="{{ Route('deleteUser', $item->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <a href=""><button type="submit"
                                                    class="btn btn-danger">Delete</button></a>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection
