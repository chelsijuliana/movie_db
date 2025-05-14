@extends('layouts.template')

@section('content')
<h2 class="mb-4">Form Tambah Movie</h2>

<form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <label for="title" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
            <input type="text" name="title" class="form-control" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="synopsis" class="col-sm-2 col-form-label">Sinopsis</label>
        <div class="col-sm-10">
            <textarea name="synopsis" class="form-control" rows="3" required></textarea>
        </div>
    </div>

    <div class="row mb-3">
        <label for="category_id" class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-10">
            <select name="category_id" class="form-select" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
        </div>
    </div>

    <div class="row mb-3">
        <label for="year" class="col-sm-2 col-form-label">Tahun</label>
        <div class="col-sm-10">
            <select name="year" class="form-select" required>
                <option value="">-- Pilih Tahun --</option>
                @for ($i = date('Y'); $i >= 1900; $i--)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label for="actors" class="col-sm-2 col-form-label">Aktor</label>
        <div class="col-sm-10">
            <input type="text" name="actors" class="form-control" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="cover_image" class="col-sm-2 col-form-label">Cover Image</label>
        <div class="col-sm-10">
            <input type="file" name="cover_image" class="form-control" accept="image/*" required>
        </div>
    </div>

    <div class="row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </div>
</form>
@endsection
