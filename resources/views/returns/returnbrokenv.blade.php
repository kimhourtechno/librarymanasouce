@extends('layouts.return.returnbrokenm')
@section('returnbrokenly')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            Return Broken
          </h1>
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
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-edit"></i>
                Return Book
              </h3>
            </div>
            <div class="card-body">
                <!-- Success Alert -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <!-- Form for submitting data -->
                <form action="{{ route('returnbroken.store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="borrow_id" value="{{ $borrow_id }}">

                  <div class="form-group">
                    <label for="borrow_id">Borrow ID: {{ $borrow_id }}</label>
                </div>
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

                    <label for="due_return_date">Due Return Date:
                        <span id="due_return_date_label" style="color: rgb(16, 128, 220); font-weight: bold;"></span>
                    </label>
                </div>
                  <div class="form-group">
                      <label for="qty">Quantity</label>
                      <div class="d-flex">
                          <input type="number" class="form-control" id="qty_broken" name="qty_broken" min="1" required placeholder="QTY">

                          <label for="unit_price" class="ml-4" style="width: 47%; margin-top: 6px;">Unit Price:</label>
                          <input type="text" class="form-control ml-2" id="unit_price" name="unit_price" placeholder="Unit $">

                          <label for="total_price" class="ml-4" style="width: 32%; margin-top: 6px;">Total Price:</label>
                          <input type="text" class="form-control ml-2" id="total_price" name="total_price" placeholder="Total Price" readonly>
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
            <!-- /.card -->
          </div>
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-edit"></i>
                List Return
              </h3>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <table id="example2" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Book ID</th>
                                <th>Quantity Broken</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Return By</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brokenBooks as $brokenBook)
                        <tr>
                            <td>{{ $brokenBook->bookname }}</td> <!-- Display Book Name -->
                            <td>{{ $brokenBook->qty_broken }}</td>
                            <td>{{ number_format($brokenBook->unit_price, 2) }} $</td>
                            <td>{{ number_format($brokenBook->total_price, 2) }} $</td>
                            <td>{{ $brokenBook->user_name }}</td> <!-- Display User Name -->
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No broken books found.</td>
                        </tr>
                    @endforelse
                        </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
              <div class="text-muted mt-3">
              </div>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- ./row -->
    </div><!-- /.container-fluid -->
  </section>
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
            const qty = parseFloat(document.getElementById('qty_broken').value) || 0;
            const unitPrice = parseFloat(document.getElementById('unit_price').value) || 0;
            const totalPrice = qty * unitPrice;

            document.getElementById('total_price').value = totalPrice.toFixed(2); // Format to 2 decimal places
        }

        // Add event listeners to the quantity and unit price fields
        document.getElementById('qty_broken').addEventListener('input', calculateTotal);
        document.getElementById('unit_price').addEventListener('input', calculateTotal);
    });
</script>
@endsection
