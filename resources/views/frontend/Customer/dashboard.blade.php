@extends('frontend.Customer.layout.main')
@section('main-container')
    <div class="container-fluid w-100 ">


        <div class="bg-light rounded d-flex mt-2 p-2 ">
            <div class="page-inner">

                <h5 class="ml-5">Featured Products</h5>

                <div class="bg-white m-5 mt-0 row row-cols-3 row-cols-xl-5 justify-content-center">

                    @foreach ($featured as $product)
                        <div class="card card-jfy-item m-3 p-0">
                            <a href="{{ route('products.show', $product->slug) }}" class="text-decoration-none text-reset">

                                <div class="card-jfy-image card-jfy-image-background J_GridImage">
                                    <img class="img" width="100%"
                                        src="{{ url('storage/product/' . $product->image) }} ">
                                </div>

                                <div class="card-jfy-item-desc bg-light p-3">

                                    <div class="card-jfy-segment">



                                    </div>


                                    <div class="card-jfy-title"><span class="title">
                                            <h6>{{ $product->name }} </h6>
                                        </span></div>


                                    <div class="hp-mod-price">

                                        <div class="hp-mod-price-first-line">
                                            <h6 class="text-primary"> <span class="currency">Rs.</span><span class="price">
                                                    {{ $product->s_price - ($product->dis_percent / 100) * $product->s_price }}</span>
                                            </h6>
                                        </div>

                                        <div class="hp-mod-price-second-line"><span class="hp-mod-price-text align-left">
                                                <del> <small class="currency">Rs.</small><small
                                                        class="price">{{ $product->s_price }}</small></del>
                                            </span>
                                            <small class="hp-mod-discount align-left"> {{ $product->dis_percent }}</small>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="bg-light rounded d-flex mt-2 p-2 ">
            <div class="page-inner">

                <h5 class="ml-5">All Products</h5>

                <div class="bg-white m-5 mt-0 row row-cols-3 row-cols-xl-5 justify-content-center">

                    @foreach ($data as $product)
                        <div class="card card-jfy-item m-3 p-0">
                            <a href="{{ route('products.show', $product->slug) }}" class="text-decoration-none text-reset">

                                <div class="card-jfy-image card-jfy-image-background J_GridImage">
                                    <img class="img" width="100%"
                                        src="{{ url('storage/product/' . $product->image) }} ">
                                </div>

                                <div class="card-jfy-item-desc bg-light p-3">

                                    <div class="card-jfy-segment">



                                    </div>


                                    <div class="card-jfy-title"><span class="title">
                                            <h6>{{ $product->name }} </h6>
                                        </span></div>


                                    <div class="hp-mod-price">

                                        <div class="hp-mod-price-first-line">
                                            <h6 class="text-primary"> <span class="currency">Rs.</span><span class="price">
                                                    {{ $product->s_price - ($product->dis_percent / 100) * $product->s_price }}</span>
                                            </h6>
                                        </div>

                                        <div class="hp-mod-price-second-line"><span class="hp-mod-price-text align-left">
                                                <del> <small class="currency">Rs.</small><small
                                                        class="price">{{ $product->s_price }}</small></del>
                                            </span>
                                            <small class="hp-mod-discount align-left"> {{ $product->dis_percent }}</small>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    {!! $data->links() !!}
                </div>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // executes when HTML-Document is loaded and DOM is ready
            console.log("document is ready");


            $(".card").hover(
                function() {
                    $(this).addClass('shadow-lg').css('cursor', 'pointer');
                },
                function() {
                    $(this).removeClass('shadow-lg');
                }
            );

            // document ready
        });
    </script>
@endsection
