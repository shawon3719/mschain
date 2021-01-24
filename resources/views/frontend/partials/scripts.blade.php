<!-- Vendor JS Files -->
<script src="{{asset('frontend/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/venobox/venobox.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/aos/aos.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('frontend/assets/js/main.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://kenwheeler.github.io/slick/slick/slick.js"></script>
<script>
    $('.moreless-button').click(function() {
        $('.moretext').slideToggle();
        if ($('.moreless-button').text() == "Read more>") {
            $(this).text("Read less")
        } else {
            $(this).text("Read more")
        }
    });
    $('.moreless-button2').click(function() {
        $('.moretext2').slideToggle();
        if ($('.moreless-button2').text() == "Read more") {
            $(this).text("Read less")
        } else {
            $(this).text("Read more")
        }
    });
</script>