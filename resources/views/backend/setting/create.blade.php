@extends('backend.layout.admin-master')

@section('admin-content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Feature List</h5>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('admin.panel') }}">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z"
                            stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                    Home</a>
            </li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body p-3">
                        <form action="{{ route('setting.update', $settings->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" name="phone" class="form-control" value="{{ $settings->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $settings->email }}">
                            </div>
                            <div class="form-group">
                                <label for="about">About</label>
                                <input type="text" name="about" class="form-control" value="{{ $settings->about }}">
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" class="form-control"
                                    value="{{ $settings->facebook }}">
                            </div>
                            <div class="form-group">
                                <label for="linkedin">Linkedin</label>
                                <input type="text" name="linkedin" class="form-control"
                                    value="{{ $settings->linkedin }}">
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" name="instagram" class="form-control"
                                    value="{{ $settings->instagram }}">
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" name="twitter" class="form-control" value="{{ $settings->twitter }}">
                            </div>
                            <div class="form-group">
                                <label for="dhaka_office">Dhaka Office</label>
                                <input type="text" name="dhaka_office" class="form-control"
                                    value="{{ $settings->dhaka_office }}">
                            </div>
                            <div class="form-group">
                                <label for="italy_office">Italy Office</label>
                                <input type="text" name="italy_office" class="form-control"
                                    value="{{ $settings->italy_office }}">
                            </div>
                            <div class="form-group">
                                <label for="duration">Opening Hours</label>
                                <input type="text" name="duration" class="form-control"
                                    value="{{ $settings->duration }}">
                            </div>

                            <div class="form-group my-3">
                                <label for="logo">Logo</label>
                                <input type="file" name="logo" class="form-control image" required>
                                @if ($settings->logo)
                                    <img class="image-preview" src="{{ asset('uploads/setting/' . $settings->logo) }}"
                                        alt="Preview" style="max-width: 100px; height: auto; margin-top: 10px;">
                                @else
                                    <img class="image-preview" src="#" alt="Preview"
                                        style="display: none; max-width: 100px; height: auto; margin-top: 10px;">
                                @endif
                            </div>
                            <div class="form-group my-3">
                                <label for="offcanvas_logo">Offcanvas Logo</label>
                                <input type="file" name="offcanvas_logo" class="form-control image" required>
                                @if ($settings->offcanvas_logo)
                                    <img class="image-preview"
                                        src="{{ asset('uploads/setting/' . $settings->offcanvas_logo) }}" alt="Preview"
                                        style="max-width: 100px; height: auto; margin-top: 10px;">
                                @else
                                    <img class="image-preview" src="#" alt="Preview"
                                        style="display: none; max-width: 100px; height: auto; margin-top: 10px;">
                                @endif
                            </div>

                            <button type="submit" class="btn  btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        const imageInputs = document.querySelectorAll('.image');

        imageInputs.forEach(function(imageInput) {
            imageInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                const reader = new FileReader();
                const imagePreview = event.target.nextElementSibling;

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }

                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
