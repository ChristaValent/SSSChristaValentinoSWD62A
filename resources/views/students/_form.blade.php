<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="name">Name and Surname</label>
                                    <input type="text" class="form-control input-full" id="name" name="name"
                                        value="{{ old('name', $student->name) }}" placeholder="Enter Name and Surname" />
                                    @error('name')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                        <input type="text" class="form-control input-full" id="phone"
                                            name="phone" value="{{ old('phone', $student->phone) }}"
                                            placeholder="Enter Phone number" />
                                    @error('phone')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email', $student->email) }}" placeholder="Enter Email" />
                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob"
                                        value="{{ old('dob', $student->dob) }}" placeholder="Enter DOB" />
                                    @error('dob')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="college_id">College</label>
                                    <select class="form-select" name="college_id" id="college_id">
                                        @foreach ($colleges as $id => $name)
                                            <option
                                                {{ $id == old('college_id', $student->college_id ?? '') ? 'selected' : '' }}
                                                value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('college_id')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="{{ route('students.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
