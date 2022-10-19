@extends('frontend.layout.main')
@section('main-container')
    <div class="col-12">
        <div class="bg-light rounded h-100 mt-2 p-4">
            <h6 class="mb-4">{{ $role['name'] }}</h6>

            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>

                            <th scope="col">SN</th>
                            <th scope='col'>Avatar</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><img class="rounded-circle me-lg-2" src="/storage/avatar/{{ $item->avatar }}"
                                        style="width: 40px; height: 40px;" alt=""></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
