@extends('layouts.app')

@section('title', 'Daftar Produk - TokoCepat')

@section('content')
<div class="container-fluid">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mb-0">
                    <i class="fas fa-boxes me-2"></i>Daftar Produk
                </h2>
                <div>
                    <a href="{{ route('produk.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle me-1"></i> Tambah Produk
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse($produk as $item)
        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
            <div class="card produk-card h-100">
                @if($item->is_featured)
                <div class="featured-badge">
                    <i class="fas fa-star me-1"></i> Unggulan
                </div>
                @endif
                <div class="text-center p-3 bg-white">
                    <img src="{{ $item->imageUrl }}" class="product-img" alt="{{ $item->name }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text text-primary fw-bold">{{ $item->formatted_price }}</p>
                    <p class="card-text text-muted small">
                        <i class="fas fa-box-open me-1"></i> Stok: {{ $item->stock }}
                    </p>
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('produk.edit', $item->id) }}" 
                           class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>

                        <a href="{{ route('orders.create', $item->id) }}" class="btn btn-success btn-sm">
                            <i class="fas fa-shopping-cart me-1"></i> Order
                        </a>


                        <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash-alt me-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center py-4">
                <i class="fas fa-info-circle fa-2x mb-3"></i>
                <h4>Belum ada produk tersedia</h4>
                <a href="{{ route('produk.create') }}" class="btn btn-primary mt-2">
                    <i class="fas fa-plus me-1"></i> Tambah Produk Pertama
                </a>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $produk->links() }}
    </div>
</div>

@push('scripts')
<script>
    // SweetAlert untuk konfirmasi delete
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Produk akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush
@endsection