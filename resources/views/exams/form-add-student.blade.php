<div class="mb-3">
    <label for="student_nis" class="form-label">Student</label>

    <select class="form-select" name="student_nis" aria-label="Default select example">
        <option selected disabled>Open this select menu</option>
        @foreach ($students as $student)
            <option value="{{ $student->nis }}">{{ $student->name }}</option>
        @endforeach
    </select>

    @error('student_nis')
        <p class="text-danger text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<button type="submit" class="btn btn-sm btn-success">Save</button>
