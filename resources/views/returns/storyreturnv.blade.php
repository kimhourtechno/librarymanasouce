@extends('layouts.return.returnm')
@section('returnly')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card" style="margin-top: 1rem">
            <div class="card-header"><h2>Return Book</h2></div>
            <div class="card-header">
              <h3 class="card-title">The student returned the book to the library</h3>
            </div>
            <div>
                <div class="card-body">
                    <div class="btn-group btn-group-sm">
                      <a class="btn btn-custom-size btn-font bg-gradient-secondary" href="{{ route('return.index') }}"> <span class="sp-font">All</span></a>
                    </div>
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-custom-size bg-gradient-secondary" href="{{ route('search.today') }}"> <span class="sp-font">Today</span> </a>
                     </div>
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-custom-size bg-gradient-secondary" href="{{ route('search.yesterday') }}"><span class="sp-font">Yesterday</span></a>
                   </div>
                 <div class="btn-group btn-group-sm">
                        <a class="btn btn-custom-size bg-gradient-secondary" href="{{ route('search.thisweek') }}" style="padding: 4px"><span class="sp-font">This Week</span></a>
                </div>
                   <div class="btn-group btn-group-sm">
                    <a class="btn btn-custom-size bg-gradient-secondary" href="{{ route('search.thismonth') }}" style="padding: 4px"><span class="sp-font">This month</span></a>
                </div>
                <div class="btn-group btn-group-sm">
                    <a class="btn btn-block bg-gradient-primary"  onclick="printPage()" href="#" style="padding: 4px"><span class="sp-font">Print</span></a>
                </div>

                </div>
             </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>Student/Emp</th>
                  <th>Book Title</th>
                  <th>Shevles</th>
                  <th>Borrow Date</th>
                    <th>Due Date</th>
                  <th>Return Date</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($borrows as $br )
                    <tr>
                        <td>{{ $br->studentname }}</td>
                        <td>{{ $br->bookname }}</td>
                        <td>{{ $br->shelfname }}</td>
                        <td>{{ $br->borrow_date }}</td>
                        <td>{{ $br->due_date }}</td>
                        <td>{{ $br->return_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <script>
    function printPage() {
        window.print();
    }
</script>
@endsection

