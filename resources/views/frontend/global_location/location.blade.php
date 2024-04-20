@extends('frontend.layout.frontend-master')

@section('content')
@include('frontend.layout.offcanvas_menu')
    <!-- office start -->
    <div class="office__start py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="office__active">
                        @foreach ($data as $item)
                            <div class="global__office">
                                <img src="{{ asset('uploads/location/' . $item->image) }}" alt="">
                                <h3>{{ ucfirst($item->name) }}</h3>
                                {!! preg_replace_callback(
                                    '/\b(\w)/',
                                    function ($match) {
                                        return strtoupper($match[0]);
                                    },
                                    $item->feature,
                                ) !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- office end -->
@endsection
