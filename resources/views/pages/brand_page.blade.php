@extends('layouts.web_master')
@section('title', 'Brand Page')
@section('main_content')

<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="mb-3 animated slideInDown text-white">Brand</h1>
    </div>
</div>
<!-- Page Header End -->

<!-- Our Brand Start -->
<div class="container-xxl py-4">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-3 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Our Brand</h1>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show p-0 active our_brand">
                <div class="row g-4">
                    @foreach ($all_brands as $item)
                    <div class="col-xl-2 col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="brand-item">
                            <a href="{{ route('brand.products', $item->id) }}" data-title="{{ $item->title }}">
                                <img class="img-fluid" src="{{ asset($item->image) }}" alt="">
                            </a>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our Brand End -->

@endsection