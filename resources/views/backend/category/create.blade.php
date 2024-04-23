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
                <h5 class="bc-title">Category Create</h5>
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
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group my-3">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    placeholder="enter category" required>
                            </div>
                            <div class="form-group my-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                                <span><strong class="text-danger">Dimention : </strong>420 x 260</span>
                                <img id="slide-preview" src="#" alt="Preview"
                                    style="display: none; max-width: 100px; height: auto;margin-top:10px">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to display preview of uploaded image
        const slideInput = document.getElementById('image');
        const slidePreview = document.getElementById('slide-preview');

        slideInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                slidePreview.src = e.target.result;
                slidePreview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        });
    </script>
@endsection
