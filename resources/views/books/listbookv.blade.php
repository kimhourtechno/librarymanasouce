@extends('layouts.book.booklistm')
@section('booklistly')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card" style="margin-top: 1rem">
            <div class="card-header">
              <h2 class="card-title" style="font-size: 30px">List Book</h2>
            </div>
            <div class="card-header">
                <div class="row mb-2 justify-content-center align-items-center">
                    <div class="col-sm-6" style="width: 100px;">
                        <div>
                            <h2 class="card-title" style="font-size: 20px" >book information</h2>

                        </div>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('book.create') }}" class="btn btn-secondary small-font" style="width: 100px;">
                            <span style="font-size: 14px"> Add Book </span>
                        </a>
                    </div>
                  </div>


            </div>
            <!-- /.card-header -->
            <div class="card-body">
               @if(session('error'))
                <p style="background-color: #a63232; color: #e5e3e4; padding: 10px; border-radius: 5px;">
                    {{ session('error') }}
                </p>
            @endif
                <div class="row" style="margin-bottom: 12px">

                    <div class="col-sm-3">
                        <div class="card-tools">
                            <form action="{{ route('book.search') }}" method="GET" >
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="query" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col">

                        <a href="{{ route('book.index') }}" class="btn btn-default btn-sm">
                            <i class="fas fa-sync"></i> Refresh
                        </a>
                    </div>



                </div>

              <table id="example2" class="table table-bordered table-hover">
                <thead style="background-color: #f0f0f0; border: 1px solid black;">
                <tr >

                  <th>Book Name</th>
                  <th>year of publication</th>
                  <th>Athor</th>
                  <th>Book Type</th>
                  <th>Qty</th>

                  <th>Date Post</th>
                  <th>Shelves</th>
                  <th>Available	</th>
                  <th>Unit Price</th>
                  <th>Action</th>

                </tr>
                </thead>
               <tbody>
                @foreach($books as $b)
                    <tr>
                        <td>{{ $b->bookname }}</td>
                        <td>{{ $b->years_published }}</td>
                         <td>{{ $b->gname }}</td>
                        <td>{{ $b->bookcategory }}</td>
                        <td>{{ $b->book_qty }}</td>
                        <td>{{ $b->date_post }}</td>

                        <td>{{ $b->shelve_name }}</td>
                        <td>{{ $b->available }}</td>
                        <td>{{ $b->book_price }}</td>


                        <td>
                            <a href="{{ route('book.edit',$b->id) }}" style="width:5px"> <i class="fa-solid fa-pen-to-square" style="color: #a2a5a9;"></i></a>
                            <a href="{{ route('book.delete',$b->id) }}" onclick="return confirm('Would you like to delete Book?')"><i class="fa-solid fa-trash" style="color: #9a9b9e;"></i></a>
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

