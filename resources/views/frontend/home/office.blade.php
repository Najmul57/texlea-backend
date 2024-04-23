<div class="office__location py-5" style="background-image: url({{ asset('frontend') }}/images/office-bg.jpg);">
    <div class="section__heading text-center">
        <h4 class="bg-white py-2 px-3" style="display: inline;border-radius: 10px;">Worldwide Reach</h4>
    </div>
    <div class="container">
        <div class="row g-3">
            @foreach ($offices as $office)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single__office">
                        <div class="office__image">
                            <img src="{{ asset('uploads/country/' . $office->image) }}" alt="">
                        </div>
                        <div class="office__feature">
                            {!! preg_replace_callback(
                                '/\b(\w)/',
                                function ($match) {
                                    return strtoupper($match[0]);
                                },
                                $office->list,
                            ) !!}
                        </div>
                    </div>
                    <h4 class="office_name">{{ ucfirst($office->name) }}</h4>
                </div>
            @endforeach
        </div>
    </div>
</div>
