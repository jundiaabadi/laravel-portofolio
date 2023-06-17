@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{ route('halaman.index') }}" class="btn btn-danger">
            << Kembali</a>
    </div>
    <form action="{{ route('halaman.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" id="judul" aria-describedby="helpId"
                placeholder="judul" value="{{ Session::get('judul') }}">

        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea class="form-control summernote" rows="5" name="isi">{{ Session::get('isi') }}</textarea>

        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
    </form>
@endsection
