@extends('layouts.main')

@section('container')

<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Data Kategori</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard/admin">Dashboard</a></li>
            <li class="breadcrumb-item dropdown">
                <a class="dropdown-toggle" href="#" role="button" id="dataDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Data
                </a>
                <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                    <li><a class="dropdown-item" href="/data/pemasukan">Pemasukan</a></li>
                    <li><a class="dropdown-item" href="/data/pengeluaran">Pengeluaran</a></li>
                </ul>
            </li>
            <li class="breadcrumb-item"><a href="/kategori">Data Kategori</a></li>
            <li class="breadcrumb-item active">Tambah Data Kategori</li>
        </ol>
    </nav>

    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-table me-1"></i>
                    Tambah Data Kategori
                </div>
                <div class="card-body">
                    <form action="/kategori" method="POST">

                        @method('post')
                        @csrf

                        <div class="mb-3">
                            <label for="kategori" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="nama_kategori" required>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kategori" class="form-label">Jenis Kategori</label>
                            <select name="jenis_kategori" id="jenis_kategori" class="form-select">
                                <option value="Pemasukan">Pemasukan</option>
                                <option value="Pengeluaran">Pengeluaran</option>
                            </select>
                        </div>

                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>

@endsection
