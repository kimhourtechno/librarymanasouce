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
                        <th>Action</th>

                </tr>
                </thead>
                <tbody>
                    @foreach($borrows as $borrow)
                    <tr>
                        <td>BR{{ $borrow->borrow_id }}</td>

                        <td>{{ $borrow->student_name }}</td>
                        <td>{{ $borrow->borrow_date }}</td>
                        <td>{{ $borrow->return_date }}</td>
                        <td>{{ now()->format('Y-m-d') }}</td>
                        <td>
                            status
                        </td>
                        <td>
                            <i class="fa-regular fa-eye" style="color: #0f4d10;"></i>
                            <i class="fa-solid fa-swatchbook"></i>
                            <i class="fa-solid fa-link-slash" style="color: #533518;"></i>
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
