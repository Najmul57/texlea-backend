@extends('backend.layout.admin-master')

@section('admin-content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Product Gallery Update</h5>
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
                        <form action="{{ route('product_gallery.update', $productgallery->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group my-3">
                                <label for="category_id">Select Category</label>
                                <select name="category_id" id="category_id" class="form-select">
                                    <option selected disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $productgallery->category_id ? 'selected' : '' }}>
                                            {{ ucfirst($category->name) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group my-3">
                                <label for="subcategory_id">Select Subcategory</label>
                                <select name="subcategory_id" id="subcategory_id" class="form-select">
                                    <option value="" selected hidden disabled>Select Subcategory</option>
                                </select>
                            </div>
                            <div class="form-group my-3">
                                <label for="childcategory_id">Select Subcategory</label>
                                <select name="childcategory_id" id="childcategory_id" class="form-select">
                                    <option value="" selected hidden disabled>Select Childcategory</option>
                                </select>
                            </div>
                            <div class="form-group my-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ $productgallery->name }}" required>
                            </div>
                            <div class="form-group my-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <img id="slide-preview"
                                    src="{{ $productgallery->image ? asset('uploads/product_gallery/' . $productgallery->image) : '#' }}"
                                    alt="Preview"
                                    style="display: {{ $productgallery->image ? 'block' : 'none' }}; max-width: 100px; height: auto; margin-top: 10px;">
                            </div>
                            <button type="submit" class="btn  btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#category_id').change(function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('get.subcategories', ['category_id' => ':category_id']) }}"
                            .replace(':category_id', category_id),
                        success: function(response) {
                            $('#subcategory_id').empty().append(
                                '<option value="" selected disabled>Select Subcategory</option>'
                                );
                            $.each(response, function(key, value) {
                                $('#subcategory_id').append('<option value="' + value
                                    .id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#subcategory_id').empty().append(
                        '<option value="" selected disabled>Select Subcategory</option>');
                    $('#childcategory_id').empty().append(
                        '<option value="" selected disabled>Select Childcategory</option>');
                }
            });

            $('#subcategory_id').change(function() {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('get.childcategories', ['subcategory_id' => ':subcategory_id']) }}"
                            .replace(':subcategory_id', subcategory_id),
                        success: function(response) {
                            $('#childcategory_id').empty().append(
                                '<option value="" selected disabled>Select Childcategory</option>'
                                );
                            $.each(response, function(key, value) {
                                $('#childcategory_id').append('<option value="' + value
                                    .id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#childcategory_id').empty().append(
                        '<option value="" selected disabled>Select Childcategory</option>');
                }
            });
        });
    </script>

    <script>
        const slideInput = document.getElementById('image');
        const slidePreview = document.getElementById('slide-preview'); // Corrected ID name

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
