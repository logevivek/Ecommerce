

@extends('front.layout.app_other')  

@section ('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
     .rate {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rate:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rate:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rate:not(:checked) > label:before {
         content: '★ ';
         }
         .rate > input:checked ~ label {
         color: #ffc700;
         }
         .rate:not(:checked) > label:hover,
         .rate:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rate > input:checked + label:hover,
         .rate > input:checked + label:hover ~ label,
         .rate > input:checked ~ label:hover,
         .rate > input:checked ~ label:hover ~ label,
         .rate > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
         .star-rating-complete{
            color: #c59b08;
         }
         .rating-container .form-control:hover, .rating-container .form-control:focus{
         background: #fff;
         border: 1px solid #ced4da;
         }
         .rating-container textarea:focus, .rating-container input:focus {
         color: #000;
         }
         .rated {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rated:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:16px;
         color:#ffc700;
         }
         .rated:not(:checked) > label:before {
         content: '★ ';
         }
         .rated > input:checked ~ label {
         color: #ffc700;
         }
         .rated:not(:checked) > label:hover,
         .rated:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rated > input:checked + label:hover,
         .rated > input:checked + label:hover ~ label,
         .rated > input:checked ~ label:hover,
         .rated > input:checked ~ label:hover ~ label,
         .rated > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
</style>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('front/assets/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Product Detail Page</h2>
                        <div class="breadcrumb__option">
                            <a href="index">Home</a>
                            <span>Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
 

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                        @if(session('success'))
                            <div class="alert alert-success">
                            {{ session('success') }}    
                            </div> 
                        @endif
                            <img class="product__details__pic__item--large"
                                src="{{asset('backend/images/'.$single_product->pro_img )}}"  width="200" height="400" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$single_product->pro_name}}</h3>
                        <div class="product__details__price">&#8377; {{$single_product->pro_price}}</div>
                        <div class="product__details__quantity">
                        </div>

                     @if($single_product->pro_quantity == 0)
                        <a href="#" disabled class="primary-btn">Out of stock</a>
                      @else
                      <a href="{{ route('add.to.cart', $single_product->id) }}" class="primary-btn">ADD TO CARD</a>
                      @endif
                        <ul>
                            @if($single_product->pro_quantity == 0)         
                            <li><b>Availability</b> <span><samp>Out of stock</samp></span></li>    
                            @endif
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Quantity</b> <span>{{$single_product->pro_quantity}}</span></li>  
                           
                        </ul>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                   
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>({{$totalReview}})</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Description</h6>
                                    <p><span>{!! $single_product->pro_desc !!}</span></p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Total Products Review <span>({{$totalReview}})</span></h6>
                                    <div class="col-lg-12">
                                            <section class="checkout spad">
                                                <div class="container">
                                                    <div class="checkout__form">
                                                        <h4>Give Product Review Here..</h4>
                                                        <form action="storereview" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value={{$single_product->id}}>
                                                            <div class="row">
                                                                <div class="col-lg-8 col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="checkout__input">
                                                                                <p>Customer Name <span>*</span></p>
                                                                                <input type="text" name="coustomer_name" placeholder="Enter customer name">
                                                                                @error('coustomer_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                                            </div>
                                                                        </div>
                    
                                                                          <div class="col-lg-6">
                                                                            <div class="checkout__input">
                                                                                <p>Email <span>*</span></p>
                                                                                <input type="email" name="email" placeholder="Enter customer email">
                                                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                    
                                                                    <div class="checkout__input">
                                                                        <p>Product Review <span>*</span></p>
                                                                        <div class="rate">
                                                                            <input type="radio" id="star5" class="rate" name="star_rating" value="5"/>
                                                                            <label for="star5" title="text">5 stars</label>
                                                                            <input type="radio" checked id="star4" class="rate" name="star_rating" value="4"/>
                                                                            <label for="star4" title="text">4 stars</label>
                                                                            <input type="radio" id="star3" class="rate" name="star_rating" value="3"/>
                                                                            <label for="star3" title="text">3 stars</label>
                                                                            <input type="radio" id="star2" class="rate" name="star_rating" value="2">
                                                                            <label for="star2" title="text">2 stars</label>
                                                                            <input type="radio" id="star1" class="rate" name="star_rating" value="1"/>
                                                                            <label for="star1" title="text">1 star</label>
                                                                         </div>
                                                                    </div>
                                                                    <div class="checkout__input">
                                                                        <input type="text" name="review" placeholder="Enter product review">
                                                                        @error('review') <span class="text-danger">{{ $message }}</span> @enderror
                                                                    </div>
                                                                    <button type="submit" class="site-btn">Send Review</button>
                                                                </div>
                                                                
                                                            </form>
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class="pro_review" style="max-height: 300px; overflow-y: auto;">
                                                                <h4>Product Review List</h4>

                                                                @foreach($review_data as $review)
                                                             
                                                                    <div class="pro_review">
                                                                        <div class="rated">
                                                                            @for($i = 1; $i <= $review->star_rating; $i++)
                                                                                <label class="star-rating-complete" title="text">{{ $i }} Star</label>
                                                                            @endfor
                                                                        </div>
                                                                        <div class="form-group row mt-4">
                                                                            <div class="col">
                                                                                <h5><strong>{{ $review->coustomer_name }} </strong></h5>
                                                                                <i>{{ $review->review }}</i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                
                                                                @endforeach
                                                           
                                                            </div>
                                                        </div>
                                                            </div>
                                                    </div>
                                                </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($related_product as $products)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{asset('backend/images/'.$products->pro_img )}}" onclick="location.href='{{ $products->id }}';" style="cursor: pointer;">
                            <ul class="product__item__pic__hover">
                                <li><a href="{{ $products->id }}" title="View Product"><i class="fa fa-eye"></i></a></li>
                                <li><a href="{{ route('add.to.cart', $products->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text" onclick="location.href='{{ $products->id }}';" style="cursor: pointer;">
                            <h6><a href="#">{{$products->pro_name}}</a></h6>
                            <h5>&#8377; {{$products->pro_price}}</h5>
                        </div>
                    </div>
                  
                </div>
                @endforeach
            </div>
     
        </div>
    </section>
    <!-- Related Product Section End -->
@endsection


@section('title')
Detail Page
@endsection
