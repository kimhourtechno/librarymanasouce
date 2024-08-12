
@extends('layouts.master')
@section('content')
<h1>Customer Create</h1>
    <hr>
    @if (Session::has('success'))
        <p class="text-success">{{ session('success') }}</p>

    @endif
    <form action="{{ url('/customer/save') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group row" style="margin-top: 10px">
                    <label for="name" class="col-sm-3">
                        <span class="text-danger">*</span>
                        name
                    </label>
                    <div class="col-sm-8">
                            <input type="Text" class="form-control" id="name" name="name" required autofocus>
                    </div>

                </div>
                <div class="form-group row" style="margin-top: 10px" >
                    <label for="gender" class="col-sm-3">
                        <span class="text-danger">*</span>
                        Gender
                    </label>
                    <div class="col-sm-8">
                        <select name="gender" id="gender" class="form-control">
                            <option value="M">Male</option>
                            <option value="F">Femal</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row" style="margin-top: 10px">
                    <label for="email" class="col-sm-3">
                        <span class="text-danger">*</span>
                        email
                    </label>
                    <div class="col-sm-8">
                            <input type="Text" class="form-control" id="email" name="email" required autofocus>
                    </div>

                </div>
                <div class="form-group row" style="margin-top: 10px">
                    <label for="name" class="col-sm-3">
                        <span class="text-danger">*</span>
                        phone
                    </label>
                    <div class="col-sm-8">
                            <input type="Text" class="form-control" id="phone" name="phone" required autofocus>
                    </div>

                </div>
                <div class="form-group row" style="margin-top: 10px">
                    <label for="name" class="col-sm-3">
                        <span class="text-danger">*</span>
                        Address
                    </label>
                    <div class="col-sm-8">
                        <textarea name="address" id="address" cols="30" rows="2" class="form-control"></textarea>
                    </div>

                </div>


            </div>
       <div class="col-sm-4">


        <div class="form-group row" >
            <label for="region" class="col-sm-3">
                    Region
            </label>
            <div class="col-sm-8">
                <select name="" id="region" class="form-controll chosen-select">
                    <option value="0"></option>
                    @foreach ($regions as $r )
                        <option value="{{ $r->id }}">{{ $r->name }}
                    </option>
                    @endforeach
                </select>
            </div>


        </div>


{{--
        sellec --}}
                <div class="form-group row" >
                    <label for="photo" class="col-sm-3">
                            photo
                    </label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" name="photo" onchange="preview(event)">
                        <div style="margin-top:8px">
                            <img src="" alt="" id="img" width="100">
                        </div>
                    </div>
                    <div class="form-group row" >
                    <label for="photo" class="col-sm-3">

                    </label>
                    <div class="col-sm-8">
                       <button class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
@section('js')
    <script src="{{ asset(('chosen/chosen.jquery.min.js')) }}">
    </script>
    <script>
        $(document).ready(function(){
            $('.chosen-select').chosen();
        });
        function preview(evt){
            let img = document.getElementById('img');
            img.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
