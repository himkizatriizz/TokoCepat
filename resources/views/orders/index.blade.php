@extends('layouts.app')

@section('title', 'Daftar Order - TokoCepat')

@section('content')
<div class="container py-4">
    <h2 class="mb-4"><i class="fas fa-list-alt me-2"></i>Daftar Order</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Nama Pemesan</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->created_at->format('d M Y H:i') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada order.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>
</div>
@endsection

