@extends('layouts.master')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<h1 class="text-primary">Customer</h1>
<div class="row">
    <div class="col-sm-1">
        <P>
            <a href="{{ url('customer/create') }}" class="btn btn-primary">create</a>
        </P>
    </div>
    <div class="col-sm-1">
        <form action="{{ url('customer/search') }}">

            <input type="text" name="q" value="{{ $q }}"><button>Search</button>
        </form>
    </div>
</div>
<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>photo</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Adress</th>
            <th>Region</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        {{-- @php($i=1) --}}
        <?php
            $page = @$_GET['page'];
            if (!$page) {
                $page = 1;
                # code...
            }
            $i = config('app.row') * ($page -1) + 1;
        ?>
        @foreach ($customers as $c )
            <tr>
                <td>{{ $i++ }}</td>
                <td>
                    <img src="{{ asset($c->photo) }}" alt="" width="37">
                </td>

                <td>{{ $c->name }}</td>
                <td>{{ $c->gender }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->phone }}</td>
                <td>{{ $c->adress }}</td>
                <td>{{ $c->gname }}</td>
                <td>
                    <a href="{{ url('customer/delete/'.$c->id) }}" class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure you want to delete?')">
                        Delete
                    </a>
                    <a href="{{ url('customer/edit/'.$c->id) }}" class="btn btn-success btn-sm">Edite</a>
                </td>
                {{-- <td>
                    <a href="`{{ url('customer/delete/' .$c->id) }}" class="btn btn-danger btn-sm"
                    onclick="return confirm('You want to delete?')">
                    Delete
                </a>
                </td> --}}
            </tr>

        @endforeach
    </tbody>

</table>
{{-- for pagination namal --}}
{{-- {{ $customers->links() }} --}}
{{ $customers->appends(request()->query())->links() }}
<div>
    Total= {{ $total }}, Male= {{ $Male }}, Female= {{ $Femal }}
</div>

@endsection
