@extends('layouts.main')

@section('container')

<div class="container-fluid px-4">
    <h2 class="mt-4 text-center">Ubah Data Pengeluaran</h2>

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            @if (auth()->user()->role_id == 1)
                <li class="breadcrumb-item"><a href="/dashboard/admin">Dashboard</a></li>
            @else
                <li class="breadcrumb-item"><a href="/dashboard/bendahara">Dashboard</a></li>
            @endif
            <li class="breadcrumb-item"><a href="/data/pengeluaran">Data Pengeluaran</a></li>
            <li class="breadcrumb-item active">Ubah Data Pengeluaran</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-table me-1"></i>
                    Ubah Data Pengeluaran
                </div>
                <div class="card-body">
                    {{-- Form --}}
                    <form action="/data/pengeluaran/{{ $outcome->id }}" method="POST">

                        @method('put')
                        @csrf

                        {{-- ID User yang melakukan Input  --}}
                        <input type="hidden" name="user_id" value="{{ $outcome->user_id }}">

                        <div class="mb-3 row">
                            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $outcome->tanggal) }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nominal" class="col-sm-3 col-form-label">Nominal</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="nominal" name="nominal" value="{{ old('nominal', $outcome->nominal) }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" id="kategori" name="category_id" required>

                                    <option selected>Pilih kategori</option>

                                    @foreach ($categories as $category)
                                        @if (old('category_id', $outcome->category_id) == $category->id )
                                            <option value="{{ $category->id }}" selected>{{ $category->nama_kategori }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="keterangan" rows="3" name="keterangan">{{ old('keterangan', $outcome->keterangan) }}</textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
