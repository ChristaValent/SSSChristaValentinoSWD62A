@extends('layouts.main')

@section('title', 'Add Students')

@section('content')
    <main style="margin-top: 100px">
        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center  justify-content-between w-100">
                            <h4 class="card-title mb-0">Add Students</h4>
                        </div>
                    </div>
                    <div class="card-body">
                      <form action="{{route('students.store')}}" method="POST">
                        @csrf
                        @include('students._form')
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
