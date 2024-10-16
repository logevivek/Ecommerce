
@extends('front.layout.app_other')  
@section ('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="front/assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout Page</h2>
                        <div class="breadcrumb__option">
                            <a href="index">Home</a>
                            <span>Checkout Page</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    <style>
        .nice-select {
            -webkit-tap-highlight-color: transparent;
            background-color: #fff;
            border-radius: 5px;
            border: solid 1px #e8e8e8;
            box-sizing: border-box;
            clear: both;
            cursor: pointer;
            display: block;
            float: left;
            font-family: inherit;
            font-size: 14px;
            font-weight: normal;
            height: 35px;
            line-height: 22px;
            outline: none;
            padding-left: 15px;
            padding-right: 200px;
            position: relative;
            text-align: left !important;
            -webkit-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            white-space: nowrap;
            width: auto;
        }

    </style>
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>User Details</h4>
                <form action="storecheckout" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="first_name">
                                        @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="last_name">
                                        @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone">
                                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email">
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="country">
                                @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="checkout__input">
                                <p>State<span>*</span></p>
                                <input type="text" name="state">
                                @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="city"> 
                                @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address">
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                          
                            <div class="checkout__input">
                                <p>Area Pincode<span>*</span></p>
                                <input type="text" name="pincode">
                                @error('pincode') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Payment Mode</h4>
                                <select name="pay_mode"  class="form-control">
                                    <option value="COD" selected>COD</option>
                                    <option value="UPI">UPI</option>
                                    <option value="NET BANKING">NET BANKING</option>                   
                                </select>
                            </div>
                            <hr>

                            <div class="checkout__order">
                                <h4>Order Details</h4>
                                <div class="checkout__order__products">Products/Quantity <span>Total</span></div>
                                <ul>
                                    @php $total = 0 @endphp
                                    @if(session('cart'))
                                    @foreach ($carts_data as  $carts_value)
                                    @php $total += $carts_value['product_price'] * $carts_value['quantity'] @endphp
                                    <li>{{ $carts_value['product_name'] }} - {{ $carts_value['quantity'] }} <span> &#8377;{{ $carts_value['product_price'] * $carts_value['quantity'] }}</span></li>
                                    @endforeach
                                    @endif
                                </ul>
                                <div class="checkout__order__total">Grand Total <span> &#8377; {{ $total }} /- </span></div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
 @endsection

 
@section('title')
Checkout Page
@endsection

