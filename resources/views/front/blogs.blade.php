@extends('front.layout.app_other')  

@section ('content')
<style>
p {
    width: 250px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    }
</style>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('front/assets/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Blog Page</h2>
                        <div class="breadcrumb__option">
                            <a href="index">Home</a>
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    
    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                                @foreach ($blogs_data as $resentblogs)
                                <a href="blogdetailspage/{{ $resentblogs->id }}" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic" onclick="location.href='blogdetailspage/{{ $resentblogs->id }}';" style="cursor: pointer;">
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
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        @foreach ($blogs_data as $blogvalues)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic" onclick="location.href='blogdetailspage/{{ $blogvalues->id }}';" style="cursor: pointer;">
                                    <img src="{{asset('backend/images/'.$blogvalues->blog_banner )}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li> {{$blogvalues->title}}</li>
                                        <li><i class="fa fa-calendar-o"></i> {{$blogvalues->created_at->format('Y-m-d')}}</li>
                                    </ul>
                                    <h5><a href="blogdetailspage/{{ $blogvalues->id }}">{{$blogvalues->heading}}</a></h5>
                                    <p>{{$blogvalues->blog_desc}}</p>
                                    <a href="blogdetailspage/{{ $blogvalues->id }}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    
                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->



@endsection

@section('title')
Blog Page
@endsection