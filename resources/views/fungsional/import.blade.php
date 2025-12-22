@extends('layouts.master')

@section('konten')
<div class="container">
    <h4 class="mb-3">Import Data Pelatihan Fungsional</h4>

    <form action="{{ route('fungsional.import') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">File Excel (.xlsx)</label>
            <input type="file" name="file" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-info">
            Import Data
        </button>

        <a href="{{ route('fungsional.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
