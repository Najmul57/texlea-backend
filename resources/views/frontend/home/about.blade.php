<div class="about-area py-5 ">
    <div class="container">
        <div class="row g-3">
            <div class="col-xl-6 col-md-12 col-lg-6" data-aos="fade-right" data-aos-offset="300"
                data-aos-easing="ease-in-sine">
                <div class="about-bg"
                    style="background-image: url({{ asset('uploads/about/' . $abouts->about_image) }})"></div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-12 d-flex align-items-center" data-aos="fade-left"
                data-aos-anchor="#example-anchor" data-aos-offset="500" data-aos-duration="500">
                <div class="promotion-text promo-2 pt-110 pb-110">
                    <h3>Directed by Italian Management</h3> <br>
                    <span><strong>About Texlea S.R.L.</strong></span>
                    <P>{!! $abouts->short_about !!}</P>
                    <a href="{{route('about')}}" class="btn about-btn">About US</a>
                </div>
            </div>
        </div>
    </div>
</div>