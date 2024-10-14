@extends('layouts.borrow.borrowm')
@section('borrowly')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- /.row -->
        <div class="row" style="padding-top: 1rem;">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Borrow Book</h3>
              </div>
              <div class="card-footer">
                <h3>Information Student</h3>
              </div>
              <form action="{{ route('borrowdetail.store') }}" method="POST" autocomplete="off">
                @csrf
                <input type="hidden" name="student_id" value="{{ $student->id }}">
                <input type="hidden" name="borrow_id" value="{{ $borrow->borrow_id }}">

                <div class="card-body p-0">
                    <div class="bs-stepper" style="padding-right: 26px;">
                      <div class="bs-stepper-header" role="tablist">
                        <!-- your steps here -->
                        <div >
                            <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                              <span class="bs-stepper-circle">1</span>
                              <span class="bs-stepper-label">ID Card</span>
                            </button>
                          </div>
                          <div class="line">
                            {{ $student->id }}
                        </div>
                        <div >
                          <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Name</span>
                          </button>
                        </div>
                        <div class="line" id="name" name="name">
                            {{ $student->name }}

                        </div>
                        <div >
                            <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                              <span class="bs-stepper-circle">2</span>
                              <span class="bs-stepper-label">Gender</span>
                            </button>
                          </div>
                          <div class="line" id="gender">
                            {{ $student->gender == 'M' ? 'Male' : 'Female' }}
                          </div>

                        <div class="step" data-target="#logins-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                              <span class="bs-stepper-circle">3</span>
                              <span class="bs-stepper-label">Phone Nember</span>
                            </button>
                          </div>

                          <div class="line" id="phone" mame="phone">
                            {{ $student->phone }}
                          </div>
                         </div>

                      <div class="bs-stepper-content">
                        <!-- your steps content here -->
                        @if (session('info'))
                            <div class="alert alert-info">
                                {{ session('info') }}
                            </div>
                        @endif

                        <div>
                            @if (session('checkbook'))
                            <div style="color: orange;">
                                {{ session('checkbook') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div style="color: red;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                             @endif
                          @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                             @endif
                          <div class="form-group">
                            <label for="book_id">Book</label>
                            <select name="book_id" id="book_id" class="form-control select2">
                                <option value="" required>select</option>
                                @foreach($book as $b)
                                    <option value="{{ $b->id }}" required>{{ $b->bookname }}</option>
                                @endforeach
                            </select>
                        </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Date Returned</label>
                            <input type="date" class="form-control" id="return_date" name="return_date" {{ $borrow->return_date ? 'disabled' : '' }}>
                            @if($borrow->return_date)
                                <small class="form-text text-muted">Return date is already set: {{ $borrow->return_date }}</small>
                            @endif
                          </div>
                          <div>
                            <div class="card-body p-0">
                                <div class="bs-stepper">
                                    <div  class="bs-stepper-header" role="tablist">
                                        <div class="bs-stepper">
                                            <div class="bs-stepper-header" role="tablist">
                                                <!-- Step 1: ID Card -->
                                                <div class="d-flex align-items-center">
                                                    <label class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                        <span class="bs-stepper-label">Borrow ID: {{ $borrow->borrow_id }}</span>
                                                    </label>

                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <label class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                       <span class="bs-stepper-label">QTY:</span>
                                                    </label>
                                                    <input type="text" class="form-control " id="qty" name="qty" style="margin-bottom: 8px;">
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <label for="unit" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                        <span class="bs-stepper-label">Unit Price ($):</span>
                                                    </label>
                                                    {{-- <input type="text" class="form-control" id="unit_price" name="unit_price" style="margin-bottom: 8px;" disabled> --}}
                                                    <input type="text" class="form-control" id="unit_price" name="unit_price" style="margin-bottom: 8px;" readonly>

                                                </div>

                                            </div>
                                        </div>


                                    </div>

                                </div>

                            </div>
                          </div>

                          <button class="btn btn-primary">Save</button>
                        </div>

                      </div>
                    </div>
                  </div>
              </form>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                      <h3 class="card-title mb-0">Book Return</h3>
                      <button type="button" class="btn btn-default" onclick="window.print();"><i class="fas fa-print"></i> Print</button>

                      {{-- <button id="togglePrintArea" class="btn btn-primary ml-auto">Show Print Area</button> --}}
                    </div>
                  </div>

                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-hover">
                    <thead>
                    <tr>

                      <th>Book Title</th>
                      <th>Shelves</th>
                      <th>Qty</th>
                        <th>Price of Book</th>
                        <th>Remainning</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($borrowDetails as $detail)
                        <tr>
                            <td>{{ $detail->bookname }}</td>
                            <td>{{ $detail->shelfname }}</td>
                            <td>{{ $detail->qty }}</td>
                            <td>${{ $detail->unit_price }}</td>

                            @php
                    // Get remaining quantity from the remainingQuantities array
                    $remainingQty = $remainingQuantities[$detail->book_id] ?? 0; // Default to 0 if not set
                @endphp

                <td>{{ $remainingQty }}</td> <!-- Display remaining quantity -->
                    </tr>
                        </tr>
                        @endforeach
                    </tbody>

                  </table>
                </div>
                <!-- /.card-body -->
              </div>
          </div>
        </div>

        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

<section class="content print-area"> <!-- Add the 'print-area' class here -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="brand-link">
                        <div class="logo-container">
                            <img src="{{ asset('dist/img/logo_school.jpg') }}" style="opacity: .8; width: 78px; height: 78px;">
                        </div>
                        <div class="info" style="font-size: 14.5px">
                            <p style="color: black;">
                                វិទ្យាល័យ អន្តរជាតិ អែស អេ អាយ (សឹង្ហបុរី)<br>
                                Singapore Amicus International School
                            </p>
                        </div>
                    </div>



                    <div class="text-container">
                        <div class="text-borrow">
                            <u>កិច្ចសន្យាខ្ចីសៀវភៅ</u>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-sm-5 invoice-col">
                            <address>
                                <br>
                                <p class="font-khmer">ខ្ញុំបាទ/នាងខ្ញុំឈ្មោះ : {{ $student->name }}</p>
                                <p class="font-khmer">លេខប័ណ្ណសម្គាល់ខ្លួន :  {{ sprintf('%06d', $student->id) }}</p>
                                <p class="font-khmer">លេខទូរសព្ទ : {{ $student->mother_phone }}</p>
                                <p class="font-khmer">អ៉ីម៉ែល : {{ $student->email }}</p>
                                <p class="font-khmer">ភូមិ :____________________________ </p>
                                <p class="font-khmer">សង្កាត់/ឃុំ :_______________________ </p>
                                <p class="font-khmer">ក្រុង/ស្រុក ::______________________ </p>
                            </address>
                        </div>
                        <div class="col-sm-3 invoice-col">
                            <address>
                                <br>
                                <p class="font-khmer">ថ្ងៃខ្ចី : {{ $borrow->due_date }}</p>
                                <p class="font-khmer">ជួសជុលដល់ថ្ងៃទី : {{ $borrow->return_date }}</p>
                                <p class="font-khmer">ប្រាក់ពិន័យ : ______________</p>

                            </address>
                        </div>
                        <div class="col-sm-3 invoice-col" style="margin-left: 80px;">
                            <address>
                                <br>
                                <p>
                                     ឈ្មោះបណ្ណារក្ស : {{ $borrow->librarian->name }}
                                </p>
                                <p class="font-khmer">អ៉ីម៉ែល :{{ $borrow->librarian->email }}
                                </p>
                                <p class="font-khmer">លេខទូរសព្ទ : {{ $borrow->librarian->phone }}</p>

                            </address>
                        </div>
                    </div>

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>N0</th>
                                        <th>Book Name</th>

                                        <th>Qty</th>

                                        <th>Unit Price</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = 1; @endphp
                                    @foreach($borrowDetails as $detail)
                                    <tr>
                                        <td>{{ $counter++ }}</td> <!-- Display row number and increment counter -->
                                        <td>{{ $detail->bookname }}</td>
                                        <td>{{ $detail->qty }}</td>
                                        <td>${{ $detail->unit_price }}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row ">

                        <div class="col-6">
                            <p class="font-khmer">ខេត្ត ព្រះសីហនុ, ថ្ងៃទី______ខែ__________ឆ្នាំ_________  </p>
                            <p class="font-khmer">ហត្ថលេខា និង ឈ្មោះ </p>

                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                ទីតាំងក្រុងព្រះសីហនុ៖ ភូមិ៥ សង្កាត់លេខ៤ ក្រុងព្រះសីហនុ ខេត្តព្រះសីហនុ          ទីតាំងក្រុងកំពត៖ ខាងជើងផ្សារសាមគ្គី ជាប់អគារមង្គលការមិត្តភាព សង្កាត់កំពង់បាយ ក្រុងកំពត ខេត្តកំពត
                            </p>
                        </div>
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table">



                            </div>
                        </div>
                    </div>
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <button type="button" class="btn btn-default" onclick="window.print();"><i class="fas fa-print"></i> Print</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

    <!-- /.content -->
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        // When the book is selected
        $('#book_id').on('change', function () {
            var bookId = $(this).val(); // Get selected book id

            if (bookId) {
                // AJAX request to fetch the book price
                $.ajax({
                    url: '/book-price/' + bookId,
                    type: 'GET',
                    success: function (data) {
                        // If the book price is returned successfully, update the input field
                        if (data.price) {
                            $('#unit_price').val(data.price);
                        } else {
                            $('#unit_price').val('Price not available');
                        }
                    },
                    error: function () {
                        alert('Error fetching book price');
                    }
                });
            } else {
                // Clear the unit_price if no book is selected
                $('#unit_price').val('');
            }
        });
    });
</script>
@endsection


@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
@endsection

@section('js')

@endsection


