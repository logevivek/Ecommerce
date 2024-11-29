

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


    a {
        font-size: 18px;
        color: red;
        margin: 15px;
    }

    .checkout__order__total {
    font-size: 15px !important;
    font-weight: 700 !important;
    padding-bottom: -2px !important;

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
                                <select name="pay_mode" class="form-control">
                                    <option value="COD" selected>COD</option>
                                    <option value="UPI">UPI</option>
                                    <option value="NET BANKING">NET BANKING</option>                   
                                </select>
                            </div>&nbsp;
                      

                            <div class="checkout__order apply_coupon_code_box">
                                <h4>Discount Coupon</h4> 
                                @csrf
                               
                                <input type="text" placeholder="Enter your coupon code" name="coupon_name" id="coupon_name"  class="form-control" autocomplete="off">
                                <div id="coupon_name_msg" style="color:red"></div>

                                <button type="button" class="site-btn" id="disable_btn" onclick="applyCouponCode()">APPLY COUPON</button>
                            </div>&nbsp;
                  
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
                                <div class="checkout__order__total">Total Amount <span id="total_price"> &#8377; {{ $total }} /- </span></div>

                                <div class="checkout__order__total" id="remove_coupan_discount">Coupon Discount <a href="javascript:void(0)" title="Remove coupon discount" onclick="remove_coupon_discount()"><i class="fa fa-trash" aria-hidden="true"></i></a><span id="discount_value"> &#8377; 0/-</span></div>

                                <div class="checkout__order__total" id="remove_grand_total">Grand Total <span id="lessdiscountGrandTotal"> &#8377; {{ $total }} /- </span></div>
                                {{-- send hidden input value --}}
                                <input type="hidden" name="total_amount"  value="{{ $total }}">
                                <input type="hidden" id="coupon_discount" name="coupon_discount" value="0">
                                <input type="hidden" id="grand_total" name="grand_total" value="0">
                                {{-- send hidden input value --}}

                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

   {{-- alertify --}}
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <script>
        // By default remove button hide 
        $(document).ready(function(){
            jQuery('#remove_coupan_discount').hide();
        });
    </script>

<script>
    function applyCouponCode(){
        //alert('hello');
        jQuery('#coupon_name_msg').html('');
        var coupon_name=jQuery('#coupon_name').val();
      
        if(coupon_name!='')
        {
            jQuery.ajax({
                type:'post',
                url:'/applyCoupons',
                data:'coupon_name=' +coupon_name+'&_token='+jQuery("[name='_token']").val(),
                success:function(response)
                {
                    //console.log(response);
                if (response.status === 'error') {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(response.msg); 
                }
                if(response.status == 'success')

                    {
                        jQuery('#remove_coupan_discount').show();
                        var discount_value=response.discount_value;
                        var lessdiscountGrandTotal=response.lessdiscountGrandTotal;

                        jQuery('#discount_value').text(discount_value)
                        jQuery('#lessdiscountGrandTotal').text(lessdiscountGrandTotal)

                    //Send hidden fields value code
                        jQuery('#coupon_discount').val(discount_value);
                        jQuery('#grand_total').val(lessdiscountGrandTotal);

                        alertify.set('notifier','position','top-right');
                        alertify.success(response.msg);

                    // After submit hide coupon discount button 
                        jQuery('.apply_coupon_code_box').hide();
                    }
                }   
            });
        }
        else
        {
            jQuery('#coupon_name_msg').html('Please enter valid coupon code');

        } 
    }

    // Remove Discount Coupon Code Button
        function remove_coupon_discount(){
        var coupon_name=jQuery('#coupon_name').val();
        jQuery('#coupon_name').val('');
        //alert(coupon_name);
        if(coupon_name!='')
            {
                jQuery.ajax({
                    type:'post',
                    url:'remove_couponcode',
                    data:'coupon_name=' +coupon_name+'&_token='+jQuery("[name='_token']").val(),
                    success:function(response)
                    {
                        console.log(response);
                        if(response.status == 'success')
                        {
                        // hide old coupon discount value
                            jQuery('#remove_coupan_discount').hide();
                            jQuery('#remove_grand_total').hide();
                            jQuery('#total_price').text(response.total_cardvalue);

                            alertify.set('notifier','position','top-right');
                            alertify.success(response.msg);
                            // show coupon code box
                            jQuery('.apply_coupon_code_box').show();  
                        }
                    }  
              });
           }
        }

    </script>
<!-- Checkout Section End -->
 @endsection
 

