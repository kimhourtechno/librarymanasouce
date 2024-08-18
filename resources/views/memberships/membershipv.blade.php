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

                        <th>Borrow ID</th>

                        <th>Borrower</th>
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Borrow by</th>
                        <th>Action</th>

                </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td style="display: none;">{{ $student->id }}</td>
                        <td>{{ $student->borrow_id }}</td>

                        <td>{{ $student->name }}</td>
                        <td>{{ $student->borrow_date }}</td>
                        <td>{{ $student->return_date }}</td>
                        <td>{{ now()->format('Y-m-d') }}</td>
                        <td>N?Q</td>
                        <td>USER1</td>

                        <td>
                            <a  href="{{ route('borrow.edit', $student->id) }}" class="btn btn-info btn-sm" title="View">
                                <i class="fas fa-eye" style="color: rgb(39, 39, 94);"></i>
                            </a>
                            <a  class="btn btn-success btn-sm" title="Return Book">
                                <i class="fas fa-undo" style="color: rgb(27, 113, 27);"></i>
                            </a>
                            <a  class="btn btn-danger btn-sm" title="Return Broken">
                                <i class="fas fa-exclamation-triangle" style="color: rgb(118, 73, 73);"></i>
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
