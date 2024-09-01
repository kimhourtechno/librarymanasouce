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
                            {{-- {{ $borrow->borrow_id }} --}}

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
                            <label for="">Book</label>

                            <select name="book_id" id="book_id" class="form-control select2">
                                <option value="" required>select</option>
                                @foreach($book as $b)
                                    <option value="{{ $b->id }}" required>{{ $b->bookname }}</option>
                                @endforeach
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputPassword1">Date Returned</label>
                            {{-- <input type="date" class="form-control" id="return_date" name="return_date"> --}}
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
                                                    <input type="text" class="form-control " id="quantity" name="qty" style="margin-bottom: 8px;">
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    <label class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                        <span class="bs-stepper-label">Unit Price:</span>
                                                    </label>
                                                    <input type="text" class="form-control " id="quantity" name="qty" style="margin-bottom: 8px;">
                                                </div>
                                               


                                            </div>
                                        </div>

                                        {{-- <div >
                                            <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">

                                              <span   class="bs-stepper-label">Borrow ID:  {{ $borrow->borrow_id }}</span>

                                            </button>
                                            <input type="text" class="form-control ml-2" id="new_data" name="new_data" placeholder="Enter new data">


                                         </div>


                                        </div> --}}
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
                  <h3 class="card-title">Book Return</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-hover">
                    <thead>
                    <tr>

                      <th>Book Title</th>
                      <th>Shelves</th>
                      <th>Borrow Date</th>
                      <th>return</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach ($borrows as $br )
                        <tr>

                            <td>{{ $br->bookname }}</td>
                            <td>{{ $br->shelfname}}</td>
                            <td>{{ $br->borrow_date }}</td>
                            <td>{{ $br->return_date }}</td>


                            <td>
                                <a href="{{ route('return.edit',$br->borrow_id) }}" onclick="return confirm('Would you like to returned?')">
                                    <i class="fa-solid fa-share" style="color: #494a4b;"></i>
                                </a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody> --}}

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
    <!-- /.content -->
</div>

@endsection
@section('js')

<script src="{{ asset('chosen/chosen.jquery.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.chosen-select').chosen();
    });
</script>
@endsection
