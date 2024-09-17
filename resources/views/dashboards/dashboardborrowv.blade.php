@extends('layouts.dashboard.dashboadm')

@section('dashboadly')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $studentCount }}</h3>
                        <p>Students</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <a href="{{ route('student.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>


            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $bookCount }}</h3>
                        <p>Total Books</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <a href="{{ route('book.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $returnCount }}</h3>
                        <p>Returns</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-undo"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $borrowCount }}</h3>
                        <p>Borrows</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book-reader"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div  class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ $borrowCount }}</h3>
                        <p>Borrows</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cogs"></i> <!-- Icon for broken book details -->
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>


        </div>

        <!-- Data Table for Return Books -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!-- /.card-header -->
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

                        </div>
                     </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID Borrow</th>
                                    <th>Book Name</th>
                                    <th>Quantity Borrow</th>
                                    <th> Due Return Date</th>
                                    {{-- <th>Borrow By</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection
