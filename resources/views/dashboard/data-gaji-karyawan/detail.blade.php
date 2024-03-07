@extends('layouts.main')

@section('container')

<div class="container-fluid px-4">
    <h2 class="mt-4">Detail Gaji Karyawan</h2>

    {{-- Breadcrumb --}}
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            @if (auth()->user()->role_id == 1)
                <li class="breadcrumb-item"><a href="/dashboard/admin">Dashboard</a></li>
            @else
                <li class="breadcrumb-item"><a href="/dashboard/bendahara">Dashboard</a></li>
            @endif
            <li class="breadcrumb-item"><a href="/gaji-karyawan">Data Penggajian Karyawan</a></li>
            <li class="breadcrumb-item active">Detail Gaji Karyawan</li>
        </ol>
    </nav>
    {{-- End Breadcumb --}}

    <div class="d-flex justify-content-between align-items-center">
        <div>
            <a href="/gaji-karyawan/create" class="btn btn-primary me-2">Input Gaji Karyawan</a>
            <a href="/gaji" class="btn btn-success">Data Gaji & Jabatan</a>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-lg-8">
            {{-- Card --}}
            <div class="card shadow-lg mb-4" style="border-radius: 20px;">
                <div class="card-header bg-primary text-white" style="border-radius: 20px 20px 0 0;">
                    <i class="fas fa-table me-1"></i>
                    Detail Gaji Karyawan
                </div>
                <div class="card-body">

                    {{-- Alert / Notifikasi --}}
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-lg-4"><h6>Nama</h6></div>
                        <div class="col-lg-8"><h6>: {{ $employeeSalary->employee->nama }}</h6></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4"><h6>Jabatan</h6></div>
                        <div class="col-lg-8"><h6>: {{ $employeeSalary->salary->jabatan }}</h6></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4"><h6>Jenis Kelamin</h6></div>
                        <div class="col-lg-8"><h6>:
                            @if ($employeeSalary->employee->jenis_kelamin == "L")
                                Laki-laki
                            @else
                                Perempuan
                            @endif
                        </h6></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4"><h6>Kontak</h6></div>
                        <div class="col-lg-8"><h6>: {{ $employeeSalary->employee->no_telp }}</h6></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4"><h6>No. Rekening</h6></div>
                        <div class="col-lg-8"><h6>: {{ $employeeSalary->employee->no_rek }} ({{ $employeeSalary->employee->bank }})</h6></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4"><h6>Tanggal Masuk</h6></div>
                        <div class="col-lg-8"><h6>: {{ date('d-F-Y', strtotime($employeeSalary->employee->tgl_masuk)) }}</h6></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4"><h6>Tanggal Gajian</h6></div>
                        <div class="col-lg-8"><h6>: {{ date('d-F-Y', strtotime($employeeSalary->tgl_gajian)) }}</h6></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4"><h6>Status</h6></div>
                        <div class="col-lg-8"><h6>:
                            @if ($employeeSalary->employee->status == 1)
                                Karyawan Kontrak
                            @elseif($employeeSalary->employee->status == 2)
                                Karyawan Tetap
                            @else
                                Tidak Aktif
                            @endif
                        </h6></div>
                    </div>

                    {{-- Table --}}
                    <div class="table-responsive">
                        <table class="table table-bordered mt-3" style="border-radius: 20px;">
                            <thead>
                                <tr>
                                    <th scope="col">Gaji Pokok</th>
                                    <th scope="col">@currency($employeeSalary->salary->gaji_pokok)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tunjangan Transport</td>
                                    <td>@currency($employeeSalary->salary->tj_transport)</td>
                                </tr>
                                <tr>
                                    <td>Uang Makan</td>
                                    <td>@currency($employeeSalary->salary->uang_makan)</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Gaji</th>
                                    <td>@currency($employeeSalary->salary->gaji_pokok + $employeeSalary->salary->tj_transport +  $employeeSalary->salary->uang_makan)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- End Table --}}

                    {{-- Button --}}
                    <div class="d-grid gap-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Cetak Gaji {{ $employeeSalary->employee->nama }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="/cetak-print-gaji-karyawan?id={{ $employeeSalary->id }}">PRINT</a></li>
                            {{-- <li><a class="dropdown-item" href="/cetak-pdf-gaji-karyawan?id={{ $employeeSalary->id }}">PDF</a></li> --}}
                        </ul>
                    </div>
                    {{-- End Button --}}
                </div>
            </div>
            {{-- End Card --}}
        </div>
    </div>
</div>

@endsection
