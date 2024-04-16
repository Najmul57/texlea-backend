@extends('backend.layout.admin-master')


@section('admin-content')
    <style>
        div#image-preview-container {
            display: flex;
        }
    </style>
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Slider List</h5>
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
            <div class="col-12 col-md-6 col-sm-12 mx-auto">
                <div class="card">
                    <div class="card-body p-3">
                        <form action="{{ route('certificate.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group my-3">
                                <label for="image">Certificate</label>
                                <input type="file" name="image" id="image" class="form-control" multiple>
                                <div id="image-preview-container" style="margin-top: 10px;"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to display preview of uploaded images
        const imageInput = document.getElementById('image');
        const imagePreviewContainer = document.getElementById('image-preview-container');
    
        imageInput.addEventListener('change', function(event) {
            const files = event.target.files;
            imagePreviewContainer.innerHTML = ''; // Clear previous previews
    
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();
    
                reader.onload = function(e) {
                    const imagePreview = document.createElement('img');
                    imagePreview.src = e.target.result;
                    imagePreview.style.maxWidth = '100px';
                    imagePreview.style.height = 'auto';
                    imagePreview.style.marginRight = '5px';
                    imagePreviewContainer.appendChild(imagePreview);
                }
    
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
