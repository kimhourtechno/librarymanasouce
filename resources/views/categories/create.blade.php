
@extends('layouts.master')
@section('content')
<h1>Create Categories</h1>
    <hr>
    @if (Session::has('success'))
        <p class="text-success">{{ session('success') }}</p>

    @endif
    <form action="{{ route('category.store') }}" method="POST" autocomplete="off" >
        @csrf
        @method('POST')

        <div class="row">
            <div class="col-sm-8">
                <div class="form-group row" style="margin-top: 10px">
                    <label for="name" class="col-sm-3">
                        <span class="text-danger">*</span>
                        name
                    </label>
                    <div class="col-sm-8">
                            <input type="Text" class="form-control" id="name" name="name"
                            required autofocus value="{{ old('name') }}">
                    </div>
                </div>

                {{-- <div class="form-group row" style="margin-top: 10px">
                    <label for="name" class="col-sm-3">
                    </label>
                    <div class="col-sm-8">
                        <button class="btn btn-success">save</button>
                    </div>

                </div> --}}

            </div>
       <div class="ol-sm-4">
                <div class="form-group row" >

                    <div class="col-sm-8">
                       <button class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>


    </form>

@endsection
