@extends('layouts.student.studentlistm')
@section('studentlistly')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card" style="margin-top: 1rem">
            <div class="card-header">
              <h2 class="card-title" style="font-size: 30px">List Student</h2>
            </div>

            <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1>Student Information</h1>
                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">

                            <a href="{{ route('student.create') }}" class="btn btn-block btn-primary">
                                <i class="fa-sharp fa-solid fa-plus sm"></i>
                                Add
                            </a>


                        {{-- <li class="breadcrumb-item active">
                            <button class="primary">sdf</button>
                        </li> --}}
                      </ol>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->
              </section>
              @if(session('error'))
                 <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card-tools">
                            <form action="{{ route('student.search') }}" method="GET">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="query" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col">
                        <button class="btn btn-default btn-sm" onclick="location.reload();">
                            <i class="fas fa-sync"></i> Refresh
                        </button>
                    </div>
                </div>

              <table id="example2" class="table table-bordered table-hover">
                <thead style="background-color: rgb(201, 200, 200)">
                <tr>
                    {{-- <th style="width: 10px">NO</th> --}}
                    <th>ID</th>
                  <th>Student Name</th>
                  <th>Gender</th>
                  <th>Class</th>
                  <th>Date of Birth</th>
                  <th>phone</th>
                  <th>Email</th>
                  <th >Action</th>
                </tr>
                </thead>
                <tbody>
                    @if(session('students'))
                    @foreach(session('students') as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->classname }}</td>
                        <td>{{ $student->birthdate }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            <a href="{{ route('student.edit', $student->id) }}" >
                                <i class="fa-solid fa-pen-to-square" style="color:#4962a3;"></i>
                            </a>
                            <a href="{{ route('student.view', $student->id) }}" onclick="return confirm('Would you like to Delete Student or Borrower?')">
                                <i class="fa-sharp fa-solid fa-plus" style="color: #40755e;"></i>
                            </a>

                        </td>
                    </tr>
                    @endforeach
                 @else

                 @foreach($students as $s)
                 <tr>
                    <td>{{ str_pad($s->id, 6, '0', STR_PAD_LEFT) }}</td>

                     <td>{{ $s->name }}</td>
                     <td>{{ $s->gender }}</td>
                      <td>{{ $s->classname }}</td>
                      <td>{{ $s->birthdate }}</td>
                      <td>{{ $s->phone }}</td>
                      <td>{{ $s->email }}</td>



                     <td>
                         <a href="{{ route('student.edit',$s->id) }}" >
                            <i class="fa-solid fa-user-pen" style="color:#4962a3;"></i>
                         </a>
                         <a href="{{ route('student.view',$s->id) }}"  onclick="return confirm('Would you like to view information student?')">
                            <i class="fa-solid fa-eye" style="color:#40755e"></i>
                        </a>
                        <a href="{{ route('student.delete',$s->id) }}"  onclick="return confirm('Would you like to delete student information?')">
                            <i class="fa-solid fa-trash" style="color:#741010"></i>
                         </a>

                     </td>


                 </tr>
                 @endforeach
                    {{-- <tr>
                        <td colspan="7">No students found.</td>
                    </tr> --}}
                 @endif



                 </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

 @endsection
