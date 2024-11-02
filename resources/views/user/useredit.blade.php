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
                            <option value="" disabled>Select Province</option>
                            <option value="Banteay Meanchey" {{ $user->place_of_birth == 'Banteay Meanchey' ? 'selected' : '' }}>Banteay Meanchey</option>
                            <option value="Battambang" {{ $user->place_of_birth == 'Battambang' ? 'selected' : '' }}>Battambang</option>
                            <option value="Kampong Cham" {{ $user->place_of_birth == 'Kampong Cham' ? 'selected' : '' }}>Kampong Cham</option>
                            <option value="Kampong Chhnang" {{ $user->place_of_birth == 'Kampong Chhnang' ? 'selected' : '' }}>Kampong Chhnang</option>
                            <option value="Kampong Speu" {{ $user->place_of_birth == 'Kampong Speu' ? 'selected' : '' }}>Kampong Speu</option>
                            <option value="Kampong Thom" {{ $user->place_of_birth == 'Kampong Thom' ? 'selected' : '' }}>Kampong Thom</option>
                            <option value="Kampot" {{ $user->place_of_birth == 'Kampot' ? 'selected' : '' }}>Kampot</option>
                            <option value="Kandal" {{ $user->place_of_birth == 'Kandal' ? 'selected' : '' }}>Kandal</option>
                            <option value="Koh Kong" {{ $user->place_of_birth == 'Koh Kong' ? 'selected' : '' }}>Koh Kong</option>
                            <option value="Kratie" {{ $user->place_of_birth == 'Kratie' ? 'selected' : '' }}>Kratie</option>
                            <option value="Mondulkiri" {{ $user->place_of_birth == 'Mondulkiri' ? 'selected' : '' }}>Mondulkiri</option>
                            <option value="Oddar Meanchey" {{ $user->place_of_birth == 'Oddar Meanchey' ? 'selected' : '' }}>Oddar Meanchey</option>
                            <option value="Pailin" {{ $user->place_of_birth == 'Pailin' ? 'selected' : '' }}>Pailin</option>
                            <option value="Phnom Penh" {{ $user->place_of_birth == 'Phnom Penh' ? 'selected' : '' }}>Phnom Penh</option>
                            <option value="Preah Vihear" {{ $user->place_of_birth == 'Preah Vihear' ? 'selected' : '' }}>Preah Vihear</option>
                            <option value="Prey Veng" {{ $user->place_of_birth == 'Prey Veng' ? 'selected' : '' }}>Prey Veng</option>
                            <option value="Pursat" {{ $user->place_of_birth == 'Pursat' ? 'selected' : '' }}>Pursat</option>
                            <option value="Ratanakiri" {{ $user->place_of_birth == 'Ratanakiri' ? 'selected' : '' }}>Ratanakiri</option>
                            <option value="Siem Reap" {{ $user->place_of_birth == 'Siem Reap' ? 'selected' : '' }}>Siem Reap</option>
                            <option value="Preah Sihanouk" {{ $user->place_of_birth == 'Preah Sihanouk' ? 'selected' : '' }}>Preah Sihanouk</option>
                            <option value="Stung Treng" {{ $user->place_of_birth == 'Stung Treng' ? 'selected' : '' }}>Stung Treng</option>
                            <option value="Svay Rieng" {{ $user->place_of_birth == 'Svay Rieng' ? 'selected' : '' }}>Svay Rieng</option>
                            <option value="Takeo" {{ $user->place_of_birth == 'Takeo' ? 'selected' : '' }}>Takeo</option>
                            <option value="Tboung Khmum" {{ $user->place_of_birth == 'Tboung Khmum' ? 'selected' : '' }}>Tboung Khmum</option>
                        </select>
                    </div>

                    {{-- <div class="form-group">
                        <label for="placeofbirth">Place of Birth</label>
                        <select class="form-control" id="place_of_birth" name="place_of_birth" style="width: 100%;" required>
                            <option value="" disabled>Select Grade/Class</option>
                            <option value="PP" {{ $user->place_of_birth == 'PP' ? 'selected' : '' }}>PP</option>
                            <option value="SH" {{ $user->place_of_birth == 'SH' ? 'selected' : '' }}>SH</option>
                            <option value="KTH" {{ $user->place_of_birth == 'KTH' ? 'selected' : '' }}>KTH</option>
                            <option value="KP" {{ $user->place_of_birth == 'KP' ? 'selected' : '' }}>KP</option>
                        </select>
                        </select>
                    </div> --}}
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
