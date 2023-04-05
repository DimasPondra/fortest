<div class="mb-3">
    <label for="nis" class="form-label">NIS</label>
    <input type="text" class="form-control @error('nis')
        is-invalid
    @enderror" id="nis" name="nis" value="{{ old('nis', $student->nis) }}" >
    @error('nis')
        <p class="text-danger text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name')
        is-invalid
    @enderror" id="name" name="name" value="{{ old('name', $student->name) }}">
    @error('name')
        <p class="text-danger text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <textarea class="form-control @error('address')
        is-invalid
    @enderror" id="address" name="address" rows="3">{{ old('address', $student->address) }}</textarea>
    @error('address')
        <p class="text-danger text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<button type="submit" class="btn btn-sm btn-success">Save</button>
