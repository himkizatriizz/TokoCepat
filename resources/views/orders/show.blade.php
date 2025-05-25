<!-- resources/views/orders/show.blade.php -->
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Order #{{ $order->id }}</h4>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Status Order</h5>
                    <div class="alert alert-{{ $order->status === 'completed' ? 'success' : 'warning' }}">
                        {{ strtoupper($order->status) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Total Pembayaran</h5>
                    <div class="h4 text-primary">{{ $order->formatted_total }}</div>
                </div>
            </div>

            <h5>Detail Produk</h5>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->product_details as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>Rp {{ number_format($item['price']) }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>Rp {{ number_format($item['subtotal']) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Total</th>
                            <th>Rp {{ number_format($order->total_price) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <h5>Informasi Pengiriman</h5>
                    <ul class="list-unstyled">
                        <li><strong>Alamat:</strong> {{ $order->shipping_address }}</li>
                        <li><strong>Telepon:</strong> {{ $order->phone_number }}</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5>Metode Pembayaran</h5>
                    <div class="badge bg-info text-dark p-2">
                        {{ strtoupper($order->payment_method) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>