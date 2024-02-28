@extends('layouts.main')

@section('container')

<div class="container-fluid px-4">
    <h2 class="mt-4">Pengeluaran</h2>

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-3">
            @if (auth()->user()->role_id == 1)
                <li class="breadcrumb-item"><a href="/dashboard/admin">Dashboard</a></li>
            @else
                <li class="breadcrumb-item"><a href="/dashboard/bendahara">Dashboard</a></li>
            @endif
            <li class="breadcrumb-item active">Data Pengeluaran</li>
        </ol>
    </nav>
    {{-- End Breadcrumb --}}

    {{-- Button --}}
    <div class="row mb-3">
        <div class="col-md-6">
            <a href="/data/pemasukan/create" class="btn btn-primary mb-3">Tambah Data Pemasukan</a>
        </div>
        <div class="col-md-6 text-end">
            <a href="/kategori" class="btn btn-info mb-3">Data Sumber</a>
            <div class="dropdown d-inline-block">
                <button class="btn btn-success dropdown-toggle mb-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Cetak Semua Data Pemasukan
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form action="/cetak-laporan/pdf-semua-pemasukan" method="GET">
                            @method('get')
                            <button type="submit" class="btn btn-danger dropdown-item"><i class="fas fa-file-pdf me-1"></i>PDF</button>
                        </form>
                    </li>
                    <li>
                        <form action="/cetak-laporan/print-semua-pemasukan" method="GET">
                            @method('get')
                            <button type="submit" class="btn btn-warning dropdown-item"><i class="fas fa-print me-1"></i>PRINT</button>
                        </form>
                    </li>
                    <li>
                        <form action="/cetak-laporan/excel-semua-pemasukan" method="GET">
                            @method('get')
                            <button type="submit" class="btn btn-success dropdown-item"><i class="fas fa-file-excel me-1"></i>EXCEL</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    {{-- End Button --}}

    {{-- Card --}}
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Data Pengeluaran</h5>
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
                            <th>No</th>
                            <th>Operator</th>
                            <th>Nominal</th>
                            <th>Sumber</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            {{-- Jika bukan super admin, maka tidak boleh mengubah dan menghapus --}}
                            @if (auth()->user()->role_id == 1)
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($incomes as $income)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $income->user->employee->nama }}</td>
                                <td>@currency($income->nominal)</td>
                                <td>{{ $income->category->nama_kategori }}</td>
                                <td>{{ date('d-M-Y H:i', strtotime($income->tanggal)) }}</td>
                                <td>{{ $income->keterangan }}</td>
                                {{-- Jika bukan super admin, maka tidak boleh mengubah dan menghapus --}}
                                @if (auth()->user()->role_id == 1)
                                    <td>
                                        <a href="/data/pengeluaran/{{ $income->id }}/edit" class="btn btn-sm btn-primary"><i class="fas fa-edit me-1"></i>Edit</a>
                                        <form action="/data/pengeluaran/{{ $income->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this user?')"><i class="fas fa-trash me-1"></i>Delete</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- End Card --}}
</div>

@endsection
