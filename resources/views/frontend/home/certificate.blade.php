<div class="certificate-area py-5 my-5">
    <div class="section__heading text-center">
        <h4>Our Certified Standards</h4>
        <p>The certifications we've acquired for our network of suppliers, products, and operational practices
            provide you with the confidence that your brand is committed to sourcing from premier partners and
            implementing best-in-class methods.</p>
    </div>
</div>

<div class="certificate-active pt-50 pb-50">
    @foreach ($certificates as $item)
        <div class="single-certificate">
            <img src="{{ asset('uploads/certificate/' . $item->image) }}" alt="">
        </div>
    @endforeach
</div>
