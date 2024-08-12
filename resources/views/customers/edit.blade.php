
@extends('layouts.master')
@section('content')
<h1>Customer Create</h1>
<p>
    <a href="{{ url('customer') }}" class="btn btn-primary">Back</a>
</p>
    <hr>
    @if (Session::has('success'))
        <p class="text-success">{{ session('success') }}</p>

    @endif
    <form action="{{ url('/customer/update') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $customer->id }}">
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group row" style="margin-top: 10px">
                    <label for="name" class="col-sm-3">
                        <span class="text-danger">*</span>
                        name
                    </label>
                    <div class="col-sm-8">
                            <input type="Text" class="form-control" id="name" name="name" value="{{ $customer->name }}" required autofocus>
                    </div>

                </div>
                <div class="form-group row" style="margin-top: 10px" >
                    <label for="gender" class="col-sm-3">
                        <span class="text-danger">*</span>
                        Gender
                    </label>
                    <div class="col-sm-8">
                        <select name="gender" id="gender" class="form-control">
                            <option value="M" {{ $customer->gender=='M'?'selected':'' }}>Male</option>
                            <option value="F" {{ $customer->gender=='F'?'selected':'' }}>Femal</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row" style="margin-top: 10px">
                    <label for="email" class="col-sm-3">
                        <span class="text-danger">*</span>
                        email
                    </label>
                    <div class="col-sm-8">
                            <input type="Text" class="form-control" id="email" name="email" value="{{ $customer->email }}" required autofocus>
                    </div>

                </div>
                <div class="form-group row" style="margin-top: 10px">
                    <label for="name" class="col-sm-3">
                        <span class="text-danger">*</span>
                        phone
                    </label>
                    <div class="col-sm-8">
                            <input type="Text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}" required autofocus>
                    </div>

                </div>
                <div class="form-group row" style="margin-top: 10px">
                    <label for="name" class="col-sm-3">
                        <span class="text-danger">*</span>
                        Address
                    </label>
                    <div class="col-sm-8">
                        <textarea name="address" id="address" cols="30" rows="2" class="form-control">{{ $customer->adress }}</textarea>
                    </div>

                </div>

            </div>
            <div class="ol-sm-4">
                <div class="form-group row" >
                    <label for="photo" class="col-sm-3">
                            photo
                    </label>
                    {{-- <div class="col-sm-8"> --}}
                        <input type="file" class="form-control" name="photo">
                        <p>
                            <img src="{{ asset($customer->photo) }}" alt="" width="150">
                        </p>

                    {{-- </div> --}}
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
