@extends('frontend.layout.frontend-master')
@section('content')
    @include('frontend.layout.offcanvas_menu')

    <div class="breadcrumb-area" style="background-image: url({{ asset('frontend') }}/images/banner/banner-1.jpg);">
        <div class="container">
            <h4>{{ $childcategory->name }}</h4>
        </div>
    </div>

    <!-- portfolio start -->
    <div class="portfolio-area my-5">
        <div class="container">
            <div class="row g-3 gallery">
                @if ($data->isEmpty())
                    <h4 class="text-center card py-5">No Image Found</h4>
                @else
                    @foreach ($data as $item)
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ asset('uploads/product_gallery/' . $item->image) }}" class="single-portfolio">
                                <div class="portfolio-image">
                                    <img src="{{ asset('uploads/product_gallery/' . $item->image) }}" alt="" class="w-100">
                                </div>
                                <span>{{ $item->name }}</span>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>            
        </div>
    </div>
    <!-- portfolio end -->
@endsection
