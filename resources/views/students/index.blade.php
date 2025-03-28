@extends('layouts.main')

@section('title', 'Students List')

@section('content')
    <main style="margin-top: 100px">
        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center  justify-content-between w-100">
                            <h4 class="card-title mb-0">Students List</h4>
                            @include('students._filter')
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th style="cursor: pointer">
                                            Name
                                            <i class="fa fa-arrow-up ms-1"></i>
                                        </th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>DOB</th>
                                        <th>College</th>
                                        <th style="width: 10%; text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($students->count())
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->id }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td>{{ $student->dob }}</td>
                                            <td>{{ $student->college->name }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('students.edit', $student->id) }}"
                                                        class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip"
                                                        title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('students.destroy', $student->id) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link btn-danger"
                                                            data-bs-toggle="tooltip" title="Delete">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
