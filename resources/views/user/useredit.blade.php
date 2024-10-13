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
          <form action="{{ route('user.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Student Name</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" required value="{{ $user->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required value="{{ $user->email }}">
                    </div>

            

                    <div class="form-group">
                        <label for="password">New Password</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password (if you want to change)" autocomplete="off">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">Show</button>
                            </div>
                        </div>
                        <small class="text-muted">Leave blank if you do not want to change the password.</small>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm new password" autocomplete="off">
                    </div>

                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="gender">Gender</label>
                      <select class="form-control" id="gender" name="gender" style="width: 100%;" required>
                        <option value="" disabled>Select Gender</option>
                        <option value="M" {{ $user->gender == 'M' ? 'selected' : '' }}>Male</option>
                        <option value="F" {{ $user->gender == 'F' ? 'selected' : '' }}>Female</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="placeofbirth">Place of Birth</label>
                        <select class="form-control" id="place_of_birth" name="place_of_birth" style="width: 100%;" required>
                            <option value="" disabled>Select Grade/Class</option>
                            <option value="PP" {{ $user->place_of_birth == 'PP' ? 'selected' : '' }}>PP</option>
                            <option value="SH" {{ $user->place_of_birth == 'SH' ? 'selected' : '' }}>SH</option>
                            <option value="KTH" {{ $user->place_of_birth == 'KTH' ? 'selected' : '' }}>KTH</option>
                            <option value="KP" {{ $user->place_of_birth == 'KP' ? 'selected' : '' }}>KP</option>
                        </select>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>

                            <select id="role" name="role" class="form-control" required>
                                <option value="">Select Role</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                            </select>

                    </div>

                  </div>
                  <!-- /.col -->
               </div>

               <div class="row" style="display: flow">
                  <div class="card-footer text-center" >
                    <button type="submit" class="btn bg-secondary color-palette">Update User</button>
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

  <!-- JavaScript for Toggle Password Visibility -->
  <script>
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const toggleButton = event.target;

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleButton.textContent = "Hide";
        } else {
            passwordField.type = "password";
            toggleButton.textContent = "Show";
        }
    }

    function togglePasswordConfirmation() {
        const passwordConfirmationField = document.getElementById('password_confirmation');
        const toggleButton = event.target;

        if (passwordConfirmationField.type === "password") {
            passwordConfirmationField.type = "text";
            toggleButton.textContent = "Hide";
        } else {
            passwordConfirmationField.type = "password";
            toggleButton.textContent = "Show";
        }
    }
</script>
@endsection
