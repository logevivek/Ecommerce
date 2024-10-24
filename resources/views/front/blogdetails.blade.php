@extends('front.layout.app_other')  

@section ('content')


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('front/assets/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$single_blogdata->heading}}</h2>
                        <div class="breadcrumb__option">
                            <a href="index">Home</a>
                            <span>Blog Detail</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    
        <!-- Blog Details Section Begin -->
        <section class="blog-details spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-5 order-md-1 order-2">
                        <div class="blog__sidebar">
                            <div class="blog__sidebar__item">
                                <h4>Recent News</h4>
                                <div class="blog__sidebar__recent">
                                    @foreach ($blogs_data as $resentblogs)
                                    <a href="#" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                            <img src="{{asset('backend/images/'.$resentblogs->blog_banner )}}" width="100px" alt="">
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6>{{$resentblogs->heading}}</h6>
                                            <span>{{$resentblogs->created_at->format('Y-m-d')}}</span>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                   
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 order-md-1 order-1">
                        <div class="blog__details__text">
                            <img src="{{asset('backend/images/'.$single_blogdata->blog_banner )}}" width="700px" alt="">
                            <h3>{{$single_blogdata->heading}}</h3>
                            <span>{{$single_blogdata->created_at->format('Y-m-d')}}</span>
                            <p>{!! $single_blogdata->blog_desc !!}</p>
                        </div>
                        <div class="blog__details__content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="blog__details__widget">
                                        <ul>
                                            <li><span>Tags:</span> {{$single_blogdata->tags}}</li>
                                        </ul>
                                        <div class="blog__details__social">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Details Section End -->
    
        <!-- Related Blog Section Begin -->
        <section class="related-blog spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title related-blog-title">
                            <h2>Post You May Like</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ( $blogs_data as $resentblogs )
                    <div class="col-lg-4 col-md-4 col-sm-6">

                 
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{asset('backend/images/'.$resentblogs->blog_banner )}}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> {{$resentblogs->created_at->format('Y-m-d')}}</li>
                                 
                                </ul>
                                <h5><a href="#">{{$resentblogs->heading}}</a></h5>
                              
                            </div>
                        </div>
                  
            
                    </div>
                    @endforeach
    
                </div>
            </div>
        </section>
        <!-- Related Blog Section End -->


@endsection

@section('title')
Blog Detail
@endsection