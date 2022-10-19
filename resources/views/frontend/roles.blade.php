@extends('frontend.layout.main')
@section('main-container')
    <div class="col-12">
        <div class="bg-light rounded h-100 mt-2 p-4">
            <h6 class="mb-4">Roles</h6>
            <a href="{{ Route('createrole') }}"><button class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i>
                    Create
                    Role</button></a><br><br>
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
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td><a href="{{ Route('roles.show', $item->id) }}"><button
                                            class="btn btn-primary">Show</button></a>&nbsp;&nbsp;<a
                                        href="{{ Route('roles.edit', $item->id) }}"><button
                                            class="btn btn-success">Edit</button></a>&nbsp; &nbsp;<a
                                        href="{{ Route('roles.delete', $item->id) }}"><button
                                            class="btn btn-danger">Delete</button></a>
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
