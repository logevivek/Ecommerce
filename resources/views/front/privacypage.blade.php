@extends('front.layout.app_other')  

@section ('content')


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('front/assets/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Privacy Policy Page</h2>
                        <div class="breadcrumb__option">
                            <a href="index">Home</a>
                            <span>Privacy Policy </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->



    <section class="blog-details spad">
        <div class="container">
          @foreach ( $privacy_data as $privacy)

          <div class="row">
            <div class="col-md-12">
                <h2><strong><u>{{ $privacy->title }}</u></strong></h2>
                <div>
                <h4>{{ $privacy->heading }}</h4>
                </div>
               
                <p>
                    {!! $privacy->desc !!}
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
Privacy Page
@endsection