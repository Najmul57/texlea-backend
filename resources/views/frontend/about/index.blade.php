@extends('frontend.layout.frontend-master')

@section('content')

@include('frontend.layout.offcanvas_menu')

    <!-- about start -->
    <div class="about-area py-5 ">
        <div class="container">
            <div class="row g-3">
                <div class="col-xl-6 col-md-12 col-lg-6">
                    <div class="about-bg" style="background-image:url({{ asset('uploads/about/'.$data->about_image) }})"></div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-12 d-flex align-items-center">
                    <div class="promotion-text promo-2 pt-110 pb-110">
                        <h3>Directed by Italian Management</h3>
                        <span><strong>About Texlea S.R.L</strong></span>
                        {!! $data->long_about !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about end -->

    <!-- feature start -->
    <div class="feature__area py-5">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="feature__content card">
                        <h4>mission</h4>
                        {!! $data->mission !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="feature__image">
                        <img src="{{ asset('uploads/about/'.$data->mission_image) }}" class="w-100" alt="">
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="feature__image ">
                        <img src="{{ asset('uploads/about/'.$data->vission_image) }}" class="w-100" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="feature__content card">
                        <h4>vission</h4>
                        {!! $data->vission !!}
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="feature__content card">
                        <h4>quality</h4>
                        {!! $data->quality !!}
                    </div>
                </div>
                <div class="col-lg-6 order-last">
                    <div class="feature__image">
                        <img src="{{ asset('uploads/about/'.$data->quality_image) }}" class="w-100" alt="">
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6 order-fast">
                    <div class="feature__image">
                        <img src="{{ asset('uploads/about/'.$data->service_image) }}" class="w-100" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="feature__content card">
                        <h4>services</h4>
                        {!! $data->service !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feature end -->
@endsection
