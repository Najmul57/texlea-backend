
<!-- contact start -->
<div class="contact__area py-5">
    <div class="section__heading text-center">
        <h4>Connect with Us</h4>
    </div>
    <div class="container">
        <div class="row text-center g-3">
            <div class="col-lg-3 col-md-6">
                <div class="single__contact">
                    <img src="{{ asset('frontend') }}/images/feature/features1.png" alt="">
                    <h4>Dhaka Office</h4>
                    <p>{{ $settings->dhaka_office }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single__contact">
                    <img src="{{ asset('frontend') }}/images/feature/features1.png" alt="">
                    <h4>Italy Office</h4>
                    <p>{{ $settings->italy_office }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single__contact">
                    <img src="{{ asset('frontend') }}/images/feature/features1.png" alt="">
                    <h4>Contact Information</h4>
                    <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                    <a href="tel:+{{ $settings->phone }}">+{{ $settings->phone }}</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single__contact">
                    <img src="{{ asset('frontend') }}/images/contact/opening.png" alt="">
                    <h4>Opening Hours</h4>
                    <p>{{ $settings->duration }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contact__form py-5" style="background-color: #F7F7FD;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <form action="{{ route('form.submit') }}" method="post" class="card p-3"
                    style="box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25);">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Your Name" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Full Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Your Email" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" id="subject" class="form-control"
                            placeholder="Your Subject" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="message">Your Message</label>
                        <textarea name="message" id="message" cols="30" rows="5" placeholder="write your message"
                            class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- contact end -->
<!-- footer start -->
<footer>
    <div class="footer__area py-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-12 col-md-6">
                    <div class="single__footer">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('uploads/setting/'.$settings->logo) }}" alt="logo">
                        </a>
                        <p>Anabia Trading Ltd. is a global apparel buying & sourcing company. we are established
                            on
                            May 2013, located in the capital city of Bangladesh.</p>
                    </div>
                </div>
                <div class="col-xl-3 offset-xl-1  col-lg-4 col-md-6">
                    <div class="single__footer">
                        <h4>OUR LINKS</h4>
                        <ul>
                            <li><a href="{{ url('/') }}">home</a></li>
                            <li><a href="about.html">about us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single__footer footer_contact">
                        <h4>contact us</h4>
                        <ul>
                            <li>
                                <span>
                                    <i class="fa fa-location-dot"></i>
                                </span>
                                <span>
                                    {{ $settings->italy_office }}
                                </span>
                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-location-dot"></i>
                                </span>
                                <span>
                                    {{ $settings->dhaka_office }}
                                </span>
                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-phone"></i>
                                </span>
                                <span>
                                    <a href="tel:+88{{ $settings->phone }}">+88{{ $settings->phone }}</a>
                                </span>
                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <span>
                                    <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container">
            <span>
                2024 &copy;copyright | All rights reserved Texlea.
            </span>
            <span>
                Developed by <a href="">Classic IT</a>
            </span>
        </div>
    </div>
</footer>
<!-- footer end -->