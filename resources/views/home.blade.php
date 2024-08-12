@extends('layouts.masterpage')
@section('content')
<div class="border-tb">
    <img class="rounded mx-auto d-block" style="height: 173px;width: 412px;" src="{{ asset('images/sais.png') }}" alt="Example Image">

</div>
{{ bcrypt('123') }}
@endsection
