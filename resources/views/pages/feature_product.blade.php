@extends('layouts.web_master')
@section('title', 'Feature Products')
@section('main_content')

<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown text-white">Feature Products</h1>
        
    </div>
</div>
<!-- Page Header End -->


<!-- Product Start -->
<div class="container-xxl py-4">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-3 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Feature Products</h1>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    @foreach ($feature_products as $item) 
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset($item->image) }}" alt="">
                                @if ($item->is_new == 1) 
                                <div class="bg-secondary rounded text-white position-absolute start-0 top-0 py-1 px-2">
                                    New
                                </div>
                                @else
                                @endif
                            </div>
                            <div class="text-center p-2">
                                <a class="d-block h5 mb-2" href="{{ route('product.single', $item->slug) }}">{{ $item->name }}</a>
                                <span class="text-primary me-1">&#2547;{{ number_format($item->price, 2) }}</span>
                                {{-- <span class="text-body text-decoration-line-through">&#2547;{{ $item->price }}</span> --}}
                            </div>
                            <div class="d-flex border-top">
                                <small class="w-100 text-center py-2">
                                    <a class="text-body" href="{{ route('product.single', $item->slug) }}"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                </small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product End -->

 
@endsection