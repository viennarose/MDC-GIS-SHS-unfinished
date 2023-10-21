@extends('normal-view.layout.dashboard')

@section('content')
    <h1 class="text-center mt-5">{{ Auth::user()->name }}
        Profile</h1>
    <h4>ID number: {{ Auth::user()->id_number }}</h4>
    <hr>
    @if ($message = Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show mt-2 col-md-8 mx-auto" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="container">
        <div class="col-md-12">
            <form action="{{ route('change_profile', ['id' => Auth::user()->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="mx-auto">
                            <div class="d-flex justify-content-center mt-5">
                                <img src={{ '/user_img/' . Auth::user()->profile_image }} class="img-circle shadow-lg"
                                    alt="User Image"
                                    style="height: 300px; width: 300px; border-radius: 50%; padding-top:10px; padding-bottom: 10px; padding-left: 10px; padding-right: 10px;">
                            </div>
                            <p class="text-center text-dark mt-2 mb-1" style="font-weight: 500;">{{ Auth::user()->name }}
                            </p>
                        </div>
                        <div class="form-group mb-3 col-md-7 mx-auto">
                            <label for="" style="color:dimgray;"></label>
                            <input type="file" name="profile_image" class="">
                        </div>
                    </div>
                    <div class="col-md-5 mt-5">
                        <div class="input-group mb-3">
                            <label for="" style="color:dimgray;"><span
                                    class="fas fa-user input-group-text bg-secondary text-light"
                                    style="width: 39px;"></span></label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control"
                                required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="" style="color:dimgray;"><span
                                    class="fas fa-envelope input-group-text bg-secondary text-light"
                                    style="width: 39px;"></span></label>
                            <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control"
                                required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="" style="color:dimgray;"><span
                                    class="fas fa-envelope input-group-text bg-secondary text-light"
                                    style="width: 39px;"></span></label>
                            <input type="text" name="gender" value="{{ Auth::user()->gender }}" class="form-control"
                                required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="" style="color:dimgray;"><span
                                    class="fas fa-envelope input-group-text bg-secondary text-light"
                                    style="width: 39px;"></span></label>
                            <input type="text" name="phone_number" value="{{ Auth::user()->phone_number }}" class="form-control"
                                required>
                        </div>
                        <div class="d-flex justify-content-end mb-3">
                            <button class="btn btn-sm btn-success text-dark" type="submit"><span class="fas fa-save"></span>
                                Save
                                Changes</button>
                        </div>
            </form>
            <div class="mb-5">
                <a href="{{ route('change_password.index', ['id' => Auth::user()->id]) }}" type="btn"
                    class="btn btn-sm btn-danger "><span class="fas fa-key"></span>
                    Change Password</a>
            </div>
        </div>

    </div>
    </div>

    <style>
        h1 {
            position: relative;
            top: 5px;
            font-size: 25px;
            color: dimgray;
            font-weight: 450;
        }
    </style>

    <script>
        setTimeout(function() {
            $(' .alert-dismissible').fadeOut('slow');
        }, 1000);
    </script>
@endsection
