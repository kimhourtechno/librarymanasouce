@extends('layouts.masterpage')
@section('content')


    <h3 class="fs-4 mb-3" style="border-bottom: 2px solid rgb(188, 186, 186);">Student List sddf</h3>
    <table class="table bg-white rounded shadow-sm  table-hover" >
        <thead style="border-bottom: 2px solid black;">
            <tr>
                <th>#</th>
                <th>Name </th>
                <th>Gender</th>
                <th>Date of Birth</th>

                <th>phone</th>
                <th>Email</th>
                <th>Class Name</th>
               
            </tr>
        </thead>
        <tbody>
            <?php
                $page =  @$_GET['page'];
                if (!$page) {
                    $page = 1;
                    # code...
                }
                $i = config('app.row') * ($page -1) +1;
            ?>
            {{-- @php($i=1) --}}
            @foreach ($students as $s)

            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $s->name }}</td>
                <td>{{ $s->gender }}</td>
                <td>{{ $s->birthdate }}</td>
                <td>{{ $s->phone }}</td>
                <td>{{ $s->email }}</td>
                <td>{{ $s->classname }}</td>

            </tr>


            @endforeach

        </tbody>
    </table>
    {{ $students->links() }}
@endsection
