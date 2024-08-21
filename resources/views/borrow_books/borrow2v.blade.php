@extends('layouts.membership.membershipm')

@section('membershiply')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" style="margin-top: 1rem">
                    <div class="card-header">
                        <h2 class="card-title" style="font-size: 30px">Edit Borrow Record</h2>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('borrow.update', $borrow->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="borrow_id">Borrow ID</label>
                                <input type="text" name="borrow_id" id="borrow_id" class="form-control" value="{{ old('borrow_id', $borrow->borrow_id) }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="student_id">Student</label>
                                <select name="student_id" id="student_id" class="form-control">
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}" {{ $student->id == $borrow->student_id ? 'selected' : '' }}>
                                            {{ $student->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="borrow_date">Borrow Date</label>
                                <input type="date" name="borrow_date" id="borrow_date" class="form-control" value="{{ old('borrow_date', $borrow->borrow_date) }}">
                            </div>

                            <div class="form-group">
                                <label for="return_date">Return Date</label>
                                <input type="date" name="return_date" id="return_date" class="form-control" value="{{ old('return_date', $borrow->return_date) }}">
                            </div>

                            <div class="form-group">
                                <label for="due_date">Due Date</label>
                                <input type="date" name="due_date" id="due_date" class="form-control" value="{{ old('due_date', $borrow->due_date) }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Borrow Record</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
