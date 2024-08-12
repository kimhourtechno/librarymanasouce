@extends('layouts.master')
@section('content')

<h1>Sell Product</h1>

<form action="{{ url('/product/sell') }}" method="POST">
    @csrf

    <p>
        Product Name: <input type="text" name="pname">
    </p>
    <p>
        Quantity: <input type="text" name="qty">
    </p>
    <p>
        Unit Price: <input type="text" name="price">
    </p>
    <p>
        Dicount(%): <input type="text" name="disc" value="0">
    </p>
    <p>
        Total: <input type="text" disabled value="{{ $total }}">
    </p>
    <p>
        <button>Submit</button>
    </p>
</form>
@endsection




