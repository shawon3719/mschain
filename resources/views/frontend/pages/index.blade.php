@extends('frontend.master')
@section('content')
    <!-- ======= Hero Section ======= -->
    @foreach($sliders as $key=>$slider)
        @if($key<=1)
            <section id="hero" class="d-flex flex-column justify-content-center align-items-center" style="background: url({{asset($slider->image)}}) center center">
                <div class="container" data-aos="fade-in">
                    <h1>{{$slider->title}}</h1>
                    <h2>{{$slider->description}}</h2>
                    <div class="d-flex align-items-center">
                        <i class="bx bxs-right-arrow-alt get-started-icon"></i>
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
            </section>
            <!-- End Hero -->
        @endif
    @endforeach

    <main id="main">

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">
                    <div class="col-xl-4 col-lg-5" data-aos="fade-up">
                        <div class="content">
                            <h3>About MS Chain International</h3>
                            <p>
                                M. S. Chain International is a globally active sea food and agro based products trading company based in Bangladesh.

                            </p>
                            <p class="moretext" style="display: none">
                                It has turned into a smart exporting house in terms of
                                quality, commitments and efficient Supply Chain. Since its inception in 2018, has efficiently
                                carried out exporting operationsmostly in China and in middle east in the modes of B2B.
                                The core products are fresh fish and both live & soft shell crabs, vegetables and
                                fruits. The secondary products are Halal meat (chicken, mutton and beef). Quality being
                                the paramount concern with international food safety measure, timely supply with real
                                time updates of products is the main feature of M.S. Chain International. Ensuring least
                                possible lead time for making goods available in the hands of offshore importers, goods
                                are mostly transported by airways. However, modes of transportation by sea can also be
                                adopted according to the choice of buyers.
                            </p>
                            <div class="text-center">
                                <button class="more-btn moreless-button">Read More <i class="bx bx-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 d-flex">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="icofont-fish-5"></i>
                                        <h4>Export Fishes</h4>
                                        <p>We Provide high quality fresh fishes and crabs also.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="icofont-fruits"></i>
                                        <h4>Export Fruits</h4>
                                        <p>We provide fresh and chemicalless fruits.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="icofont-cauli-flower"></i>
                                        <h4>Export Vegetables</h4>
                                        <p>We provide fresh and healthy vegetables direct from fields.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container">

                <div class="row">
                    <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" >

                    </div>

                    <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                        <h4 data-aos="fade-up">About us</h4>
                        <h3 data-aos="fade-up">MS Chain International</h3>
                        <p data-aos="fade-up">M. S. Chain International is a globally active sea food and agro based products trading company based in Bangladesh. It has turned into a smart exporting house in terms of quality</p>
                        <p class="moretext2" style="display:none">
                            commitments and efficient Supply Chain. Since its inception in 2018, has efficiently
                            carried out exporting operationsmostly in China and in middle east in the modes of B2B.
                            The core products are fresh fish and both live & soft shell crabs, vegetables and
                            fruits. The secondary products are Halal meat (chicken, mutton and beef). Quality being
                            the paramount concern with international food safety measure, timely supply with real
                            time updates of products is the main feature of M.S. Chain International. Ensuring least
                            possible lead time for making goods available in the hands of offshore importers, goods
                            are mostly transported by airways. However, modes of transportation by sea can also be
                            adopted according to the choice of buyers.
                        </p>
                        <button class="btn btn-sm btn-info moreless-button2" style="width: 130px; border-radius: 10px">Read more</button>
                            <div class="icon-box" data-aos="fade-up">
                                <div class="icon"><i class="icofont-fish-5"></i></div>
                                <h4 class="title">Export Fishes</h4>
                                <p class="description">We Provide high quality fresh fishes and crabs also.</p>
                            </div>

                            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                <div class="icon">
                                    <i class="icofont-fruits"></i></div>
                                <h4 class="title">Export Fruits</h4>
                                <p class="description">We provide fresh and chemicalless fruits.</p>
                            </div>

                            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon"><i class="icofont-cauli-flower"></i></div>
                                <h4 class="title">Export Vegetables</h4>
                                <p class="description">We provide fresh and healthy vegetables direct from fields.</p>
                            </div>

                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Clients Section ======= -->
        {{--<section id="clients" class="clients">--}}
            {{--<div class="container" data-aos="fade-up">--}}

                {{--<div class="owl-carousel clients-carousel">--}}
                    {{--@foreach ($products as $product )--}}
                        {{--@if($product->active_status == 1)--}}
                            {{--<img width="70" height="60" src="{{asset($product->images[0]->image)}}" alt="">--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</section>--}}
    <!-- ======= Product Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-up">Our Products</h2>
                    {{--<p data-aos="fade-up">We Export <i>Fresh fish(Chilled) -</i> Tilapia, Rohu,Katla,Mackerel, Hilsha, Cat fish, Ribbon fish, Prawn, Silver and Chinese Pomfret etc.<i> Crabs -</i> Live and soft shell (Live male crabs of all grades, Female crabs with full eggs).<i>Vegetables -</i> Potato,Brinjal, Green chillies,VignaSinensis,Turnip,Cucumber,ColoasiaEsculanta, Lemon, Raw papaya, Bitter gourd, Pointed gourd, Bettle leaf etc.<i>Fruits -</i> Mango, Banana, Jackfruit, Litchi, Coconut, Guava etc.--}}

                    {{--</p>--}}
                </div>

                <div class="row product_carousel ">
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                            <div class="member">
                                <div class="member-img">
                                    <img style="height: 250px; width: 100%" src="{{asset($product->images[0]->image)}}" class="img-fluid" alt="">
                                    <div class="social bg-warning">
                                        <a href="{{route('products.details', $product->slug)}}"><i class="icofont-arrow-right"></i> Read More</a>
                                    </div>
                                </div>
                                <a href="{{route('products.details', $product->slug)}}">
                                <div class="member-info">
                                    <h4 style="height: 50px;">{{$product->title}}</h4>
                                </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Team Section -->
        <!-- End Clients Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Services</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="icon-box">
                            <div class="icon"><i class="icofont-computer"></i></div>
                            <h4 class="title"><a href="">Export Fish & Crabs</a></h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="icofont-chart-bar-graph"></i></div>
                            <h4 class="title"><a href="">Export Fruits</a></h4>
                            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="icofont-earth"></i></div>
                            <h4 class="title"><a href="">Export Vegetables</a></h4>
                            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Values Section ======= -->
        <section id="values" class="values">
            <div class="container">

                <div class="row">
                    <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="card" style="background-image: url({{asset('frontend/assets/img/mission.png')}});">
                            <div class="card-body">
                                <h5 class="card-title"><a href="">Our Mission</a></h5>
                                <p class="card-text">Our mission is to provide fresh sea fishes, crabs, fruits and vegetables for every people of each corner of the world.</p>
                                <div class="read-more"><a href="#about"><i class="icofont-arrow-right"></i> Learn More</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="card" style="background-image: url({{asset('frontend/assets/img/vision.jpg')}});">
                            <div class="card-body">
                                <h5 class="card-title"><a href="">Our Vision</a></h5>
                                <p class="card-text">Our vision is to expand our business to every remote corner of the world to provide fresh foods for all.</p>
                                <div class="read-more"><a href="#about"><i class="icofont-arrow-right"></i> Leran More</a></div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End Values Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-up">Items we provide</h2>
                    <p data-aos="fade-up">We provide following items. We export these healthy and fresh items as per your requirements.</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach($categories as $category)
                                <li data-filter="{{'.'.$category->name}}">{{$category->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 portfolio-item {{$product->category->name}}">
                        <img style="height: 300px" src="{{asset($product->images[0]->image)}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>{{$product->title}}</h4>
                            <p>@php echo($product->description) @endphp</p>
                            <a href="{{asset($product->images[0]->image)}}" data-gall="portfolioGallery" class="venobox preview-link" title="{{$product->title}}"><i class="bx bx-plus"></i></a>
                            <a href="{{route('products.details', $product->slug)}}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    @endforeach


                </div>

            </div>
        </section><!-- End Portfolio Section -->



        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container-fluid px-5">

                <div class="section-title">
                    <h2 data-aos="fade-up">F.A.Q</h2>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">What services do you provide? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                                <p>
                                    We are competent chilled/fresh fish exporter from Bangladesh.
                                    Tilapia, Mackerel, Shrimp, Hilsha are our major products.
                                    We can supply our fish product to any destination as demanded by
                                    importers/buyers
                                    High Quality and minimum lead time is the main feature of our supply
                                    company.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">Where Can I Buy Your Products? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                                <p>
                                    You can contact us through phone, email or any other social media that we provide in our website.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">How you'll send products? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                                <p>
                                    Please contact with us for any business query.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">How many days you take to send products? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                                <p>
                                    Please contact with us for any business query.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </section><!-- End F.A.Q Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-up">Contact</h2>
                </div>

                <div class="row justify-content-center">

                    <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up">
                        <div class="info-box">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p>Holding No # 24, Road # 08 Sector # 6, Uttara, Dhaka-1230</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="info-box">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p>mschain2019@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="info-box">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p>+880248958899<br>+8801776199894</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="col-xl-9 col-lg-12 mt-4">
                        <form id="contact-form" role="form" action="{{route('contact.store')}}" method="post"
                        enctype="multipart/form-data" class="php-email-form">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="phone" data-rule="minlen:4" data-msg="Please enter at least 11 chars of phone" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                {{--<div class="error-message"></div>--}}
                                {{--<div class="sent-message">Your message has been sent. Thank you!</div>--}}
                            </div>
                            <div class="text-center"><button id="submit_contact"  type="submit">Send Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
@section('page_scripts')
<script>
    //For get event Form Feedback on submit
    $('#contact-form').on('submit', function(event){
    event.preventDefault();
    var formData = new FormData(this);
    console.log(formData);
    //Ajax Send Request
    $.ajax({
        url: '{{ route('api.send.contactdata') }}', //Name Api Route
        method: 'POST', //Method Request
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        beforeSend:function() {
        $('#submit_contact').attr('disabled', 'disabled');
        $('#submit_contact').html('SENDING...');
    },
    success:function(data) {
    //Json Parse for Response of Request
    data = JSON.parse(data);
    //If response message success
    if (data.message == "success") {
        document.getElementById("contact-form").reset();
        //Show Sweet Alert Success
        Toastify({
        text: "Your message has been sent successfully!",
        duration: 3000,
        position: 'center', // `left`, `center` or `right`
        backgroundColor: "green"
    }).showToast();
        $('#submit_contact').attr('enabled', 'enabled');
        setTimeout(function(){
            window.location.reload();
        }, 5000);
        //If response message failed
    } else if (data.message == "failed") {
        //Show Sweet Alert Error
        Toastify({
        text: "Something Wrong Has Happened!",
        duration: 3000,
        position: 'center', // `left`, `center` or `right`
        backgroundColor: "darkred"
    }).showToast();
        $('#submit_contact').attr('enabled', 'enabled');
    //                    setTimeout(function(){
    //                        window.location.reload(1);
    //                    }, 5000);
    } else {
        //Show Sweet Alert Error
        Toastify({
        text: "Something Wrong Has Happened!",
        duration: 3000,
        position: 'center', // `left`, `center` or `right`
        backgroundColor: "darkred"
    }).showToast();
        $('#submit_contact').attr('enabled', 'enabled');
    }
    },
    error:function(data, xhr) {
    $('#submit_contact').attr('disabled', false);
    $('#submit_contact').attr('enabled', 'enabled');
    $('#submit_contact').html('Submit');
    //                document.getElementById("agent-form").reset();
    //Show Sweet Alert Error
    Toastify({
        text: "Something Wrong Has Happened!",
        duration: 3000,
        position: 'center', // `left`, `center` or `right`
        backgroundColor: "darkred"
    }).showToast();
    }
    });
    });
</script>

<script>
    $(document).ready(function(){
        $('.product_carousel').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            autoplay: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });
</script>

{{--<script>--}}
{{--//MENU ACTIVE CLASS & SCROLL--}}
{{--$(window).scroll(function(){--}}
{{--if ($(window).scrollTop() > $('header').outerHeight()) {--}}
{{--$('.nav-wrapper').addClass('fixed');--}}
{{--} else {--}}
{{--$('.nav-wrapper').removeClass('fixed');--}}
{{--}--}}
{{--});--}}

{{--$(document).ready(function(){--}}
{{--$('a[href^="#"]').on('click',function (e) {--}}
{{--e.preventDefault();--}}
{{--var target = this.hash;--}}
{{--var $target = $(target);--}}
{{--var scroll;--}}
{{--if($(window).scrollTop()==0){--}}
    {{--scroll =  ($target.offset().top) - 160--}}
{{--}else{--}}
    {{--scroll =  ($target.offset().top) - 60--}}
{{--}--}}
{{--$('html, body').stop().animate({--}}
    {{--'scrollTop': scroll--}}
{{--}, 500, 'swing', function () {--}}
    {{--//window.location.hash = target;--}}
{{--});--}}
{{--});--}}
{{--});--}}

{{--$(window).on('scroll', function () {--}}
{{--var sections = $('section')--}}
{{--, nav = $('.mschainnavbar')--}}
{{--, nav_height = nav.outerHeight()--}}
{{--, cur_pos = $(this).scrollTop();--}}
{{--sections.each(function() {--}}
{{--var top = $(this).offset().top - nav_height,--}}
    {{--bottom = top + $(this).outerHeight();--}}

{{--if (cur_pos >= top && cur_pos <= bottom) {--}}
    {{--nav.find('ul li a').removeClass('active');--}}
    {{--sections.removeClass('active');--}}

    {{--$(this).addClass('active');--}}
    {{--nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');--}}
{{--}--}}
{{--});--}}
{{--});--}}
{{--</script>--}}
@endsection
