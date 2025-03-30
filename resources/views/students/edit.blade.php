@extends('layouts.main')

@section('title', 'Edit Student')

@section('content')
    <main style="margin-top: 100px">
        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center  justify-content-between w-100">
                            <h4 class="card-title mb-0">Edit Student</h4>
                        </div>
                    </div>
                    <div class="card-body">
                      <form action="{{route('students.update', $student->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        @include('students._form')
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
