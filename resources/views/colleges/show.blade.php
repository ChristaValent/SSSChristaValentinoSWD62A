@extends('layouts.main')

@section('title', 'College Details')

@section('content')
    <main style="margin-top: 100px">
        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center  justify-content-between w-100">
                            <h4 class="card-title mb-0">College Details</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="name">College Name</label>
                                    <p class="form-control-static">{{ $college->name }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <p class="form-control-static">{{ $college->address }}</p>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a href="{{ route('colleges.index') }}" class="btn btn-success">Back</a>
                        <a href="{{ route('colleges.edit', $college->id) }}" class="btn btn-primary">Edit</a>
                        <form id="form-delete" action="{{ route('colleges.destroy', $college->id) }}"
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
