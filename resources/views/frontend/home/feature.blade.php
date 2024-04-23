<div class="features-area py-5">
    <div class="container">
        <div class="row g-3">
            @foreach ($features as $feature)
                <div class="col-xl-4 col-lg-4 col-md-4" data-aos="fade-up" data-aos-duration="3000">
                    <div class="single-features text-center animated-element">
                        <img src="{{ asset('uploads/feature/' . $feature->image) }}" alt="{{ $feature->name }}">
                        <h4>{{ $feature->count }}</h4>
                        <h2>{{ $feature->name }}</h2>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
