{{-- <div class="col-md-6"> --}}

    <div class="form-group">
        <select id="filter_college_id" name="add-row_length" class="form-control">

            @if ($colleges->count())
                @foreach ($colleges as $id => $name)
                    <option {{ $id == request('college_id') ? 'selected' : '' }} value="{{ $id }}">
                        {{ $name }}</option>
                @endforeach
            @endif

        </select>
    </div>
{{-- </div> --}}
