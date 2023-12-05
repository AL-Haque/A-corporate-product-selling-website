@extends('layouts.master')
@section('title', 'Home')
@section('main-content')
<main>
    <div class="container-fluid">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Dashboard</span>
        </div>
        <div class="row mt-3">
            <div class="dashboard-logo text-center pt-3 pb-4">
                <img class="border p-2" style="height: 100px;" src="{{ asset($content->logo) }}" alt="">
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('product.index') }}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fab fa-product-hunt fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Add Product</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('category.index') }}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="far fa-money-bill-alt fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Category</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('brand.index') }}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fas fa-images fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Add Brand</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('management.index') }}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fas fa-tasks fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Management</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('messages.index') }}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Public Message</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('company.profile') }}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Company Profile</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('gallery.index') }}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="far fa-money-bill-alt fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Photo Gallery</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('admin.logout') }}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fa fa-sign-out-alt fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Sign Out</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection