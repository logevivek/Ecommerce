
@extends('front.layout.app')
  @section ('content')
  <section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach ( $cat_data as $values)
                <div class="col-lg-3" onclick="location.href='productcategory/{{ $values->id }}';" style="cursor: pointer;">
                    <div class="categories__item set-bg" data-setbg="backend/images/{{ $values->cat_img }}">
                        <h5><a href="productcategory/{{ $values->id }}">{{ $values->name }}</a></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ( $pro_data as $values)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
            <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="backend/images/{{ $values->pro_img }}" onclick="location.href='prodetailspage/{{ $values->id }}';" style="cursor: pointer;">
                        <ul class="featured__item__pic__hover">
                            <li><a href="prodetailspage/{{ $values->id }}" title="View Product"><i class="fa fa-eye"></i></a></li>
                            <li><a href="{{ route('add.to.cart', $values->id) }}" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text" onclick="location.href='prodetailspage/{{ $values->id }}';" style="cursor: pointer;">
                        <h6>{{ $values->pro_name }}</h6>
                        <h5>&#8377; {{ $values->pro_price }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-lg-12 text-center">
                {!! $pro_data->links() !!}
            </div> --}}
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            @foreach ( $banner_data as $values)
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="backend/images/{{ $values->banner_img }}" alt="">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Banner End -->
<br>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


   @if (session('success'))
   <script>
       $(document).ready(function() {
           toastr.success("{{ session('success') }}");
       });
   </script>
   @endif
  @endsection




 