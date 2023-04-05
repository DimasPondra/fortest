<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name')
        is-invalid
    @enderror" id="name" name="name" value="{{ old('name', $course->name) }}">
    @error('name')
        <p class="text-danger text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<button type="submit" class="btn btn-sm btn-success">Save</button>
