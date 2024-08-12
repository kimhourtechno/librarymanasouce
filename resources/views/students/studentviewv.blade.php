@extends('layouts.student.studentregisterm')

@section('studentregistly')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid" style="padding: 1rem;">
            <div class="card card-default">
                <div class="card-header custom-card-header" >
                    <h3 class="card-title" style="font-weight: bold; color:#03bdd7" > GENERAL INFO</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"></button>
                    </div>
                </div>
                <div class="card-body" style="margin: 0px 42px;">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p><span>ID</span></p>
                                <label id="id">{{ $student->id }}</label>
                            </div>
                            <div class="form-group">
                                <p><span>Student Name</span></p>
                                <label id="name">{{ $student->name }}</label>
                            </div>
                            <div class="form-group">
                                <p><span>Phone Number</span></p>
                                <label id="phone">{{ $student->phone }}</label>
                            </div>
                            <div class="form-group">
                                <p><span>Email</span></p>
                                <label id="email">{{ $student->email }}</label>
                            </div>
                            <div class="form-group">
                                <p><span>Date of Birth</span></p>
                                <label id="birthdate">{{ $student->birthdate }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p><span>Gender</span></p>
                                <label id="gender">{{ $student->gender == 'M' ? 'Male' : 'Female' }}</label>
                            </div>
                            <div class="form-group">
                                <p><span>Grade/Class</span></p>
                                <label id="classname">{{ $student->classname }}</label>
                            </div>
                            <div class="form-group">
                                <p><span>Member</span></p>
                                <label id="member">{{ $members->firstWhere('id', $student->member_id)->member_name ?? 'N/A' }}</label>
                            </div>
                            <div class="form-group">
                                <p><span>Place of Birth</span></p>
                                <label id="place_of_birth">{{ $student->place_of_birth }}</label>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div style="color:#17989f">
                                <h3>Information Parents</h3>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Mother's Information</h4>
                                    <div class="form-group">
                                        <p><span>Mother's Name</span></p>
                                        <label id="mother_name">{{ $student->mother_name ?? 'N/A' }}</label>
                                    </div>
                                    <div class="form-group">
                                        <p><span>Mother's Phone</span></p>
                                        <label id="mother_phone">{{ $student->mother_phone ?? 'N/A' }}</label>
                                    </div>
                                    <div class="form-group">
                                        <p><span>Mother's Career</span></p>
                                        <label id="mother_career">{{ $student->mother_career ?? 'N/A' }}</label>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <h4>Father's Information</h4>
                                    <div class="form-group">
                                        <p><span>Father's Name</span></p>
                                        <label id="father_name">{{ $student->father_name ?? 'N/A' }}</label>
                                    </div>
                                    <div class="form-group">
                                        <p><span>Father's Phone</span></p>
                                        <label id="father_phone">{{ $student->father_phone ?? 'N/A' }}</label>
                                    </div>
                                    <div class="form-group">
                                        <p><span>Father's Career</span></p>
                                        <label id="father_career">{{ $student->father_career ?? 'N/A' }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display: flow">
                        <div class="card-footer">
                            <div class="card-footer justify-content-between">
                                <a href="{{ route('student.index') }}" class="btn btn-primary">Back to List</a>

                        </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
