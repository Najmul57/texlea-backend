<header>
    <div class="header-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-6">
                    <div class="header-left">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('uploads/setting/' . $settings->logo) }}" alt="logo">
                            </a>
                        </div>
                        <div class="header-menu d-none d-lg-block">
                            <ul>
                                <li><a href="{{ url('/') }}">home</a></li>
                                <li><a href="{{ route('about') }}">about</a></li>

                                @php
                                    $categories = \App\Models\Category::latest()->get();
                                @endphp

                                <li><a href="javascript:void(0)">category <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub__category">
                                        @foreach ($categories as $category)
                                            @php
                                                $subcategories = $category->subcategories()->latest()->get();
                                            @endphp

                                            @if ($subcategories->isNotEmpty())
                                                <li>
                                                    <a href="{{ route('category',$category->slug) }}">{{ $category->name }} <i
                                                            class="fa fa-angle-right"></i></a>
                                                    <ul class="child__category">
                                                        @foreach ($subcategories as $subcategory)
                                                            @php
                                                                $childcategories = $subcategory
                                                                    ->childcategories()
                                                                    ->latest()
                                                                    ->get();
                                                            @endphp

                                                            @if ($childcategories->isNotEmpty())
                                                                <li>
                                                                    <a href="{{ route('subcategory',$subcategory->slug) }}">{{ $subcategory->name }} <i
                                                                            class="fa fa-angle-right"></i></a>
                                                                    <ul class="subchild__category">
                                                                        @foreach ($childcategories as $childcategory)
                                                                            <li><a
                                                                                    href="{{ route('childcategory',$childcategory->slug) }}">{{ $childcategory->name }}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                            @else
                                                                <li>
                                                                    <a href="{{ route('subcategory',$subcategory->slug) }}">{{ $subcategory->name }}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>

                                <li><a href="{{ route('global.location') }}">Global Location</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-5 d-flex align-items-center justify-content-end">
                    <div class="header-right">
                        <ul>
                            <!-- <li class="d-none d-lg-block"><span title="search" data-bs-toggle="modal"
                                    data-bs-target="#searchModal"><i class="fa fa-search"></i></span></li> -->
                            <li class="d-none d-lg-block"><a href="{{ $settings->facebook }}" title="facebook" target="_blank"><i
                                        class="fa-brands fa-facebook-f"></i></a></li>
                            <li class="d-none d-lg-block"><a href="{{ $settings->linkedin }}" title="linkedin" target="_blank"><i
                                        class="fa-brands fa-linkedin-in"></i></a></li>
                            <li class="d-none d-lg-block"><a href="{{ $settings->instagram }}" title="instagram" target="_blank"><i
                                        class="fa-brands fa-instagram"></i></a></li>
                            <li class="d-none d-lg-block"><a href="{{ $settings->twitter }}" title="twitter" target="_blank"><i
                                        class="fa-brands fa-twitter"></i></a></li>

                            <li><span title="bars" data-bs-toggle="offcanvas" href="#offcanvasItem" role="button"
                                    aria-controls="offcanvasExample"><i class="fa-solid fa-bars-staggered"></i></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
