@extends('layouts.web_master')
@section('title', 'Home')
@section('main_content')

<!-- Carousel Start -->
@include('partials.slider')
<!-- Carousel End -->

<!-- Our Product Section Start -->

<section>
    <div class="container">
        <div class="row" style="padding-bottom:80px; ">
            <h3 style="color: brown; padding-top: 50px;  border-bottom: 2px solid brown;">Top product</h3>
            @foreach ($home_firstproduct as $item)
            <div class="col-2" style="padding-top: 40px">
                <div class="card center">

                    <a href="{{ route('product.single', $item->slug) }}">
                    <div class="card-body" >
                        <img src="{{ asset($item->image) }}"
                            style=" border:1px solid rgb(243, 235, 235);border-radius: 50%; height:170px; width: 170px;">
                        <!-- <p style="background:brown; color: white;">Product Name(Model)</p> -->
                    </div>
                </a>
                    <div class="name" style="height: 125px; width:194px;font-size:10px;box-shadow: 0 6px 20px 0 rgba(0,0,0,.15);">
                        <p style="text-align: center; font-size:15px; font-weight:500; color: brown; background-color: #fff;">{{$item->name}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-sm-2">
                <div class="card center">
                    <div class="card-body">
                        <img src="uploads/product/32.380.58_6399bffc05ef2.jpg"
                            style="border-radius: 50%; height:170px; width: 170px;">
                        <!-- <p style="background:brown; color: white;">Product Name(Model)</p> -->
                    </div>
                    <div class="name">
                        <h5 style="text-align: center; color: brown; background-color: #fff; ">Product name</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="card center">
                    <div class="card-body">
                        <img src="uploads/product/06.400.10_6399bae6d9620.jpg"
                            style="border-radius: 50%; height:170px; width: 170px;">
                        <!-- <p style="background:brown; color: white;">Product Name(Model)</p> -->
                    </div>
                    <div class="name">
                        <h5 style="text-align: center; color: brown; background-color: #fff; ">Product name</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="card center">
                    <div class="card-body">
                        <img src="uploads/product/1-1F3022045050-L_639847f86bb12.jpg"
                            style="border-radius: 50%; height:170px; width: 170px;">
                        <!-- <p style="background:brown; color: white;">Product Name(Model)</p> -->
                    </div>
                    <div class="name">
                        <h5 style="text-align: center; color: brown; background-color: #fff; ">Product name</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="card center">
                    <div class="card-body center">
                        <img src="uploads/product/1-1F303094H90-L_63984596d3690_639efd7525f0b.jpg"
                            style="border-radius: 50%; height:170px; width: 170px;">
                        <!-- <p style="background:brown; color: white;">Product Name(Model)</p> -->
                    </div>
                    <div class="name">
                        <h5
                            style="text-align: center; color: brown; background-color: #fff; padding-left: .3rem; padding-right: .3rem; ">
                            Product name</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="card center">
                    <div class="card-body">
                        <img src="uploads/product/06.300.10_6399ba3b3ddcd.jpg"
                            style="border-radius: 50%; height:170px; width: 170px;">
                        <!-- <p style="background:brown; color: white;">Product Name(Model)</p> -->
                    </div>
                    <div class="name">
                        <h5 style="text-align: center; color: brown; background-color: #fff; ">Product name</h5>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- </div> -->
</section>


 <section>

        <div class="row " style="  background-color: 	#033047; padding-bottom: 50px;  padding-left:40px;padding-right:20px">
            <div class="head" style="padding-top:30px;padding-bottom: 30px;">
                <h2 style="color:#fff ;border-bottom:2px solid #fff; border-radius: 10px;">Shopping with Category
                    Product</h2>
            </div>
            <div class="row row-cols-5">
                @foreach ($categories as $item)


            <div class="col" style="padding-bottom:60px">
                <div class="product" >
                    <img src="{{ asset($item->image) }}" alt="Avatar" class="image">
                    <p style=" padding:1rem; text-align: justify; background-color: brown;
                     height:120px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; color: white;">
                        {{$item->name}}</p>
                    <div class="overlay" >
                        <h5
                            style="text-align: center; color:white; padding-top: 2rem;padding-left: 2rem; padding-right: 2rem;font-size:1rem   ">
                           {{$item->name}}
                        </h5>
                        {{-- <p
                            style="text-align: center; color:white; font-size: 15px; padding-left: 2rem; padding-Right: 2rem; ">
                            Trinocular Digital Microscope Model No.LBM-F22</p> --}}

                        <div class="button center" style="border-radius: 5px"> <a href="{{route('category.products',$item->id)}}"><button type="button"> Product Details</button></a> </div>
                    </div>

                </div>
            </div>
            @endforeach
        {{-- <div class="col">
                <div class="product">
                    <img src="uploads/product/32.020.000_32.030.000_32.050.000_32.060.000_6399c233866c0.jpg"
                        alt="Avatar" class="image">
                    <p style=" padding:1rem; text-align: justify; background-color: brown;
                        height:80px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; color: white;">
                        Trinocular Digital Microscope Model No.LBM-F22</p>
                    <div class="overlayy">
                        <h5
                            style="text-align: center; color:white; padding-top: 2rem;padding-left: 2rem; padding-right: 2rem;   ">
                            Trinocular Digital Microscope Model No.LBM-F22
                        </h5>
                        <p
                            style="text-align: center; color:white; font-size: 15px; padding-left: 2rem; padding-Right: 2rem; ">
                            Trinocular Digital Microscope Model No.LBM-F22</p>

                        <div class="button center"><button type="button">See Product</button></div>
                    </div>
                </div>

            </div>

        </div> --}}
        </div>


    </section>




{{-- <div class="container-xxl py-3 our_product_sec">
    <div class="container">
        <div class="text-center mx-auto mb-4 product_head" style="max-width: 500px;">
            <h5>Our Products</h5>
            <h1 class="display-5 mb-2">At a Glance</h1>
        </div>

        <div class="row g-5 align-items-center">
            @foreach ($home_firstproduct as $item)
            <div class="col-lg-6">
                <div class="cate-img">
                    <img src="{{ asset($item->image) }}" alt="Avatar" class="image">
                    <div class="cat_content">
                        <div class="cat_text">
                            <i class="fas fa-globe"></i>
                            <h4>{{ $item->name }}</h4>
                        </div>
                    </div>

                    <div class="overlay">
                        <div class="text">
                            <i class="fas fa-globe"></i>
                            <h4>{{ $item->name }}</h4>
                            <p>{!! Str::limit($item->description, 60) !!}</p>
                            <a href="{{ route('product.single', $item->slug) }}">Visite Product</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div> --}}
<!-- Our Product Section End -->

<!-- Product Section Start -->




{{-- <div class="container-xxl product_section">
    <div class="container">

        <div class="row">
            @foreach ($products as $item)
            <div class="col-xs-6 col-sm-4 col-md-3 i">
                <div class="c text-center">
                    <div class="wrap">
                        <img src="{{ asset($item->image) }}" alt="#" width="270" height="270" class="img-responsive">
                        <div class="info">
                            <h4 class="position">{{ $item->name }}</h4>
                            <a href="{{ route('product.single', $item->slug) }}">Visit Products</a>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div> --}}
<!-- Product End -->

<!-- Brand Section Start -->
<div class="container-xxl py-4 brand_sec">
    <div class="container">
        <div class="text-center mx-auto mb-4 brand_head" style="max-width: 500px;">
            <h5>Brands</h5>
            <h1 class="display-5 mb-2">Some of the Products Brand</h1>
        </div>

        <div class="row">
            @foreach ($home_brand as $item)
            <div class="col-lg-2 col-md-6 mb-3">
                <div class="brand_img">
                    <a href="{{ route('brand.products', $item->id) }}"><img src="{{ asset($item->image) }}" class="img-fluid" alt=""></a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col">
                <div class="brand_btn d-flex justify-content-end">
                    <a href="{{ route('all.brand') }}">View All</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brand Section End -->

<!-- Photo Gallery Start -->
{{-- <div class="container-xxl py-5 home_gallery">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="section-header text-center mx-auto mb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5">Photo Gallery</h1>
                </div>

                <div class="row">
                    @foreach ($gallery as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp mb-4" data-wow-delay="0.1s">
                        <div class="photo-item">
                            <a href="{{ asset($item->image) }}" data-lightbox="img" data-title="{{ $item->title }}">
                                <img class="img-fluid" src="{{ asset($item->image) }}" alt="">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="section-header text-center mx-auto mb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5">News & Event</h1>
                </div>
                <div class="news_event_sec">
                    <marquee direction="up" behavior="scroll" scrollamount="3">
                        <div class="news_event p-3">
                            @foreach ($newsevent as $item)

                            <div class="">
                                <div class="row">
                                    <div class="col-md-3 col-4">
                                        <a href="{{ route('newsevent.single', $item->slug) }}"><img src="{{ asset($item->image) }}" class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="col-md-9 col-8">
                                        <div class="news_event_content">
                                            <a href="{{ route('newsevent.single', $item->slug) }}"><h5>{{ $item->title }}</h5></a>
                                            <p>{{ date('F j, Y',strtotime($item->created_at)) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </marquee>

                    <a href="{{ route('news.event') }}" class="news_btn">View All</a>
                </div>
            </div>

        </div>


    </div>
</div> --}}
<!-- Photo Gallery End -->

@endsection


