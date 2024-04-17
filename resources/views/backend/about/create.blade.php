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
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <form action="{{ route('about.update', $abouts->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="short_about">Short Description</label>
                                        <textarea name="short_about" id="short_about" class="form-control">{{ $abouts->short_about }}</textarea>
                                    </div>                                    
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="long_about">Long Description</label>
                                        <textarea name="long_about" id="long_about" class="form-control">{{ $abouts->long_about }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="mission">Mission</label>
                                        <textarea name="mission" id="mission" class="form-control">{{ $abouts->mission }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="vission">Vission</label>
                                        <textarea name="vission" id="vission" class="form-control">{{ $abouts->vission }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="quality">Quality</label>
                                        <textarea name="quality" id="quality" class="form-control">{{ $abouts->quality }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="service">Service</label>
                                        <textarea name="service" id="service" class="form-control">{{ $abouts->service }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-3">
                                <label for="about_image">About Image</label>
                                <input type="file" name="about_image" class="form-control image">
                                @if ($abouts->about_image)
                                    <img class="image-preview" src="{{ asset('uploads/about/' . $abouts->about_image) }}" alt="Preview"
                                         style="max-width: 100px; height: auto; margin-top: 10px;">
                                @else
                                    <img class="image-preview" src="#" alt="Preview"
                                         style="display: none; max-width: 100px; height: auto; margin-top: 10px;">
                                @endif
                            </div>                            
                            <div class="form-group my-3">
                                <label for="mission_image">Mission Image</label>
                                <input type="file" name="mission_image" class="form-control image">
                                @if ($abouts->mission_image)
                                    <img class="image-preview" src="{{ asset('uploads/about/' . $abouts->mission_image) }}" alt="Preview"
                                         style="max-width: 100px; height: auto; margin-top: 10px;">
                                @else
                                    <img class="image-preview" src="#" alt="Preview"
                                         style="display: none; max-width: 100px; height: auto; margin-top: 10px;">
                                @endif
                            </div>
                            <div class="form-group my-3">
                                <label for="vission_image">Vission Image</label>
                                <input type="file" name="vission_image" class="form-control image">
                                @if ($abouts->vission_image)
                                <img class="image-preview" src="{{ asset('uploads/about/' . $abouts->vission_image) }}" alt="Preview"
                                     style="max-width: 100px; height: auto; margin-top: 10px;">
                            @else
                                <img class="image-preview" src="#" alt="Preview"
                                     style="display: none; max-width: 100px; height: auto; margin-top: 10px;">
                            @endif
                            </div>
                            <div class="form-group my-3">
                                <label for="quality_image">Quality Image</label>
                                <input type="file" name="quality_image" class="form-control image">
                                @if ($abouts->quality_image)
                                    <img class="image-preview" src="{{ asset('uploads/about/' . $abouts->quality_image) }}" alt="Preview"
                                         style="max-width: 100px; height: auto; margin-top: 10px;">
                                @else
                                    <img class="image-preview" src="#" alt="Preview"
                                         style="display: none; max-width: 100px; height: auto; margin-top: 10px;">
                                @endif
                            </div>
                            <div class="form-group my-3">
                                <label for="service_image">Service Image</label>
                                <input type="file" name="service_image" class="form-control image">
                                @if ($abouts->service_image)
                                <img class="image-preview" src="{{ asset('uploads/about/' . $abouts->service_image) }}" alt="Preview"
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

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


    <script>
        // Initialize CKEditor for all textareas with class "editor"
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#short_about'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        });
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#long_about'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        });
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#mission'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        });
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#vission'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        });
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#quality'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        });
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#service'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
