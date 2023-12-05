@extends('layouts.web_master')
@section('title', 'Product Details')
@section('main_content')

<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="mb-3 animated slideInDown text-white">Products Details</h1>
        
    </div>
</div>
<!-- Page Header End -->

<!-- Product Details Section Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class = "card-wrapper">
            <div class="row">
                <!-- card left -->
                <div class="col-lg-6 col-md-6">
                    <div class ="product-imgs">
                        <div class ="img-display">
                            <div class ="img-showcase">
                                {{-- <img src="{{ asset($product->image) }}" alt="shoe image"> --}}
                                @foreach ($product->images as $item)
                                <img src="{{ asset($item->other_img) }}" alt="shoe image">
                                @endforeach
                            </div>
                        </div>
                        <div class="img-select">
                            {{-- <div class="img-item">
                                <a href="#" data-id="">
                                    <img src="{{ asset($product->image) }}" alt="shoe image">
                                </a>
                            </div> --}}
                            @foreach ($product->images as $key => $item)
                            <div class="img-item">
                                <a href="#" data-id="{{ $key + 1 }}">
                                    <img src="{{ asset($item->other_img) }}" alt="shoe image">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- card right -->
                <div class="col-lg-6 col-md-6">
                    <div class = "product-content">
                        <h2 class = "product-title">{{ $product->name }}</h2>
                        <div class = "product-price">
                            <!-- <p class = "last-price">Old Price: <span>$257.00</span></p> -->
                            {{-- <p class = "new-price">Price: <span>&#x09F3; {{ number_format($product->price, 2) }}</span></p> --}}
                        </div>
            
                        <div class = "product-detail">
                            <h2>about this item: </h2>
                            <p>{!! $product->description !!}</p>
                        </div>
            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product End -->

<!-- Related Product Section -->
<div class="container-xxl py-4 related_section">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5">Related Products</h1>
                </div>
            </div>
            
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    @foreach ($related_product as $item)   
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset($item->image) }}" alt="">
                                @if ($item->is_new == 1)
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 px-2">New</div>
                                @else
                                @endif
                            </div>
                            <div class="text-center p-2">
                                <a class="d-block h5 mb-2" href="{{ route('product.single', $item->slug) }}">{{ $item->name }}</a>
                                {{-- <span class="text-primary me-1">&#2547;{{ number_format($item->price, 2) }}</span> --}}
                            </div>
                            <div class="d-flex border-top">
                                <small class="w-100 text-center py-2">
                                    <a class="text-body" href="{{ route('product.single', $item->slug) }}"><i class="fa fa-eye text-primary me-2"></i>Visit Product</a>
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

@endsection