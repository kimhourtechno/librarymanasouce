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

                        <p>Books</p>
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
                    <a href="{{ route('dashboard.borrow') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div  class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ $brokenReturnCount }}</h3>
                        <p>Broken and Lost</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cogs"></i> <!-- Icon for broken book details -->
                    </div>
                    <a href="{{ route('dashboard.returnbroken') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary"> <!-- Changed color to primary for user -->
                    <div class="inner">
                        <h3>2</h3>
                        <p>Users And Admin</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-users"></i> <!-- Icon for users -->
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>


        </div>

        <!-- Data Table for Return Books -->

    </div><!-- /.container-fluid -->
</section>
@endsection
