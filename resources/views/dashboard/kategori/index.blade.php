@extends('layouts.main')

@section('container')

<div class="container-fluid px-4">
    <h1 class="mt-4 mb-4">Data Kategori</h1>

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2 rounded">
            @if (auth()->user()->role_id == 1)
                <li class="breadcrumb-item"><a href="/dashboard/admin"><i class="bi bi-house-door"></i> Dashboard</a></li>
            @else
                <li class="breadcrumb-item"><a href="/dashboard/bendahara"><i class="bi bi-house-door"></i> Dashboard</a></li>
            @endif

            <li class="breadcrumb-item dropdown">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Data <i class="bi bi-caret-down-fill"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="/data/pemasukan">Pemasukan</a></li>
                    <li><a class="dropdown-item" href="/data/pengeluaran">Pengeluaran</a></li>
                </ul>
            </li>

            <li class="breadcrumb-item active">Kategori</li>
        </ol>
    </nav>


    <a href="/kategori/create" class="btn btn-primary mb-3">Tambah Data Kategori</a>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Kategori</h5>
        </div>
        <div class="card-body">
            {{-- Alert / Notifikasi --}}
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Jenis Kategori</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->nama_kategori }}</td>
                            <td>{{ $category->jenis_kategori }}</td>
                            <td>
                                {{-- Button Edit --}}
                                <a href="/kategori/{{ $category->id }}/edit" class="btn btn-sm btn-primary me-2"><i class="fas fa-edit"></i> Edit</a>

                                {{-- Delete Button --}}
                                <form action="/kategori/{{ $category->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
