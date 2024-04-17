@extends('frontend.layout.frontend-master')

@section('content')
    <!-- Search Modal -->
    @include('frontend.layout.search_modal')

    <!-- offcanvas -->
    @include('frontend.layout.offcanvas_menu')
    <!-- header end -->

    <!-- slider start -->
    @include('frontend.home.slider')
    <!-- slider end -->

    <!-- features-area start -->
    @include('frontend.home.feature')
    <!-- features-area start -->

    <!-- about start -->
    @include('frontend.home.about')
    <!-- about end -->

    <!-- certification start -->
    @include('frontend.home.certificate')
    <!-- certification end -->

    <!-- portfolio start -->
    @include('frontend.home.product')
    <!-- portfolio end -->

    <!-- office location start -->
    @include('frontend.home.office')
    <!-- office location end -->
@endsection
