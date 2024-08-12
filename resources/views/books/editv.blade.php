@extends('layouts.book.bookeditm')
@section('bookeditly')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" style="padding: 1rem;">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add Book</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="{{ route('book.update',$books->id) }}" method="POST" autocomplete="off">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="bookname">Book Name</label>
                          <input type="text" class="form-control" id="bookname" name="bookname" value="{{ $books->bookname }}" required autofocus>
                      </div>
                      <div class="form-group">
                          <label for="book_qty">Qty</label>
                          <input type="text" class="form-control" id="book_qty" name="book_qty" value="{{ $books->book_qty }}" required>
                      </div>
                      <div class="form-group">
                          <label for="book_price">Price</label>
                          <input type="text" class="form-control" id="book_price" name="book_price" value="{{ $books->book_price }}" required>
                      </div>
                      <div class="form-group">
                        <label for="date_post">Date Post</label>
                        <input type="date" class="form-control" id="date_post" name="date_post" value="{{ $books->date_post }}"  required>
                    </div>

                    <div class="form-group">
                        <label for="lost_price"> lost book $</label>
                        <input type="text" class="form-control" id="lost_price" name="lost_pricce" value="{{ $books->lost_price }}"  required>
                    </div>


                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="author_id">Author</label>
                        <select class="form-control" id="author_id" name="author_id" style="width: 100%;" required>
                          <option value="" disabled selected>Select Authors</option>
                          @foreach ($authors as $r)
                          <option value="{{ $r->author_id }}" {{ $r->author_id == $books->author_id?'selected':'' }}>{{ $r->author_name }}</option>
                         @endforeach
                        </select>
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                          <label for="shelf_id">shelves</label>
                          <select class="form-control" id="shelf_id" name="shelf_id" style="width: 100%;" required>
                            <option value="">Select type of book</option>
                            @foreach ($shelves as $sh )
                                <option value="{{ $sh->shelf_id }}" {{ $sh->shelf_id ==$books->shelf_id?'selected':'' }}>{{ $sh->shelf_name }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="book_category_id">Type of Books</label>
                        <select class="form-control" id="book_category_id" name="book_category_id" style="width: 100%;" required>
                          <option value="" disabled selected>Select type of book</option>
                          @foreach ($book_categorys as $bc )
                            <option value="{{ $bc->book_category_id  }}" {{ $bc->book_category_id == $books->book_category_id?'selected':'' }}>{{ $bc->book_category_name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="years_published">Years Of Publication</label>
                        <input type="text" class="form-control" id="years_published" name="years_published" value="{{ $books->years_published }}" required autofocus>
                    </div>
                    </div>
                    <!-- /.col -->


                </div>
                <div class="row" style="display: flow">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
            </form>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
