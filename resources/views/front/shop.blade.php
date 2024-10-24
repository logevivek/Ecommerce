

@extends('front.layout.app_other')  

@section ('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="front/assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Product Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="index">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Categories</h4>
                        @foreach ( $category_data as $values)
                        <ul>
                            <li><a href="productcategory/{{ $values->id }}">{{$values->name}}</a></li>
                        </ul>
                        @endforeach
                    </div>

                     <div class="sidebar__item">
                        <h4>Product Price</h4>
                        <div class="price-range-wrap">
                            <form method="GET" action="shop" id="price-filter-form">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="50" data-max="1000">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" name="min_price" id="minamount"  readonly onchange="this.form.submit()">
                                        <input type="text" name="max_price" id="maxamount"  readonly onchange="this.form.submit()">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="front/assets/img/latest-product/lp-1.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>&#8377; 30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="front/assets/img/latest-product/lp-2.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>&#8377; 30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="front/assets/img/latest-product/lp-3.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>&#8377; 30.00</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="front/assets/img/latest-product/lp-1.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>&#8377; 30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="front/assets/img/latest-product/lp-2.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>&#8377; 30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="front/assets/img/latest-product/lp-3.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>&#8377; 30.00</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>Total - {{$totalProducts}}</span> Products found</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ( $pro_data as $Provalues)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="backend/images/{{ $Provalues->pro_img }}" onclick="location.href='prodetailspage/{{ $Provalues->id }}';" style="cursor: pointer;">
                                <ul class="product__item__pic__hover">
                                    <li><a href="prodetailspage/{{ $Provalues->id }}" title="View Product"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="{{ route('add.to.cart', $Provalues->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text" onclick="location.href='prodetailspage/{{ $Provalues->id }}';" style="cursor: pointer;">
                                <h6><a href="prodetailspage/{{ $Provalues->id }}">{{ $Provalues->pro_name }}</a></h6>
                                <h5>&#8377; {{ $Provalues->pro_price }}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                 
                    @if(!empty($pro_data))
                    <div class="col-lg-12 text-center">
                        {{  $pro_data->links() }}
                      
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script type="text/javascript">
    $(function() {
        var minPrice = {{ request('min_price', 50) }};
        var maxPrice = {{ request('max_price', 1000) }};
        
        $(".price-range").slider({
            range: true,
            min: 50,
            max: 1000,
            values: [minPrice, maxPrice],
            slide: function(event, ui) {
                $("#minamount").val(ui.values[0]);
                $("#maxamount").val(ui.values[1]);
                $('#price-filter-form').submit();
            }
        });
        $("#minamount").val($(".price-range").slider("values", 0));
        $("#maxamount").val($(".price-range").slider("values", 1));
    });
</script>

@endsection

@section('title')
Shop Page
@endsection




