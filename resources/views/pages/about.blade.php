@extends('layouts.web_master')
@section('title', 'About')
@section('main_content')

<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s" >
    <div class="container">
        <h1 class="mb-3 animated slideInDown text-white">About Us</h1>
    </div>
</div>
<!-- Page Header End -->

<!-- About Start -->
<div class="container-xxl py-4">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-4 pe-0">
                    <img class="img-fluid w-100" src="{{ asset($about->image) }}">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="display-5 mb-4">{{ $about->title }}</h1>
                <p class="mb-4">{!! $about->description !!}</p>

            </div>
        </div>
    </div>
</div>
<!-- About End -->

@endsection
