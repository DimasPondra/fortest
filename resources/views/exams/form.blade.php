<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name')
        is-invalid
    @enderror" id="name" name="name" value="{{ old('name', $exam->name) }}">
    @error('name')
        <p class="text-danger text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="course_id" class="form-label">Course</label>

    <select class="form-select" name="course_id" aria-label="Default select example">
        <option selected disabled>Open this select menu</option>
        @foreach ($courses as $course)
            <option value="{{ $course->id }}" @if ($exam->course_id == $course->id)
                selected
            @endif>{{ $course->name }}</option>
        @endforeach
    </select>

    @error('course_id')
        <p class="text-danger text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" class="form-control @error('date')
        is-invalid
    @enderror" id="date" name="date" value="{{ old('date', $exam->date) }}">
    @error('date')
        <p class="text-danger text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<button type="submit" class="btn btn-sm btn-success">Save</button>
