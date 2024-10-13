@extends('layouts.user.useraddm')
@section('useraddtly')

 <!-- Main content -->
 <section class="content">
    <div class="container-fluid" style="padding: 1rem;">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Add User</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="{{ route('user.store') }}" method="POST">
              @csrf
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Student Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password" >Password</label>

                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
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
                        <label for="placeofbirth">Place of Birth</label>
                        <select class="form-control" id="place_of_birth" name="place_of_birth" style="width: 100%;" required>
                          <option value="" disabled selected>Select Grade/Class</option>
                          <option value="PP">PP</option>
                          <option value="SH">SH</option>
                          <option value="KTH">KTH</option>
                          <option value="KP">KP</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>

                            <select id="role" name="role" class="form-control" required>
                                <option value="">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>

                    </div>

                  </div>
                  <!-- /.col -->
               </div>

               <div class="row" style="display: flow">
                  <div class="card-footer text-center" >
                    <button type="submit" class="btn bg-secondary color-palette">Add User</button>
                    <button type="reset" class="btn btn-default">Cancel</button>
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
@endsection
