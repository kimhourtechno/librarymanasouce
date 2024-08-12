@extends('layouts.masterpage')
@section('content')
<h3 class="fs-4 mb-3" style="border-bottom: 2px solid rgb(188, 186, 186);">Add Book</h3>
    <form action="{{ url('book/add') }}" style="border=1 " method="POST">
        @csrf
        <table class="table table-bordered">
            <tr>
				<th>
                    <label for="bookname">Book Name</label>
                </th>
				<th>
                    <div class="form-group">
                        <input type="text" class="form-control" id="bookname" name="bookname" required autofocus>
                    </div>
                </th>
                <th>

                    <label for="date_post" >
                        {{-- <span class="text-danger"></span> --}}
                         Date Post
                    </label>
                </th>
                <th>
                    <div >
                        <input type="date" class="form-control" id="date_post" name="date_post" required>
                    </div>
                </th>

                {{-- <th rowspan="5" colspan="3" class="afk">Photo</th> --}}
			</tr>

             <tr>
				<th>
                    <label for="author_id">Authors</label>
                </th>
				<th>
                    <div >
                        <select name="author_id" id="author_id" class="form-select" aria-label="Default select example">
                            <option value="0"></option>
                            @foreach ($authors as $r)
                                <option value="{{ $r->author_id }}">{{ $r->author_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </th>
				<th>
                    <label for="book_category_name">Book type</label>
                </th>
                <th>
                    <div >
                        <select name="book_category_name" id="book_category_name" class="form-select" aria-label="Default select example">
                            <option value="0"></option>
                            @foreach ($book_categorys as $r)
                                <option value="{{ $r->book_category_id }}">{{ $r->book_category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </th>
		    </tr>
            <tr>
				<th>
                    <label for="book_qty">Qty</label>
                </th>
				<th>
                    <div class="form-group">
                        <input type="text" class="form-control" id="book_qty" name="book_qty" required autofocus>
                    </div>
                </th>
                <th>

                    <label for="Publisher of year" >
                        {{-- <span class="text-danger"></span> --}}
                        Publisher of year

                    </label>
                </th>
                <th>
                    <div class="form-group">
                        <input type="text" class="form-control" id="years_published" name="years_published" required autofocus>
                    </div>
                </th>

                {{-- <th rowspan="5" colspan="3" class="afk">Photo</th> --}}
			</tr>


        </table>
        <div class="form-group row">
            <label for="" class="col-sm-3"></label>
            <div class="col-sm-8">
                <button class="btn btn-success" style="width: 279px">Save</button>
            </div>

        </div>
    </form>
@endsection

