@extends('layouts.user.userlistm')
@section('userlistly')
<section class="content" style="padding-top: 1rem">
    <div class="container-fluid">

      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Show all users.</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th style="width: 12px">Action</th>

                  </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->role }}</td>
                        <td>

                            <!-- Edit Button -->
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                      <!-- Remove Button -->
                      <!-- Remove Button -->
                    <form action="{{ route('user.remove', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this user?')">
                            Remove
                        </button>
                    </form>

                            <!-- Delete Button -->
                            <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm {{ $user->action == 1 ? 'btn-warning' : 'btn-success' }}" onclick="return confirm('Are you sure you want to change the status of this user?')">
                                    {{ $user->action == 1 ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>


      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
