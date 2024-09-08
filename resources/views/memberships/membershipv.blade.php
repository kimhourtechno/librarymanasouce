@extends('layouts.membership.membershipm')

@section('membershiply')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" style="margin-top: 1rem">
                    <div class="card-header">
                        <h2 class="card-title" style="font-size: 30px">Borrow Book</h2>
                    </div>

                    <div class="card-body">
                        <div style="margin-bottom: 12px">
                            <a href="borrow.add" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default" style="width: 100px;">
                                <i class="fa-solid fa-plus fa-sm"></i>
                                <span style="font-size: 17px"> Borrow </span>
                            </a>
                            <br>
                        </div>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Borrow ID</th>
                                    <th>Borrower</th>
                                    <th>Borrow Date</th>
                                    <th>Return Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Borrow by</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->borrow_id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->borrow_date }}</td>
                                        <td>{{ $student->return_date }}</td>
                                        <td>{{ now()->format('Y-m-d') }}</td>
                                        <td>N?Q</td>
                                        <td>{{ $student->librarian_name }}</td>
                                        <td>
                                            <a href="{{ route('borrow.edit', [$student->id, $student->borrow_id]) }}" class="btn btn-info btn-sm" title="View">
                                                <i class="fas fa-eye" style="color: rgb(39, 39, 94);"></i>
                                            </a>
                                            <a href="{{ route('returnbook.return', [$student->id, $student->borrow_id]) }}" class="btn btn-default btn-sm">
                                                <i class="fas fa-undo" style="color: rgb(27, 113, 27);"></i>
                                            </a>

                                            {{-- <a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-lg" data-student-id="{{ $student->id }}" data-borrow-id="{{ $student->borrow_id }}">
                                                <i class="fas fa-undo" style="color: rgb(27, 113, 27);"></i>
                                            </a> --}}

                                            {{-- <a href="{{ route('#',[$student->id, $student->borrow_id]) }}" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-lg" data-student-id="{{ $student->id }}" data-borrow-id="{{ $student->borrow_id }}">
                                                <i class="fas fa-undo" style="color: rgb(27, 113, 27);"></i>
                                            </a> --}}


                                            <a class="btn btn-danger btn-sm" title="Return Broken">
                                                <i class="fas fa-exclamation-triangle" style="color: rgb(118, 73, 73);"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal for Adding Borrow -->
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Borrow Book</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('borrow.add') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <label for="student_id">Borrower ID</label>
                                        <input type="text" class="form-control" id="student_id" name="student_id" required>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for Returning Book -->
                    <div class="modal fade" id="modal-lg">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Return Book</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="returnForm" action="#" method="POST">
                                        @csrf
                                        <input type="hidden" id="student_id" name="student_id">
                                        <input type="hidden" id="borrow_id" name="borrow_id">
                                        <div class="form-group">
                                            <label id="borrow_id_label">Borrow ID: </label>

                                            <!-- Display Borrow ID here -->
                                        </div>

                                        <div class="form-group">
                                            <label>Book Name</label>

                                            <select class="form-control select2" style="width: 100%;">
                                                <option value="" required>select</option>

                                                @foreach($books as $b)
                                                <option value="{{ $b->id }}" required>{{ $b->bookname }}</option>
                                            @endforeach
                                            </select>
                                          </div>

                                          <div class="form-group">
                                            <label for="return_date">Return Date</label>
                                            <input type="date" class="form-control" id="return_date" name="return_date" value="" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="qty">Quantity</label>
                                            <input type="number" class="form-control" id="qty" name="qty" min="1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="notes">Notes</label>
                                            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Function to format date as YYYY-MM-DD
    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Set the current date as the default value
    document.getElementById('return_date').value = formatDate(new Date());
</script>

<script>


    function setReturnDetails(studentId, borrowId) {
        document.getElementById('student_id').value = studentId;
        document.getElementById('borrow_id').value = borrowId;
        document.getElementById('borrow_id_label').innerText = `Borrow ID: ${borrowId}`;

        // document.getElementById('display_borrow_id').innerText = borrowId;
    }

    // Add event listener to the button that triggers the modal
    document.querySelectorAll('[data-toggle="modal"]').forEach(button => {
        button.addEventListener('click', function() {
            const studentId = this.getAttribute('data-student-id');
            const borrowId = this.getAttribute('data-borrow-id');
            setReturnDetails(studentId, borrowId);
        });
    });


</script>
@endsection
