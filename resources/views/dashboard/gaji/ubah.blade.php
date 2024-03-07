@extends('layouts.main')

@section('container')

<div class="container-fluid px-4">
    <h2 class="mt-4 text-center">Gaji & Jabatan - Ubah Data</h2>

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            @if (auth()->user()->role_id == 1)
                <li class="breadcrumb-item"><a href="/dashboard/admin">Dashboard</a></li>
            @else
                <li class="breadcrumb-item"><a href="/dashboard/bendahara">Dashboard</a></li>
            @endif
            <li class="breadcrumb-item"><a href="/gaji-karyawan">Data Penggajian Karyawan</a></li>
            <li class="breadcrumb-item"><a href="/gaji">Data Gaji & Jabatan</a></li>
            <li class="breadcrumb-item active">Ubah Data Gaji & Jabatan</li>
        </ol>
    </nav>
    {{-- End Breadcrumb --}}

    <div class="row justify-content-center">
        <div class="col-lg-6">
            {{-- Card --}}
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-table me-1"></i>
                    Form Ubah Data Gaji & Jabatan
                </div>
                <div class="card-body">
                    {{-- Form --}}
                    <form action="/gaji/{{ $salary->id }}" method="POST">

                        @method('put')
                        @csrf

                        <div class="mb-3 row">
                            <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan', $salary->jabatan) }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="gaji_pokok" class="col-sm-4 col-form-label">Gaji Pokok</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok', $salary->gaji_pokok) }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tj_transport" class="col-sm-4 col-form-label">Tunjangan Transport</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="tj_transport" name="tj_transport" value="{{ old('tj_transport', $salary->tj_transport) }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="uang_makan" class="col-sm-4 col-form-label">Uang Makan</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="uang_makan" name="uang_makan" value="{{ old('uang_makan', $salary->uang_makan) }}" required>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                    {{-- End Form --}}
                </div>
            </div>
            {{-- End Card --}}
        </div>
    </div>


</div>

@endsection
