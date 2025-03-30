@extends('layouts.main')

@section('title', 'Colleges List')

@section('content')
    <main style="margin-top: 100px">
        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center  justify-content-between w-100">
                            <h4 class="card-title mb-0">Colleges List</h4>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th style="width: 10%; text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($colleges->count())
                                        @foreach ($colleges as $college)
                                            <tr>
                                                <td>{{ $college->id }}</td>
                                                <td>{{ $college->name }}</td>
                                                <td>{{ $college->address }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('colleges.show', $college->id) }}"
                                                            class="btn btn-link btn-success btn-md" data-bs-toggle="tooltip" 
                                                            title="Show">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('colleges.edit', $college->id) }}"
                                                            class="btn btn-link btn-primary btn-md" data-bs-toggle="tooltip"
                                                            title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('colleges.destroy', $college->id) }}"
                                                            class="btn btn-link btn-danger btn-md" data-bs-toggle="tooltip"
                                                            title="Delete"><i class="fa fa-times"></i></a>
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
