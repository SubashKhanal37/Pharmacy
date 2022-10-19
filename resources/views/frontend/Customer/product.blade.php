@extends('frontend.Customer.layout.main')
@section('main-container')
    <style>
        .images-preview-div img {
            padding: 10px;
            max-width: 100px;
        }
    </style>
    <div class="container-fluid w-100 ">
        <div class="bg-light rounded mt-1">

            {{-- <div class="col mb-5 bg-white m-2">

                <!-- Product image-->
                <center>
                    <img class="card-img-top" style="width:30%" src="{{ url('storage/product/' . $product->image) }}"
                        alt="..." />
                    <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div> -->
                </center>
                <div class="card-body  p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder">{{ $product->name }}</h5>
                        <p class="lead">{{ $product->description }}</p>
                        <!-- Product price-->
                        <s>Rs. {{ $product->s_price }}</s><br>
                        {{ 'Rs. ' . ($price = $product->s_price - ($product->s_price * $product->dis_percent) / 100) }}





                        <form action="{{ Route('cart.store') }}" enctype="multipart/form-data" method="POST">
                            <!-- Product actions-->
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->name }}" name="name">
                            <input type="hidden" value="{{ $product->s_price }}" name="price">
                            <input type="hidden" value="{{ $product->image }}" name="image">

                            <center>
                                <input type="number" name="quantity" class="form-control form-control-lg" min="1"
                                    max='1000' style="height: 40px;width:200px ; align-items:center">
                                <label for="quantity" class="form-label">Set quantity</label>
                            </center>

                            <div><input type="submit" name="add_to_cart" class="btn btn-outline-dark mt-auto"
                                    value='Add to cart' /></div>

                        </form>
                    </div>
                </div>


            </div> --}}


            <main class="mt-2 pt-2">
                <div class="container dark-grey-text mt-3">

                    <!--Grid row-->
                    <div class="row fadeIn">

                        <!--Grid column-->
                        <div class="col-md-6 mb-2">

                            <img src="{{ url('storage/product/' . $product->image) }}" width="100%" class="rounded"
                                alt="">

                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6 mb-4 mt-3">

                            <!--Content-->
                            <div class="p-4">
                                <p class="lead font-weight-bold">{{ $product->name }}</p>

                                {{-- <div class="mb-3">
                                    <a href="">
                                        <span class="badge purple mr-1">Category 2</span>
                                    </a>
                                    <a href="">
                                        <span class="badge blue mr-1">New</span>
                                    </a>
                                    <a href="">
                                        <span class="badge red mr-1">Bestseller</span>
                                    </a>
                                </div> --}}

                                <p class="lead">
                                    <span class="mr-1">
                                        <del>{{ $product->s_price }}</del>
                                    </span>
                                    <span>{{ $product->s_price - $product->dis_percent / 100 }}</span>
                                </p>

                                <p class="lead font-weight-bold">Description</p>

                                <p>{{ $product->description }}
                                </p>
                                <p class="lead font-weight-bold">Images</p>
                                <div class="mt-1 text-center">
                                    <div class="images-preview-div">
                                        @foreach (App\Models\Photo::where('product_id', $product->id)->get() as $photo)
                                            <img src={{ url('storage/' . $photo->path) }} alt="">
                                        @endforeach
                                    </div>
                                </div>

                                <form class="d-flex justify-content-left" action="{{ Route('cart.store') }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                    <input type="hidden" value="{{ $product->name }}" name="name">
                                    <input type="hidden"
                                        value="{{ $product->s_price - ($product->dis_percent / 100) * $product->s_price }}"
                                        name="price">
                                    <input type="hidden" value="{{ $product->image }}" name="image">
                                    <!-- Default input -->
                                    <input type="number" name="quantity" value="1" aria-label="Search"
                                        class="form-control" style="width: 100px">
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <button class="btn btn-primary btn-md my-0 p" name="add_to_cart" type="submit">Add to
                                        cart
                                        <i class="fas fa-shopping-cart ml-1"></i>
                                    </button>

                                    <!-- Product actions-->





                                </form>

                            </div>
                            <!--Content-->

                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <hr>

                </div>
        </div>
    </div>
@endsection
