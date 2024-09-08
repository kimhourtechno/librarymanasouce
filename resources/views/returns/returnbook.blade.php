@extends('layouts.return.returnm')
@section('returnbookly')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Return Book</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sliders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Borrow ID:{{ $borrow->borrow_id}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                    <label>Book Name</label>
                    <select name="book_id" id="book_id" class="form-control select2">
                        <option value="" required>select</option>
                        @foreach($books as $b)
                            <option value="{{ $b->id }}" required>{{ $b->bookname }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    {{-- <label for="exp_date">Total Overdue Days: {{ $overdueDays }}</label> --}}
                    @if ($overdueDays > 0)
                    <label for="exp_date">Total Overdue Days:  <span style="color: red; font-weight: bold;">{{ $overdueDays }}</span></label>

                @endif

                </div>

                <div class="form-group">
                    <label for="qty">Quantity</label>
                    <div class="d-flex">
                        <input type="number" class="form-control" id="qty" name="qty" min="1" required placeholder="QTY">
                        {{-- <label for="total_price" class="ml-4" style="width: 29%; margin-top: 6px;">Total Price:</label>
                        <input type="text" class="form-control ml-2" id="total_price" name="total_price" placeholder="Total Price" readonly> --}}
                        @if($overdueDays > 0)
                        <input type="text" class="form-control ml-2" id="unit_price" name="unit_price" placeholder="Unit Price" >

                        <label for="total_price" class="ml-4" style="width: 29%; margin-top: 6px;">Total Price:</label>
                        <input type="text" class="form-control ml-2" id="total_price" name="total_price" placeholder="Total Price" readonly>
                       @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" onclick="history.back()">Back</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Returned Book</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="returnedBooksTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Book Name</th>
                            <th>Borrower Name</th>
                            <th>Return Date</th>
                            <th>Actions</th>
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
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- JavaScript for calculation -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to calculate the total price
        function calculateTotal() {
            const qty = parseFloat(document.getElementById('qty').value) || 0;
            const unitPrice = parseFloat(document.getElementById('unit_price').value) || 0;
            const totalPrice = qty * unitPrice;

            document.getElementById('total_price').value = totalPrice.toFixed(2); // Format to 2 decimal places
        }

        // Add event listeners to the quantity and unit price fields
        document.getElementById('qty').addEventListener('input', calculateTotal);
        document.getElementById('unit_price').addEventListener('input', calculateTotal);
    });
  </script>
@endsection

