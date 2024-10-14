@extends('layouts.return.returnm')
@section('returnbookly')
<div class="content-wrapper">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Return Book</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

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
                <h3 class="card-title">Borrow ID: {{ $borrow->borrow_id }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Form for submitting data -->
                <form action="{{ route('return.save') }}" method="POST">
                    <input type="hidden" name="borrow_id" value="{{ $borrow->borrow_id }}">
                  @csrf
                  <div class="form-group">
                      <label>Book Name</label>
                      <select name="book_id" id="book_id" class="form-control select2" required>
                          <option value="">Select</option>
                          @foreach($books as $b)
                              <option value="{{ $b->id }}">{{ $b->bookname }}</option>
                          @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                      @if ($overdueDays > 0)
                      <label for="exp_date">Total Overdue Days:  <span style="color: red; font-weight: bold;">{{ $overdueDays }}</span></label>
                      @endif
                  </div>
                  <div class="form-group">
                    <label for="due_return_date">Due Return Date:
                        <span id="due_return_date_label" style="color: rgb(16, 128, 220); font-weight: bold;"></span>
                    </label>
                </div>
                  <div class="form-group">
                      <label for="qty">Quantity</label>
                      <div class="d-flex">
                          <input type="number" class="form-control" id="qty" name="qty" min="1" required placeholder="QTY">
                          @if($overdueDays > 0)
                          <label for="unit_price" class="ml-4" style="width: 47%; margin-top: 6px;">Late Return Fine:</label>
                          <input type="text" class="form-control ml-2" id="unit_price" name="unit_price" placeholder=" fine $">

                          <label for="total_price" class="ml-4" style="width: 32%; margin-top: 6px;">Total Price:</label>
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
                </form>
                <!-- End of form -->
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
                <table id="example2" class="table table-hover">
                    <thead>
                    <tr>
                      <th>Book Title</th>
                      <th>Quantity Returned</th>
                      <th>Due Return Date</th>
                      <th>Fine</th>
                      <th>Rememnig</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($returnBooks as $book)
                        <tr>
                            {{-- <td>{{ $book->borrow_id }}</td> --}}
                            <td>{{ $book->book_name }}</td>
                            <td>{{ $book->qty_return}}</td>
                            <td>{{ $book->return_date }}</td> <!-- Display return date -->
                            <td>{{ $book->total_price }} $</td> <!-- Display total price -->
                            @php
                            // Get the initial borrowed quantity
                            $borrowDetail = \App\Models\BorrowDetail::where('book_id', $book->book_id)
                                ->where('borrow_id', $book->borrow_id) // Assuming you have borrow_id
                                ->first();

                            $borrowedQty = $borrowDetail ? $borrowDetail->qty : 0;

                            // Get all returned quantities for the current book
                            $returnedBooks = \App\Models\ReturnBookDetail::where('book_id', $book->book_id)
                                ->whereHas('returnbook', function ($query) use ($book) {
                                    $query->where('borrow_id', $book->borrow_id);
                                })
                                ->get();

                            // Initialize remaining quantity
                            $remainingQty = $borrowedQty;

                            // Loop through each returned book to calculate the remaining quantity
                            foreach ($returnedBooks as $returnedBook) {
                                $remainingQty -= $returnedBook->qty_return; // Subtract each returned quantity
                            }
                        @endphp

                        <td>{{ max($remainingQty, 0) }}</td> <!-- Display remaining quantity, ensure it's not negative -->

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
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- JavaScript for calculation -->

  <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get today's date
        var today = new Date();
        var day = String(today.getDate()).padStart(2, '0');
        var month = today.toLocaleString('default', { month: 'short' }); // Get month as short name (e.g., Sep)
        var year = today.getFullYear();

        // Format the date as dd-MMM-yyyy
        var formattedDate = day + '-' + month + '-' + year;

        // Display the formatted date in the label's span
        document.getElementById("due_return_date_label").textContent = formattedDate;
    });
</script>

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
