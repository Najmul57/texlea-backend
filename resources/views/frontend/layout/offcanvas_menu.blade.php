<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasItem" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel"><img
                src="{{ asset('uploads/setting/'.$settings->offcanvas_logo) }}" alt=""></h5>
        <button type="button" class="btn-close sidebar__address" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="d-lg-none">
            <div class="mobile__menu">
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><a href="about.html">about</a></li>
                    <li>
                        <a id="categoryToggle" href="javascript:void(0)">Category <i
                                class="fa fa-angle-right"></i></a>
                        <ul class="mobile__category">
                            <li>
                                <div class="mobile__sub__cat__toggle">
                                    <a class="categoryToggleMobile" href="category.html">apprel </a> <i
                                        class="fa fa-angle-right apprelToggle"></i>
                                </div>
                                <ul class="mobile_sub_category">
                                    <li>
                                        <div class="last_toggle">
                                            <a href="category.html">baby</a><i
                                                class="fa fa-angle-right lastToggle"></i>
                                        </div>
                                        <ul class="mobile__last__category">
                                            <li><a href="category.html">last category</a></li>
                                            <li><a href="category.html">last category</a></li>
                                            <li><a href="category.html">last category</a></li>
                                            <li><a href="category.html">last category</a></li>
                                            <li><a href="category.html">last category</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="last_toggle">
                                            <a href="category.html">baby</a><i
                                                class="fa fa-angle-right lastToggle"></i>
                                        </div>
                                        <ul class="mobile__last__category">
                                            <li><a href="category.html">last category</a></li>
                                            <li><a href="category.html">last category</a></li>
                                            <li><a href="category.html">last category</a></li>
                                            <li><a href="category.html">last category</a></li>
                                            <li><a href="category.html">last category</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="last_toggle">
                                            <a href="category.html">baby</a><i
                                                class="fa fa-angle-right lastToggle"></i>
                                        </div>
                                        <ul class="mobile__last__category">
                                            <li><a href="category.html">last category</a></li>
                                            <li><a href="category.html">last category</a></li>
                                            <li><a href="category.html">last category</a></li>
                                            <li><a href="category.html">last category</a></li>
                                            <li><a href="category.html">last category</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="last_toggle">
                                            <a href="category.html">baby</a><i
                                                class="fa fa-angle-right lastToggle"></i>
                                        </div>
                                        <ul class="mobile__last__category">
                                            <li><a href="category.html">last category</a></li>
                                            <li><a href="category.html">last category</a></li>
                                            <li><a href="category.html">last category</a></li>
                                            <li><a href="category.html">last category</a></li>
                                            <li><a href="category.html">last category</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="mobile__sub__cat__toggle">
                                    <a class="categoryToggleMobile" href="category.html">footwear </a> <i
                                        class="fa fa-angle-right apprelToggle"></i>
                                </div>
                                <ul class="mobile_sub_category">
                                    <li><a href="category.html">kids</a></li>
                                    <li><a href="category.html">men</a></li>
                                    <li><a href="category.html">women</a></li>
                                </ul>
                            </li>
                            <li>
                                <div class="mobile__sub__cat__toggle">
                                    <a class="categoryToggleMobile" href="category.html">handicraft </a> <i
                                        class="fa fa-angle-right apprelToggle"></i>
                                </div>
                                <ul class="mobile_sub_category">
                                    <li><a href="category.html">baby</a></li>
                                    <li><a href="category.html">kids</a></li>
                                    <li><a href="category.html">men</a></li>
                                    <li><a href="category.html">women</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="location.html">Global Location</a></li>
                </ul>
            </div>

            <div class="mobile__social">
                <ul class="d-flex align-items-center" style="gap: 20px;">
                    <!-- <li><span title="search" data-bs-toggle="modal" data-bs-target="#searchModal"><i
                                class="fa fa-search"></i></span></li> -->
                    <li><a href="{{ $settings->facebook }}" title="facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="{{ $settings->linkedin }}" title="linkedin"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    <li><a href="{{ $settings->instagram }}" title="instagram"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="{{ $settings->twitter }}" title="twitter"><i class="fa-brands fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar_address_contact">
            <ul>
                <li>
                    <span><i class="fa-solid fa-location-dot"></i></span>
                    <span>{{ $settings->italy_office }}</span>
                </li>
                <li>
                    <span><i class="fa-solid fa-location-dot"></i></span>
                    <span>{{ $settings->dhaka_office }}</span>
                </li>
                <li>
                    <span><i class="fa-regular fa-envelope"></i></span>
                    <span><a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></span>
                </li>
                <li>
                    <span><i class="fa-solid fa-phone-volume"></i></span>
                    <span><a href="tel:+{{ $settings->phone }}">+{{ $settings->phone }}</a></span>
                </li>
            </ul>
            <button type="button" class="btn account__btn"><a href="{{ url('/login') }}">Login</a></button>
        </div>
    </div>
</div>