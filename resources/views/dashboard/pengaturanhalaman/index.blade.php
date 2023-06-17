@extends('dashboard.layout')
@section('konten')
    <form action="{{ route('pengaturanhalaman.update') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2" for="">About</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_halaman_about" id="">
                    <option value="">-pilih-</option>
                    @foreach ($datahalaman as $item)
                        <option value="{{ $item->id }}"
                            {{ get_meta_value('_halaman_about') == $item->id ? 'selected' : '' }}>
                            {{ $item->judul }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2" for="">Interest</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_halaman_interest" id="">
                    <option value="">-pilih-</option>
                    @foreach ($datahalaman as $item)
                        <option value="{{ $item->id }}"
                            {{ get_meta_value('_halaman_interest') == $item->id ? 'selected' : '' }}>
                            {{ $item->judul }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2" for="">Award</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_halaman_award" id="">
                    <option value="">-pilih-</option>
                    @foreach ($datahalaman as $item)
                        <option value="{{ $item->id }}"
                            {{ get_meta_value('_halaman_award') == $item->id ? 'selected' : '' }}>
                            {{ $item->judul }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>


        <button class="btn btn-primary" type="submit">Simpan</button>
    </form>
@endsection
