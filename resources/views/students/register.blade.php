@extends('layouts.mastermain')
@section('content')
    <h3 class="fs-4 mb-3" style="border-bottom: 2px solid rgb(188, 186, 186);">Student Register</h3>
    @if (Session::has('success'))
        <p class="text-success">{{ session('success') }}</p>
    @endif
    <form action="{{ ('student/save') }}" method="POST" autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-sm-9">
                <div class="form-group row" style="margin-top: 10px " >
                    <label for="name" class="col-sm-3">
                        {{-- <span class="text-danger"></span> --}}
                         Name
                    </label>
                    <div class="col-sm-8">
                            <input type="Text" class="form-control" id="name" name="name" required autofocus>
                    </div>

                </div>
                <div class="form-group row" style="margin-top: 10px " >
                    <label for="gender" class="col-sm-3">
                        {{-- <span class="text-danger"></span> --}}
                         Gender
                    </label>
                    <div class="col-sm-8">
                        <select name="gender" id="gender" class="form-select" aria-label="Default select example">
                            <option >==select==</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>

                </div>
                <div class="form-group row" style="margin-top: 10px " >
                    <label for="birthdate" class="col-sm-3">
                        {{-- <span class="text-danger"></span> --}}
                         Date Of Birth
                    </label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                    </div>

                </div>
                <div class="form-group row" style="margin-top: 10px " >
                    <label for="phone" class="col-sm-3">
                        {{-- <span class="text-danger"></span> --}}
                         Phone Number
                    </label>
                    <div class="col-sm-8">
                            <input type="Text" class="form-control" id="phone" name="phone" >
                    </div>

                </div>
                <div class="form-group row" style="margin-top: 10px " >
                    <label for="email" class="col-sm-3">
                        {{-- <span class="text-danger"></span> --}}
                         Email
                    </label>
                    <div class="col-sm-8">
                            <input type="Text" class="form-control" id="email" name="email" >
                    </div>

                </div>
                <div class="form-group row" style="margin-top: 10px " >
                    <label for="classname" class="col-sm-3">
                        {{-- <span class="text-danger"></span> --}}
                         Class
                    </label>
                    <div class="col-sm-8">
                        <select name="classname" id="classname" class="form-select" aria-label="Default select example">
                            <option >==select==</option>
                            <option value="G1">G1</option>
                            <option value="G2">G2</option>
                        </select>
                    </div>

                </div>

                <div class="form-group row" style="margin-top: 10px; margin-bottom: 28px;" >
                    <label for="other" class="col-sm-3">
                        {{-- <span class="text-danger"></span> --}}
                         Other
                    </label>
                    <div class="col-sm-8">
                        <textarea name="other" class="form-control" id="other" cols="30" rows="2"></textarea>
                    </div>

                    <div class="form-group row" style="margin-top: 10px " >
                        <label for="" class="col-sm-3">
                        </label>
                        <div class="col-sm-8">
                            <button class="btn btn-success">
                                Save
                            </button>
                        </div>

                    </div>
            </div>
        </div>
    </form>
@endsection
