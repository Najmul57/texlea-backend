@extends('frontend.layout.frontend-master')

@section('content')

@include('frontend.layout.offcanvas_menu')

<!-- breadcrumb start -->
<div class="breadcrumb-area">
    <div class="container">
        <h4>login</h4>
    </div>
</div>
<!-- breadcrumb end -->

<!-- login form -->
<div class="container py-5 my-5">
    <div class="row">
        <div class="col-10 col-md-8 col-lg-6 col-xl-5 mx-auto card p-4" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" remember>
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- login form -->

@endsection