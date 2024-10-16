@extends('front.layout.app_other')  

@section ('content')


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('front/assets/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Terms & Conditions Page</h2>
                        <div class="breadcrumb__option">
                            <a href="index">Home</a>
                            <span>Terms & Conditions </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    <section class="blog-details spad">
        <div class="container">
          @foreach ( $term_data as $terms)

          <div class="row">
            <div class="col-md-12">
                <h2><strong><u>{{ $terms->title }}</u></strong></h2>
                <div>
                <h4>{{ $terms->heading }}</h4>
                </div>
               
                <p>
                    {!! $terms->desc !!}
                </p>
            </div>

            {{-- <div class="col-md-6">
            <img src="{{ asset('front/assets/img/blog/details/privacy-pic.jpg')}}">
            </div> --}}
        </div> 
        @endforeach
    
        </div>
    </section>




@endsection

@section('title')
Terms & Conditions
@endsection