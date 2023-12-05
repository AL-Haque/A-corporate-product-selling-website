@extends('layouts.web_master')
@section('title', 'Products')
@section('main_content')

<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="mb-3 animated slideInDown text-white">Products</h1>
    </div>
</div>
<!-- Page Header End -->


<!-- Product Start -->
<div class="container-xxl py-4 product_pagesection">
    <div class="container-fluid">
        {{-- <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-3 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Our Products</h1>
                </div>
            </div>
        </div> --}}
        <div class="tab-content">
            <div class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="category_left">
                            <h4>Product Categories</h4>
                            <ul>
                                @foreach ($categories as $item)
                                <li><i class="fas fa-angle-right"></i> <a href="{{ route('category.products', $item->id) }}">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="row">
                            @foreach ($products as $item) 
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp mb-3" data-wow-delay="0.1s">
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
                                    <div class="text-center p-2 product_title">
                                        <a class="d-block mb-2" href="{{ route('product.single', $item->slug) }}">{{ Str::limit($item->name, 20) }}</a>
                                        {{-- <span class="text-primary me-1">&#2547;{{ number_format($item->price, 2) }}</span> --}}
                                        {{-- <span class="text-body text-decoration-line-through">&#2547;{{ $item->price }}</span> --}}
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-100 text-center py-3">
                                            <a class="text-body" href="{{ route('product.single', $item->slug) }}">Visite Product</a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                                {{ $products->links() }}
                                {{-- <a class="btn btn-primary rounded-pill py-3 px-5" href="#">Browse More Products</a> --}}
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product End -->

 
@endsection