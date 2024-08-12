@extends('layouts.master')
@section('content')
    <h1>Region</h1>
    <hr>
    <ul>
        @foreach ( $rg as $r )

            <li>{{ $r->name }} ===== {{ $r->total }}នាក់</li>

        @endforeach
    </ul>
@endsection
