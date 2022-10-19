@extends('frontend.Customer.layout.main')
@section('main-container')
    <div class="bg-light rounded m-2 p-2">
        <h5 class="mb-0 ">Order Details</h5>
        <div class="d-flex">
            <div>

                <small> Bill No. #{{ $data->bill_no }}</small><br>
                <small> Placed on {{ $data->created_at }}</small>
            </div>
            <div class="ml-auto">
                <h5>Total: Rs. {{ $data->Total }}</h5>
            </div>
        </div>
    </div>


    @foreach ($data->products as $pro)
        <div class="bg-light rounded m-2 p-2">
            <div class="order-item d-flex">
                <div class="item-pic col m-3"> <img src="/storage/product/{{ $pro->image }}"
                        style="width: 80px; height: 80px;" alt=""> </div>
                <div class="item-main col m-3">
                    <h6>{{ $pro->name }}</h6><br>
                    {{ $pro->description }}
                </div>
                <div class="item-quantity col m-3">
                    <h6>Qty:</h6><br>
                    {{ $pro->pivot->quantity }}
                </div>
                <div class="item-total col m-3">
                    <h6>Price:</h6><br>Rs. {{ $pro->pivot->price * $pro->pivot->quantity }}
                </div>

            </div>
        </div>
    @endforeach
    <div class="container" style="display: flex">
        <div id="leftContainer_201376571430440" class="container ml-5" style="float:left;">
            <div class="bg-light rounded m-2 p-2 h-100">
                <div class="delivery-summary">
                    <div class="delivery-wrapper">
                        <h6 class="title">Paid by</h6><span
                            class="username">{{ App\Models\User::find($data->customer_id)->name }}</span>
                        {{-- <span
                            class="address"><span class="in-line"> Bagmati, Kathmandu Outside Ring Road, Budhanilkantha -
                                Chapali Area, Bhangal,KTM</span></span><span>9803605653</span> --}}
                    </div>
                </div>
            </div>
        </div>
        <div id="rightContainer_201376571430440" class="container mr-5" style="float: right;">
            <div class="bg-light rounded m-2 p-2 h-100">
                <div class="total-summary">
                    <div data-spm-anchor-id="a2a0e.order_details.0.i2.759b6af7vfgTgH">
                        <div class="text header">Total Summary</div>
                        <div>
                            <div style="justify-content: space-between;display:flex"><span
                                    class="text pull-left">Subtotal</span><span class="text price pull-right">Rs.
                                    {{ $data->Total }}</span></div>
                            <div style="justify-content: space-between;display:flex"><span class="text pull-left">Shipping
                                    Fee</span><span class="text price pull-right">Rs. 0</span></div>
                            {{-- <div class="fee-row">
                                <div class="fee-main"><span class="text fee-main-left">Seller Promotion</span><span
                                        class="text fee-main-right">-Rs. 69,999</span></div>
                            </div> --}}
                        </div>
                        <hr>
                        <div class="second-header" style="justify-content: space-between;display:flex"><span
                                class="text bold pull-left">Total</span><span class="text bold total-price pull-right">Rs.
                                {{ $data->Total }}</span></div>
                        <div class="row second-header"><span class="text bold pull-left"></span><span
                                class="text bold total-price pull-right"></span></div>
                        <div>
                            <div style="justify-content: space-between;display:flex" class="pull-right"><span
                                    class="text">Paid by&nbsp; PayPal</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
