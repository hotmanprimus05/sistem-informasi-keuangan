@extends('layouts.main')

@section('container')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white py-3 mb-4">
                <div class="card-body">
                    <h6 class="card-title">Pemasukan Harian</h6>
                    <h3 class="card-text">@currency($sumDailyIncome)</h3>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white py-3 mb-4">
                <div class="card-body">
                    <h6 class="card-title">Pemasukan Mingguan</h6>
                    <h3 class="card-text">@currency($sumWeeklyIncome)</h3>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white py-3 mb-4">
                <div class="card-body">
                    <h6 class="card-title">Pemasukan Bulanan</h6>
                    <h3 class="card-text">@currency($sumMonthlyIncome)</h3>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white py-3 mb-4">
                <div class="card-body">
                    <h6 class="card-title">Total Keseluruhan Pemasukan</h6>
                    <h3 class="card-text">@currency($totalIncome)</h3>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white py-3 mb-4">
                <div class="card-body">
                    <h6 class="card-title">Pengeluaran Harian</h6>
                    <h3 class="card-text">@currency($sumDailyOutcome)</h3>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white py-3 mb-4">
                <div class="card-body">
                    <h6 class="card-title">Pengeluaran Mingguan</h6>
                    <h3 class="card-text">@currency($sumWeeklyOutcome)</h3>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white py-3 mb-4">
                <div class="card-body">
                    <h6 class="card-title">Pengeluaran Bulanan</h6>
                    <h3 class="card-text">@currency($sumMonthlyOutcome)</h3>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white py-2 mb-4">
                <div class="card-body">
                    <h6 class="card-title">Total Keseluruhan Pengeluaran</h6>
                    <h3 class="card-text">@currency($totalOutcome)</h3>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white py-3 mb-4">
                <div class="card-body">
                    <h6 class="card-title">Jumlah Penghutang</h6>
                    <h3 class="card-text">{{ $totalPeminjam }}</h3>
                </div>
            </div>
        </div>

        @if (auth()->user()->role_id == 1)
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white py-3 mb-4">
                    <div class="card-body">
                        <h6 class="card-title">Jumlah User</h6>
                        <h3 class="card-text">{{ $totalUser }}</h3>
                    </div>
                </div>
            </div>
        @else
            <div class="col-xl-3 col-md-6">
            </div>
        @endif

        @if (auth()->user()->role_id == 1)
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white py-3 mb-4">
                    <div class="card-body">
                        <h6 class="card-title">Jumlah Karyawan</h6>
                        <h3 class="card-text">{{ $jumlahKaryawan }}</h3>
                    </div>
                </div>
            </div>
        @else
            <div class="col-xl-3 col-md-6">
            </div>
        @endif

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white py-3 mb-4">
                <div class="card-body">
                    <h6 class="card-title">Pendapatan Bersih</h6>
                    <h3 class="card-text">@currency($pendapatanBersih)</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-chart-area me-1"></i>
                    Area Chart Bulanan
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-chart-bar me-1"></i>
                    Bar Chart Tahunan
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>
</div>
@endsection
