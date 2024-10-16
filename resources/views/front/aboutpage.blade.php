@extends('front.layout.app_other')  

@section ('content')


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('front/assets/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>About Page</h2>
                        <div class="breadcrumb__option">
                            <a href="index">Home</a>
                            <span>About Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    
    <section class="blog-details spad">
        <div class="container">
          @foreach ( $about_data as $abouts)

          <div class="row">
            <div class="col-md-6">
                <h2><strong><u>{{ $abouts->title }}</u></strong></h2>
                <div>
                <h4>{{ $abouts->heading }}</h4>
                </div>
               
                <p>
                    {!! $abouts->desc !!}
                </p>
            </div>

            <div class="col-md-6">
            <img src="{{ asset('front/assets/img/blog/details/about-pic.jpg')}}">
            </div>
        </div> 
        @endforeach
    
        </div>
    </section>


@endsection

@section('title')
About Page
@endsection