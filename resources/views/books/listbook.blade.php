@extends('layouts.masterpage')
@section('content')
<h3 class="fs-4 mb-3" style="border-bottom: 2px solid rgb(188, 186, 186);">List Book</h3>
<table class="table bg-white rounded shadow-sm  table-hover" >
    <thead style="border-bottom: 2px solid black;">
        <tr>
            <th>N0</th>
            <th>Book Title</th>
            <th>Publisher of year</th>
            <th>Author</th>
            <th>Book Of type</th>
            <th>Qty</th>
            <th>Post Date</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
      @php($i=1)
      @foreach ($books as $b)
        <tr>
            <td>{{ $i++ }}</td>
            <td style="width: 152px">{{ $b->bookname }}</td>
            <td>{{ $b->years_published }}</td>
            <td>{{ $b->gname }}</td>
            <td>{{ $b->bookcategory}}</td>
            <td>{{ $b->book_qty }}</td>
            <td>{{ $b->date_post }}</td>
            <td>

                <a href="{{ url('book/delete/'.$b->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                <a href="{{ url('book/edit/'.$b->id) }}" class="btn btn-success btn-sm" >Edit</a>


            </td>

        </tr>
      @endforeach
    </tbody>
</table>
@endsection
