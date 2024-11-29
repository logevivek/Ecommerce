@extends('front.layout.app_other')  

@section ('content')


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('front/assets/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Category Page</h2>
                        <div class="breadcrumb__option">
                            <a href="index">Home</a>
                            <span>Category</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(session('success'))
                    <div class="alert alert-success">
                    {{ session('success') }}
                    </div> 
                @endif
                    <div class="section-title">
                        <h2> {{$cat_base_product['0']['name'] }} Category</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
            @foreach ( $cat_base_product as $catproducts)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{asset('backend/images/'.$catproducts->pro_img )}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{ route('add.to.cart', $catproducts->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6>{{$catproducts->pro_name}}</h6>
                            <h5>&#8377; {{$catproducts->pro_price}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12 text-center">
                    {{  $cat_base_product->links() }}
                  
                </div>
            </div>
        </div>
    </section>

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            @foreach ( $banner_data as $banner_values)
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{asset('backend/images/'.$banner_values->banner_img )}}" alt="">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Banner End -->
<br>


@endsection

@section('title')
Category Page
@endsection