@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h3><i class="fas fa-box-open text-primary"></i></h3>
                    <h5>Produk</h5>
                    <p class="fs-2">1,024</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h3><i class="fas fa-users text-success"></i></h3>
                    <h5>Pelanggan</h5>
                    <p class="fs-2">568</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h3><i class="fas fa-shopping-cart text-warning"></i></h3>
                    <h5>Transaksi</h5>
                    <p class="fs-2">289</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h3><i class="fas fa-chart-line text-info"></i></h3>
                    <h5>Pendapatan</h5>
                    <p class="fs-2">Rp12.5jt</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mt-4">
        <div class="card-header bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Aktivitas Terkini</h5>
                <a href="#" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-sync-alt me-1"></i> Refresh
                </a>
            </div>
        </div>
        <div class="card-body">
            <!-- Daftar aktivitas -->
        </div>
    </div>
</div>
@endsection
