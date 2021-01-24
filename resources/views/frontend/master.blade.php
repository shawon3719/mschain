<!DOCTYPE html>
<html lang="en">

@include('frontend.partials.links')

<body>

@include('frontend.layouts.header')


<!--Left Side Buttons Start-->
<div class="sticky-left-container">
    <ul class="sticky-left">
        <li>
            <a href="#">
                <img width="32" height="32" title="" alt="" src="{{asset('frontend/assets/img/icons/whatsapp.png')}}"/>
                <p>Whatsapp</p>
            </a>
        </li>
        <li>
            <a href="#">
                <img width="32" height="32" title="" alt="" src="{{asset('frontend/assets/img/icons/facebook.png')}}" />
                <p>Facebook</p>
            </a>
        </li>
        <li>
            <a href="#">
                <img width="32" height="32" title="" alt="" src="{{asset('frontend/assets/img/icons/wechat.png')}}" />
                <p>We-Chat</p>
            </a>
        </li>
        <li>
            <a href="#">
                <img width="32" height="32" title="" alt="" src="{{asset('frontend/assets/img/icons/skype.png')}}" />
                <p>Skype</p>
            </a>
        </li>

    </ul>
</div>
<!--Left Side Buttons End-->
@yield('content')
@include('frontend.layouts.footer')

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
@include('frontend.partials.scripts')
@yield('page_scripts')
<!--&lt;!&ndash; Vendor JS Files &ndash;&gt;-->
<!--<script src="assets/vendor/jquery/jquery.min.js"></script>-->
<!--<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
<!--<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>-->
<!--<script src="assets/vendor/php-email-form/validate.js"></script>-->
<!--<script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>-->
<!--<script src="assets/vendor/venobox/venobox.min.js"></script>-->
<!--<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>-->
<!--<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>-->
<!--<script src="assets/vendor/aos/aos.js"></script>-->

<!-- Template Main JS File -->
<!--<script src="assets/js/main.js"></script>-->
<!--<script>-->
<!--$('.moreless-button').click(function() {-->
<!--$('.moretext').slideToggle();-->
<!--if ($('.moreless-button').text() == "Read more") {-->
<!--$(this).text("Read more")-->
<!--} else {-->
<!--$(this).text("Read less")-->
<!--}-->
<!--});-->
<!--</script>-->

</body>

</html>