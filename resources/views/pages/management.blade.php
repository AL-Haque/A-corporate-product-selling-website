@extends('layouts.web_master')
@section('title', 'Management')
@section('main_content')

<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="mb-3 animated slideInDown text-white">Managements</h1>
        
    </div>
</div>
<!-- Page Header End -->


<!-- Product Start -->
<div class="container-xxl py-4 management_sec">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-3 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Our Managements</h1>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    @foreach ($management as $item)
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="management-item">
                            <div class="card">
                                <img src="{{ asset($item->image) }}" class="" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p><strong>Post: {{ $item->designation }}</strong></p>
                                    <p class="mobile">{{ $item->phone }}</p>
                                </div>
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