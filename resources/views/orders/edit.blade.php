@extends('layouts.app')

@section('title', 'Edit Order - TokoCepat')

@section('content')
<div class="container">
    <h2>Edit Order</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="customer_name" class="form-label">Nama Pemesan</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control" required value="{{ old('customer_name', $order->customer_name) }}">
        </div>
        <div class="mb-3">
            <label for="customer_email" class="form-label">Email Pemesan</label>
            <input type="email" name="customer_email" id="customer_email" class="form-control" required value="{{ old('customer_email', $order->customer_email) }}">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required value="{{ old('quantity', $order->quantity) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Order</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection 