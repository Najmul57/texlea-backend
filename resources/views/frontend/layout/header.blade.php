<header>
    <div class="header-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-6">
                    <div class="header-left">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('uploads/setting/'.$settings->logo) }}" alt="logo">
                            </a>
                        </div>
                        <div class="header-menu d-none d-lg-block">
                            <ul>
                                <li><a href="{{ url('/') }}">home</a></li>
                                <li><a href="about.html">about</a></li>
                                <li><a href="category.html">category <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub__category">
                                        <li><a href="category.html">apparel <i class="fa fa-angle-right"></i></a>
                                            <ul class="child__category">
                                                <li><a href="category.html">babies<i class="fa fa-angle-right"></i></a>
                                                    <ul class="subchild__category">
                                                        <li><a href="category.html">Baby T-Shirt, Tops</a></li>
                                                        <li><a href="category.html">Baby Clothes</a></li>
                                                        <li><a href="category.html">Organic Baby Clothing</a></li>
                                                        <li><a href="category.html">kids</a></li>
                                                        <li><a href="category.html">kids</a></li>
                                                        <li><a href="category.html">kids</a></li>
                                                        <li><a href="category.html">kids</a></li>
                                                        <li><a href="category.html">kids</a></li>
                                                        <li><a href="category.html">kids</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="category.html">kids</a></li>
                                                <li><a href="category.html">men</a></li>
                                                <li><a href="category.html">women</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="category.html">footwear <i class="fa fa-angle-right"></i></a>
                                            <ul class="child__category">
                                                <li><a href="category.html">men</a></li>
                                                <li><a href="category.html">women</a></li>
                                                <li><a href="category.html">kids</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="category.html">handicraft <i class="fa fa-angle-right"></i></a>
                                            <ul class="child__category">
                                                <li><a href="category.html">Pottery</a></li>
                                                <li><a href="category.html">Bamboo</a></li>
                                                <li><a href="category.html">Brass handicrafts</a></li>
                                                <li><a href="category.html">Marble Craft</a></li>
                                                <li><a href="category.html">Carving</a></li>
                                                <li><a href="category.html">Carpet weaving</a></li>
                                                <li><a href="category.html">Terracotta</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="location.html">Global Location</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-5 d-flex align-items-center justify-content-end">
                    <div class="header-right">
                        <ul>
                            <!-- <li class="d-none d-lg-block"><span title="search" data-bs-toggle="modal"
                                    data-bs-target="#searchModal"><i class="fa fa-search"></i></span></li> -->
                            <li class="d-none d-lg-block"><a href="{{ $settings->facebook }}" title="facebook"><i
                                        class="fa-brands fa-facebook-f"></i></a></li>
                            <li class="d-none d-lg-block"><a href="{{ $settings->linkedin }}" title="linkedin"><i
                                        class="fa-brands fa-linkedin-in"></i></a></li>
                            <li class="d-none d-lg-block"><a href="{{ $settings->instagram }}" title="instagram"><i
                                        class="fa-brands fa-instagram"></i></a></li>
                            <li class="d-none d-lg-block"><a href="{{ $settings->twitter }}" title="twitter"><i
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
