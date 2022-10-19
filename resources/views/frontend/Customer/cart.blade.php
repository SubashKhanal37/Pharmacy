@extends('frontend.Customer.layout.main')
<link rel="stylesheet" href="frontend/css/cart.css">
@section('main-container')
    <div class="container-fluid w-100">
        <div class="bg-light rounded p-4 m-2">
            <div class="flex justify-center">
                <div class="flex flex-col w-100">
                    @if ($message = Session::get('success'))
                        <div id="alert" class="mt-2 alert alert-success rounded">
                            <p>{{ $message }}</p>
                        </div>
                        <script>
                            alert = document.getElementById('alert');
                            setTimeout(() => {
                                alert.classList.add('d-none')
                            }, 3000);
                        </script>
                    @endif
                    @isset($msg)
                        <div class="alert alert-{{ $errType }} alert-dismissible fade show" role="alert">
                            <i class="fa fa-exclamation-circle me-2"></i>{{ $msg }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endisset

                    <h3 class=" text-bold">Cart List</h3>
                    <div class="table-responsive">
                        <table class="table w-100">
                            <thead class="thead-light">
                                <tr class="uppercase">
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>
                                        <span>Quantity</span>
                                    </th>
                                    <th> Price</th>
                                    <th> Remove </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ url('storage/product/' . $item->attributes->image) }}"
                                                style="width: 40px; height: 40px;" alt="Thumbnail">
                                        </td>

                                        <td>
                                            <a
                                                href="{{ route('products.show', App\Models\Product::where('id', $item->id)->first()->slug) }}">
                                                <p class="mb-2 md:ml-4">{{ $item->name }}</p>

                                            </a>
                                        </td>
                                        <td class="justify-center mt-6 md:justify-end md:flex">
                                            <div class="h-10 w-28">
                                                <div class="relative flex flex-row w-full h-8">

                                                    <form action="{{ route('cart.update') }}" method="POST">
                                                        @csrf

                                                        <input class="form-control" type="hidden" name="id"
                                                            value="{{ $item->id }}">

                                                        <div class="d-inline-block">
                                                            <input type="number" name="quantity"
                                                                value="{{ $item->quantity }}" class="form-control" />
                                                        </div>


                                                        <div class="d-inline-block">
                                                            &nbsp;
                                                            &nbsp;
                                                            &nbsp;
                                                            <button type="submit" class="btn btn-primary">update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="hidden text-right md:table-cell">
                                            <span class="text-sm font-medium lg:text-base">
                                                Rs. {{ $item->price }}
                                            </span>
                                        </td>
                                        <td class="hidden text-right md:table-cell">
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $item->id }}" name="id">
                                                <button class="btn btn-danger">x</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div>
                            Total: Rs. {{ Cart::getTotal() }}
                        </div>
                        <div>
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <br>


                                <div class="cart_buttons">
                                    <a href="{{ route('make.payment') }}"
                                        class="text-light btn-primary button cart_button_clear"><i
                                            class="fa-brands fa-paypal"></i> Pay
                                        via
                                        Paypal</a>
                                    <button class="button cart_button_clear">Remove All Cart</button>
                                </div>
                            </form>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
