<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- <div class="sb-sidenav-menu-heading">Core</div> --}}
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                {{-- <div class="sb-sidenav-menu-heading">Interface</div> --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Web Contents
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('slider.index') }}">Slider</a>
                        <a class="nav-link" href="{{ route('brand.index') }}">Brand</a>
                        <a class="nav-link" href="{{ route('category.index') }}">Category</a>
                        <a class="nav-link" href="{{ route('product.index') }}">Add Product</a>
                        <a class="nav-link" href="{{ route('abouts') }}">About Us</a>
                        <a class="nav-link" href="{{ route('gallery.index') }}">Photo Gallery</a>
                        <a class="nav-link" href="{{ route('management.index') }}">Management</a>
                    </nav>
                </div>
                
                {{-- <div class="sb-sidenav-menu-heading">Addons</div> --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#settingLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                    Settings
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="settingLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('company.profile') }}">Company Profile</a>
                    </nav>
                </div>

                <a class="nav-link {{ Route::is('messages.index') ? 'active' : '' }}" href="{{ route('messages.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                    Public Message
                </a>
            </div>
        </div>
    </nav>
</div>