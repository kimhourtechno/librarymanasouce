@extends('layouts.master')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<h1 class="text-primary">Categories List</h1>
<div class="row">
    <div class="col-sm-1">
        <P>
            <a href="{{ route('category.create') }}" class="btn btn-primary">create</a>
        </P>
    </div>

</div>
<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>#</th>


            <th>Name</th>
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
        @foreach ($cats as $c )
            <tr>
                <td>{{ $i++ }}</td>

                <td>{{ $c->name }}</td>

                <td>
                    <a href="{{ route('category.delete', $c->id) }}" class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure you want to delete?')">
                        Delete
                    </a>
                    <a href="{{ route('category.edit',$c->id) }}" class="btn btn-success btn-sm">Edite</a>
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
{{ $cats->links() }}

@endsection
