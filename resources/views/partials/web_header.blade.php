<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar row gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-5">
            <a href="{{ route('index') }}" class="navbar-brand">
                <div class="d-flex justify-content-between">
                    <h5 class="fw-bold text-black mt-4">{{ $content->com_name }}</h5>
                    <img src="{{ asset($content->logo) }}" alt="">
                </div>
            </a>
        </div>
        <div class="col-lg-5 px-5 text-end mt-4">
            <a class="text-body ms-3" href="{{ $content->facebook }}" target="_blank"><i class="fab fa-facebook-f text-white"></i></a>
            <a class="text-body ms-3" href="{{ $content->twitter }}" target="_blank"><i class="fab fa-twitter text-white"></i></a>
            <a class="text-body ms-3" href="{{ $content->linkedin }}" target="_blank"><i class="fab fa-linkedin-in text-white"></i></a>
            <a class="text-body ms-3" href="{{ $content->youtube }}" target="_blank"><i class="fab fa-youtube text-white"></i></a>
        </div>
    </div>

    <div class="main-menu d-flex justify-content-between">
        <nav style="padding-left: 25rem">
            <ul>
                <li><a href="{{ route('index') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('products') }}"> Our Products <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    <ul class="sub-menu me-auto">
                        @php
                            $side_category = App\Models\Category::where('parent_id', 0)->with('children')->orderBy('name', 'asc')->get();
                        @endphp

                        @foreach ($side_category as $item)
                        <li><a href="{{ route('category.products', $item->id) }}">{{ $item->name }}
                            @if ($item->children->count() > 0)
                            <i class="fa fa-caret-right" aria-hidden="true"></i>
                            @endif
                        </a>
                        @if ($item->children->count() > 0)
                            <ul class="child-menu">
                                @foreach ($item->children as $child)
                                <li><a href="{{ route('category.products', $child->id) }}">{{ $child->name }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('management') }}">Managements</a></li>
                <li><a href="{{ route('gallery') }}">Photo Gallery</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
            </ul>
        </nav>

        <form action="{{ route('search.product') }}" method="GET" class="d-flex align-items-center align-self-center me-5">
            <input name="search" id="search" class="form-control shadow-none" type="search" placeholder="Search">
            <button class="btn btn-outline-success shadow-none" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>


</div>
