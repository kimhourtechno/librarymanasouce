@extends('layouts.master')
@section('content')



    <form action="{{ url('/register/save') }}" method="POST">
         {{ csrf_field() }}
         <h1>Registers</h1>
         <p>
             Name: <input type="text" name="name">
         </p>
         <p>
             PhoneNumber: <input type="text" name="Phone_Number">
         </p>
         <p>
             Address: <input type="text" name="Address_Student">
         </p>
         <p>
             <button>Summit</button>
         </p>
        </form>



@endsection



