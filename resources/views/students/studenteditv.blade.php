@extends('layouts.student.studentregisterm')

@section('studentregistly')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" style="padding: 1rem;">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header custom-card-header " style="background: #fec0c0;">
            <h3 class="card-title" style="text-align: center; Font">
                    <span>                            Borrow Application
                    </span>
                <br>
                <span class="subtitle" style="display: block; margin-top: 5px;">EDITE</span>
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="{{ route('student.update', $student->id) }}" method="POST" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="name">Student Name</label>
                          <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required autofocus>
                      </div>
                      <div class="form-group">
                          <label for="phone">Phone Number</label>
                          <input type="text" class="form-control" id="phone" name="phone" value="{{ $student->phone }}" required>
                      </div>
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
                      </div>
                      <div class="form-group">
                        <label for="birthdate">Date of Birth</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $student->birthdate }}" required>
                    </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" style="width: 100%;" required>
                          <option value="" disabled selected>Select Gender</option>
                          <option value="M" {{ $student->gender=='M'?'selected':'' }}>Male</option>
                          <option value="F" {{ $student->gender=='F'?'selected':'' }}>Female</option>
                        </select>
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                          <label for="classname">Grade/Class</label>
                          <select class="form-control" id="classname" name="classname" style="width: 100%;" required>
                            <option value="" disabled selected>Select Grade/Class</option>
                            <option value="G2" {{ $student->classname=='G2'?'selected':'' }}>Grade 2</option>
                            <option value="G3" {{ $student->classname=='G3'?'selected':'' }}>Grade 3</option>
                            <option value="G4" {{ $student->classname=='G4'?'selected':'' }}>Grade 4</option>
                            <option value="G5" {{ $student->classname=='G5'?'selected':'' }}>Grade 5</option>
                            <option value="G6" {{ $student->classname=='G6'?'selected':'' }}>Grade 6</option>
                            <option value="G7" {{ $student->classname=='G7'?'selected':'' }}>Grade 7</option>
                            <option value="G8" {{ $student->classname=='G8'?'selected':'' }}>Grade 8</option>
                            <option value="G9" {{ $student->classname=='G9'?'selected':'' }}>Grade 9</option>
                            <option value="ELP" {{ $student->classname=='ELP'?'selected':'' }}>ELP</option>
                            <option value="ELP1" {{ $student->classname=='ELP1'?'selected':'' }}>ELP1</option>
                            <option value="ELP2" {{ $student->classname=='ELP2'?'selected':'' }}>ELP2</option>
                            <option value="ELP3" {{ $student->classname=='ELP3'?'selected':'' }}>ELP3</option>
                            <option value="ELP4" {{ $student->classname=='ELP4'?'selected':'' }}>ELP4</option>
                            <option value="ELP5" {{ $student->classname=='ELP5'?'selected':'' }}>ELP5</option>
                            <option value="ELP6" {{ $student->classname=='ELP6'?'selected':'' }}>ELP6</option>
                            <option value="GEP" {{ $student->classname=='GEP'?'selected':'' }}>GEP</option>
                            <option value="GEP1" {{ $student->classname=='GEP1'?'selected':'' }}>GEP1</option>
                            <option value="GEP2" {{ $student->classname=='GEP2'?'selected':'' }}>GEP2</option>
                            <option value="GEP3" {{ $student->classname=='GEP3'?'selected':'' }}>GEP3</option>
                            <option value="GEP4" {{ $student->classname=='GEP4'?'selected':'' }}>GEP4</option>
                            <option value="GEP5" {{ $student->classname=='GEP5'?'selected':'' }}>GEP5</option>
                            <option value="GEP6" {{ $student->classname=='GEP6'?'selected':'' }}>GEP6</option>
                            <option value="GEP7" {{ $student->classname=='GEP7'?'selected':'' }}>GEP7</option>
                            <option value="Other" {{ $student->classname=='Other'?'selected':'' }}>Other</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="member">Member</label>
                        <select class="form-control" id="member" name="member" style="width: 100%;" required>
                          <option value="" disabled selected>Select Member</option>
                          @foreach ($members as $r)
                          <option value="{{ $r->id }}" {{ $student->member_id == $r->id ? 'selected' : '' }}>{{ $r->member_name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="place_of_birth">Place of Birth</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="{{ $student->place_of_birth }}" required>
                        </div>
                    </div>
                    </div>
                    <!-- /.col -->
                 </div>
                 <div class="row" style="display: flow">
                    <div class="card-header custom-card-header " style="background: #fec0c0;">
                        <h3 class="card-title">Information Parents</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="card-title" style="color: red">
                                <h6>Mother's Information</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mother_name">Mother's Name:</label>
                                    <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ $student->mother_name }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mother_phone">Mother's Phone:</label>
                                    <input type="text" class="form-control" id="mother_phone" name="mother_phone" value="{{ $student->mother_phone }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mother_career">Mother's Career:</label>
                                    <input type="text" class="form-control" id="mother_career" name="mother_career" value="{{ $student->mother_career }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card-title" style="color: red">
                                <h6>Father's Information</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="father_name">Father's Name:</label>
                                    <input type="text" class="form-control" id="father_name" name="father_name" value="{{ $student->father_name }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="father_phone">Father's Phone:</label>
                                    <input type="text" class="form-control" id="father_phone" name="father_phone" value="{{ $student->father_phone }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="father_career">Father's Career:</label>
                                    <input type="text" class="form-control" id="father_career" name="father_career" value="{{ $student->father_career }}">
                                </div>
                            </div>
                        </div>
                     </div>
                 </div>
                 <div class="row" style="display: flow">
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                            Save
                        </button>
                    </div>
            </form>
            {{-- =====dialog form=== --}}
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Student Information</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Do you want to save or cancel&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
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
