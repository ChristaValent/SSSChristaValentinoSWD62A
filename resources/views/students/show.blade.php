@extends('layouts.main')

@section('title', 'Student Details')

@section('content')
    <main style="margin-top: 100px">
        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center  justify-content-between w-100">
                            <h4 class="card-title mb-0">Student Details</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="name">Name and Surname</label>
                                    <p class="form-control-static">{{ $student->name }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <p class="form-control-static">{{ $student->phone }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <p class="form-control-static">{{ $student->email }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <p class="form-control-static">{{ $student->dob }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="college_id">College</label>
                                    <p class="form-control-static">{{ $student->college->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a href="{{ route('students.index') }}" class="btn btn-success">Back</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                        <form id="form-delete" action="{{ route('students.destroy', $student->id) }}"
                            method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
