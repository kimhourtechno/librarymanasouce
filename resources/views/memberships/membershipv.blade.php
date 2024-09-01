@extends('layouts.membership.membershipm')
@section('membershiply')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card" style="margin-top: 1rem">
            <div class="card-header">
              <h2 class="card-title" style="font-size: 30px">Borrow Book</h2>
            </div>



              <div class="card-body">
                <div style="margin-bottom: 12px">
                    <a href="borrow.add"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"style="width: 100px;">
                        <i class="fa-solid fa-plus fa-sm"></i>
                        <span style="font-size: 17px"> Borrow </span>
                    </a>
                    <br>
                </div>
                <table id="example1" class="table table-bordered table-striped">
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


                        <td>{{ $student->borrow_id }}</td>
                         <td>{{ $student->name }}</td>
                        <td>{{ $student->borrow_date }}</td>
                        <td>{{ $student->return_date }}</td>
                        <td>{{ now()->format('Y-m-d') }}</td>
                        <td>N?Q</td>
                        <td>USER1</td>

                        <td>


                            <a href="{{ route('borrow.edit', [$student->id, $student->borrow_id]) }}" class="btn btn-info btn-sm" title="View">
                                <i class="fas fa-eye" style="color: rgb(39, 39, 94);"></i>
                            </a>


                            <a   class="btn btn-success btn-sm" title="Return Book">
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


                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Borrow Book</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ route('borrow.add') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label for="student_id">Borrower ID</label>
                                <input type="text" class="form-control" id="student_id" name="student_id" required>
                             </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                              </div>

                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
            </form>
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

