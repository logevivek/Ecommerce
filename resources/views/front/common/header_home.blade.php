    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                @foreach ( $web_data as $values)
                                <li><i class="fa fa-envelope"></i> {{$values->web_email}}</li>
                                @endforeach
                                <li>Free Shipping for all Order of &#8377; 99</li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index"><img src="{{asset('backend/images/'.$values->web_logo )}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="index">Home</a></li>
                            <li><a href="shop">Shop</a></li>
                            <li><a href="blog">Blog</a></li>
                            <li><a href="about">About</a></li>
                            <li><a href="contact">Contact</a></li>

                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-bag"></i> <span>{{ count((array) session('cart')) }}</span></a></li>
                        </ul> 
                       
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                        @php $total += $details['product_price'] * $details['quantity'] @endphp
                        @endforeach

                        <div class="header__cart__price">Total Amount : <span> &#8377; {{ $total }}</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <ul>
                            @foreach ( $cat_data as $values)
                            <li><a href="productcategory/{{ $values->id }}">{{ $values->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="searchProduct" method="POST">
                                @csrf
                            <input type="search" name="product_name" id="product_search" value="" placeholder="Searh Your Product">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>{{$values->web_mobile}}</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="front/assets/img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="shop" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
     
          var availableTags=[];
          $.ajax({
            method: "GET",
            url: "productList",
            success:function(response){
                //console.log(response);
                startAutoComplete(response);

            }
        });
        function startAutoComplete(availableTags)
        {
        $( "#product_search" ).autocomplete({
            source: availableTags
          });

        }
    </script>
    