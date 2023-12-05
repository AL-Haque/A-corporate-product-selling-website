<div class="container-fluid bg-dark footer mt-1 pt-1 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-4">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h5 class="fw-bold text-primary mb-4">{{ $content->com_name }}</h5>
                <p>{!! Str::limit($about->description, 100) !!}</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href="{{ $content->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href="{{ $content->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href="{{ $content->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-0" href="{{ $content->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Address</h5>
                <p><i class="fa fa-map-marker-alt me-3"></i>{{ $content->address }}</p>
                <p><i class="fa fa-phone-alt me-3"></i>{{ $content->phone }}</p>
                <p><i class="fa fa-envelope me-3"></i>{{ $content->email }}</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Quick Links</h5>
                <a class="btn btn-link" href="{{ route('products') }}">Products</a>
                <a class="btn btn-link" href="{{ route('about') }}">About Us</a>
                <a class="btn btn-link" href="{{ route('contact') }}">Contact Us</a>
                <a class="btn btn-link" href="{{ route('gallery') }}">Gallery</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-3">Address Two</h5>
                <div class="row">
                    <p><i class="fa fa-map-marker-alt me-3"></i>{{ $content->address_two }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="#"><?php echo date('Y'); ?>, {{ $content->com_name }}</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed & Developed By <a href="linktechbd.com">Link-Up Technology Ltd.</a>
                    <!-- <br>Distributed By: <a href="https://themewagon.com/" target="_blank">ThemeWagon</a> -->
                </div>
            </div>
        </div>
    </div>
</div>