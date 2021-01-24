{{--/**--}}
 {{--* Created by: Shawon--}}
 {{--*/--}}
@extends('frontend.master')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>{{$product->title}}</li>
                </ol>
                <h2>{{$product->title}} Details</h2>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section class="portfolio-details">
            <div class="container">

                <div class="portfolio-details-container">

                    <div class="owl-carousel portfolio-details-carousel">
                        @foreach($product->images as $image)
                        <img src="{{asset($image->image)}}" class="img-fluid" alt="">
                        @endforeach
                    </div>

                    <div class="portfolio-info">
                        <h3>Product information</h3>
                        <ul>
                            <li><strong>Category</strong>: {{$product->category->name}}</li>
                            <li><strong>Product Name</strong>: {{$product->title}}</li>
                            <li><strong>Product Updated</strong>: {{$product->created_at->diffForHumans()}}</li>
                        </ul>
                    </div>

                </div>

                <div class="portfolio-description">
                    <h2>{{$product->title}}</h2>
                    <p>
                        @php echo($product->description) @endphp
                    </p>
                </div>
            </div>
        </section><!-- End Portfolio Details Section -->

    </main>
    <!-- End #main -->
@endsection
