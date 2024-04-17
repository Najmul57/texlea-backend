<div class="slider-area slider__active">
    @foreach ($sliders as $slider)
        <div class="single-slider">
            <img src="{{ asset('uploads/slider/' . $slider->slide) }}" alt="{{ $slider->title }}" class="w-full">
            <div class="slider__content">
                <h4>{{ $slider->title }}</h4>
                <div class="slider__btn">
                    <a href="" class="btn btn-sm">About US</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
