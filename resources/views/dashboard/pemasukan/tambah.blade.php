@extends('layouts.main')

@section('container')

<div class="container-fluid px-4">
    <h2 class="mt-4 mb-4">Tambah Data Pemasukan</h2>

    {{-- Breadcrumb --}}
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            @if (auth()->user()->role_id == 1)
                <li class="breadcrumb-item"><a href="/dashboard/admin">Dashboard</a></li>
            @else
                <li class="breadcrumb-item"><a href="/dashboard/bendahara">Dashboard</a></li>
            @endif
            <li class="breadcrumb-item"><a href="/data/pemasukan">Data Pemasukan</a></li>
            <li class="breadcrumb-item active">Tambah Data Pemasukan</li>
        </ol>
    </nav>
    {{-- End Breadcrumb --}}

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Tambah Data Pemasukan</h5>
                </div>

                <div class="card-body">
                    {{-- Form --}}
                    <form action="/data/pemasukan" method="POST">

                        @method('post')
                        @csrf

                        {{-- Mengambil ID User yang sedang login  --}}
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" required>
                        </div>

                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" required>
                        </div>

                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" id="kategori" name="category_id" required>
                                <option selected disabled>Pilih kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
