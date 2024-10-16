<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        @foreach ( $web_data as $values)
                        <a href="index"><img src="{{asset('backend/images/'.$values->web_logo )}}" alt=""></a>
                    </div>
                    <ul>
                        <li><strong>Address :</strong> {{ $values->web_address }}</li>
                        <li><strong>Phone :</strong>{{ $values->web_mobile }}</li>
                        <li><strong>Email :</strong>{{ $values->web_email }}</li>
                    </ul>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Useful Links</h6>
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li><a href="about">About Us</a></li>
                        <li><a href="contact">Contact Us</a></li>
                        <li><a href="shop">Shop</a></li>
                        <li><a href="privacy">Privacy Policy</a></li>
                        <li><a href="term">Terms & Conditions</a></li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Join Our Newsletter Now</h6>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="#">
                        <input type="text" placeholder="Enter your mail">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__widget__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text"><p>  <strong>Copyright © 2021 <a href="#">Logelite Pvt. Ltd.</a>.</strong>
                        All rights reserved.</p></div>
                    <div class="footer__copyright__payment"><img src="{{ asset('front/assets/img/payment-item.png') }}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{ asset('front/assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('front/assets/js/mixitup.min.js') }}"></script>
<script src="{{ asset('front/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/assets/js/main.js') }}"></script> 
