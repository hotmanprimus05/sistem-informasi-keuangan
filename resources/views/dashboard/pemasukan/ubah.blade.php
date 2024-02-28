@extends('layouts.main')

@section('container')

<div class="container-fluid px-4">
    <h2 class="mt-4 mb-4">Ubah Data Pemasukan</h2>

    {{-- Breadcrumb --}}
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            @if (auth()->user()->role_id == 1)
                <li class="breadcrumb-item"><a href="/dashboard/admin">Dashboard</a></li>
            @else
                <li class="breadcrumb-item"><a href="/dashboard/bendahara">Dashboard</a></li>
            @endif
            <li class="breadcrumb-item"><a href="/data/pemasukan">Data Pemasukan</a></li>
            <li class="breadcrumb-item active">Ubah Data Pemasukan</li>
        </ol>
    </nav>
    {{-- End Breadcrumb --}}

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Ubah Data Pemasukan</h5>
                </div>
                <div class="card-body">
                    {{-- Form --}}
                    <form action="/data/pemasukan/{{ $income->id }}" method="POST">

                        @method('put')
                        @csrf

                        {{-- ID User yang melakukan Input  --}}
                        <input type="hidden" name="user_id" value="{{ $income->user_id }}">

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $income->tanggal) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" value="{{ old('nominal', $income->nominal) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" id="kategori" name="category_id" required>
                                <option selected disabled>Pilih kategori</option>
                                @foreach ($categories as $category)
                                    @if (old('category_id', $income->category_id) == $category->id )
                                        <option value="{{ $category->id }}" selected>{{ $category->nama_kategori }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" rows="3" name="keterangan">{{ old('keterangan', $income->keterangan) }}</textarea>
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
