@extends('frontend.Customer.layout.main')
@section('main-container')
    <div class="bg-light rounded m-2">

        <div class="col-12 p-3">

            <h6 class="mb-4">Products</h6>
            <br><br>
            <div class="table-responsive">
                <table class="table text-center" id="table">
                    <thead>
                        <tr>

                            <th scope="col">SN</th>
                            {{-- <th scope='col'>Avatar</th> --}}
                            {{-- <th scope="col">Name</th> --}}
                            <th scope="col">Bill No</th>
                            <th scope="col">Date of Order</th>
                            <th scope="col">Paid Status</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                {{-- <td><img src="/storage/product/{{ $item->image }}" style="width: 40px; height: 40px;"
                                            alt=""></td> --}}
                                <td>{{ $item->bill_no }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->paid_status }}</td>
                                <td>{{ $item->order_status }}</td>
                                {{-- <td>{{ app\Models\User::find($item->supplier_id)->name }}</td> --}}
                                {{-- <td>{{ $item->quantity }}</td> --}}
                                <td>
                                    <a href="{{ route('orders.show', $item->id) }}" class="btn btn-primary"><i
                                            class="fa fa-eye" aria-hidden="true"></i>
                                        View products</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>


        </div>

        <script>
            $(document).ready(function() {
                $('#table').DataTable();
            });
        </script>


    </div>
@endsection
