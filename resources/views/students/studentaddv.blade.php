@extends('layouts.student.studentregisterm')

@section('studentregistly')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" style="padding: 1rem;">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header custom-card-header " style="background: #eda5a5;">
            <h3 class="card-title" style="font-weight: bold">Borrow Application</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="{{ route('student.store') }}" method="POST" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="name">Student Name</label>
                          <input type="text" class="form-control" id="name" name="name" required autofocus>
                      </div>
                      <div class="form-group">
                          <label for="phone">Phone Number</label>
                          <input type="text" class="form-control" id="phone" name="phone" required>
                      </div>
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="email" required>
                      </div>
                      <div class="form-group">
                        <label for="birthdate">Date of Birth</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                    </div>

                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" style="width: 100%;" required>
                          <option value="" disabled selected>Select Gender</option>
                          <option value="M">Male</option>
                          <option value="F">Female</option>
                        </select>
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                          <label for="classname">Grade/Class</label>
                          <select class="form-control" id="classname" name="classname" style="width: 100%;" required>
                            <option value="" disabled selected>Select Grade/Class</option>
                            <option value="G2">Grade 2</option>
                            <option value="G3">Grade 3</option>
                            <option value="G4">Grade 4</option>
                            <option value="G5">Grade 5</option>
                            <option value="G6">Grade 6</option>
                            <option value="G7">Grade 7</option>
                            <option value="G8">Grade 8</option>
                            <option value="G9">Grade 9</option>
                            <option value="ELP">ELP</option>
                            <option value="ELP1">ELP1</option>
                            <option value="ELP2">ELP2</option>
                            <option value="ELP3">ELP3</option>
                            <option value="ELP4">ELP4</option>
                            <option value="ELP5">ELP5</option>
                            <option value="ELP3">ELP3</option>
                            <option value="ELP4">ELP4</option>
                            <option value="ELP5">ELP5</option>
                            <option value="ELP6">ELP6</option>
                            <option value="GEP">ELP</option>
                            <option value="GEP1">ELP1</option>
                            <option value="GEP2">ELP2</option>
                            <option value="GEP3">ELP3</option>
                            <option value="GEP4">ELP4</option>
                            <option value="GEP5">ELP5</option>
                            <option value="GEP6">ELP6</option>
                            <option value="GEP7">ELP7</option>
                            <option value="Other">Other</option>


                          </select>
                      </div>
                      <div class="form-group">
                        <label for="Member">Member</label>
                        <select class="form-control" id="member" name="member" style="width: 100%;" required>
                          <option value="" disabled selected>Select Member</option>
                          @foreach ($members as $r)
                          <option value="{{ $r->id }}">{{ $r->member_name }}</option>
                         @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="place_of_birth">Place of Birht</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" required>
                        </div>
                    </div>


                    </div>
                    <!-- /.col -->

                 </div>


                 <div class="row" style="display: flow">
                    <div class="card-header custom-card-header " style="background: #fec0c0;">
                        <h3 class="card-title" style="font-weight: bold">Informatio parants</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="card-title" style="color: red">
                                    <h6>Information's Mother</h6>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="mother_name">Mother's Name:</label>
                                        <input type="text" class="form-control" id="mother_name" name="mother_name" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="mother_phone">Mother's Phone:</label>
                                        <input type="text" class="form-control" id="mother_phone" name="mother_phone" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="mother_career">career:</label>
                                        <input type="text" class="form-control" id="mother_career" name="mother_career">
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="card-title" style="color: red">
                                    <h6>Information's Father</h6>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="father_name">Father's Name:</label>
                                        <input type="text" class="form-control" id="father_name" name="father_name" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="father_phone">Father's Phone:</label>
                                        <input type="text" class="form-control" id="father_phone" name="father_phone" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="father_career">career:</label>
                                        <input type="text" class="form-control" id="father_career" name="father_career" >
                                    </div>
                                </div>

                            </div>


                         </div>
                    {{-- row --}}
                 </div>


                 <div class="row" style="display: flow">
                    <div class="card-footer" >
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
                      <h4 class="modal-title">Information student</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Do you want to save or cancell&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Conform</button>
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
