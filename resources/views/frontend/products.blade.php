@include('frontend.layout.header')
@include('frontend.layout.sidebar')


<div class="col-12">
    <div class="bg-light rounded h-100 mt-2 p-4">
        <h6 class="mb-4">Products</h6>

        <a href="{{ route('products.create') }}"><button class="btn btn-primary"><i class="fa fa-edit"
                    aria-hidden="true"></i> Add
                Product</button></a>
        <br><br>
        <div class="table-responsive">
            <table class="table text-center" style="align-items: center" id="table">
                <thead>
                    <tr>

                        <th scope="col">SN</th>
                        <th scope='col'>Avatar</th>
                        <th scope="col">Name</th>
                        <th scope="col">Code</th>
                        <th scope="col">Excerpt</th>
                        <th scope="col">Description</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                        <th scope="col">Featured</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td><img src="/storage/product/{{ $item->image }}" style="width: 40px; height: 40px;"
                                    alt=""></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->excerpt }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ app\Models\User::find($item->supplier_id)->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td><a href="{{ Route('products.show', $item->slug) }}"><button
                                        class="btn btn-primary">Show</button></a><br><br><a
                                    href="{{ Route('products.edit', $item->id) }}"><button
                                        class="btn btn-success">Edit</button></a><br><br>
                                <form action="{{ Route('products.destroy', $item->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <a href=""><button type="submit" class="btn btn-danger">Delete</button></a>
                                </form>
                            </td>
                            <td>
                                <div class="wrapper h-100">
                                    <div class="switch_box box_1">
                                        <form role="form" method="POST" name="form"
                                            action="{{ route('feature', $item->id) }}">
                                            <input type="text" value="{{ $item->id }}" hidden>
                                            @csrf
                                            <input type="checkbox" id="featured" name="featured {{ $item->name }}"
                                                onchange="this.form.submit()" class="switch_1"
                                                @if ($item->feature == '1') checked @endif>
                                        </form>

                                    </div>


                                </div>
                            </td>

                        </tr>
                    @endforeach
                    {{-- <script>
                        $(document).ready(function() {
                            $('.switch_1').change(function(e) {
                                console.log(e.target);
                                var h = $('#featured');
                                console.log(h);


                                e.form.submit();
                            });

                        });
                    </script> --}}


                </tbody>
            </table>

        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@include('frontend.layout.footer')
