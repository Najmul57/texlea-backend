<div class="portfolio-area my-5">
    <div class="section__heading text-center">
        <h4>Product Ensemble</h4>
        <p>With a wide-ranging product portfolio, we meet diverse needs with top-notch quality. Whether you're
            after functional attire or the latest fashion trends, we've got you covered. From ideation to
            delivery, our expert team ensures a seamless journey, providing tailored solutions and exceeding
            expectations at every turn.</p>
    </div>
    <div class="container">
        <div class="row g-3">
            @foreach ($categories as $category)
                <div class="col-lg-4 col-md-6">
                    <div class="single-portfolio">
                        <div class="portfolio-image">
                            <img src="{{ asset('uploads/category/' . $category->image) }}" alt="" class="w-100">
                        </div>
                        <a href="{{ route('category',$category->slug) }}" class="portfolio-title">
                            {{ ucfirst($category->name) }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
