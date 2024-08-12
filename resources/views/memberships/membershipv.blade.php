@extends('layouts.membership.membershipm')
@section('membershiply')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card" style="margin-top: 1rem">
            <div class="card-header">
              <h2 class="card-title" style="font-size: 30px">Membership</h2>
            </div>
            <div class="card-header">
              <h3 class="card-title">Membership borrowed and returned</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    {{-- <th style="width: 10px">NO</th> --}}
                  <th>Student Name</th>
                  <th>Gender</th>
                  <th>Member</th>
                  <th>Phone</th>

                  <th>Book Borrow</th>
                  <th>status</th>
                  <th >action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($students as $s)
                    <tr>

                        <td>{{ $s->name }}</td>
                        <td>{{ $s->gender }}</td>
                        <td>{{ $s->member_name}}</td>
                        <td>{{ $s->phone }}</td>
                        <td>{{ $s->borrowbook ?? 'N/A' }}</td>
                        <td>
                            @if($s->borrowbook === 'N/A' || empty($s->borrowbook))
                                No Action
                            @else
                                Action Taken
                            @endif
                        </td>


                        {{-- <td>{{ $s->borrowbook }}</td> --}}

                        <td>

                            <a href="{{ route('borrow.edit',$s->id) }}">
                                <i class="fa-solid fa-right-from-bracket" style="color: #989ba0;"></i>
                            </a>

                        </td>


                    </tr>
                    @endforeach

                 </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
