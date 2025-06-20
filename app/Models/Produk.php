<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
        'is_featured'
    ];

    protected $casts = [
        'is_featured' => 'boolean'
    ];

    // Accessor untuk URL gambar
    public function getImageUrlAttribute()
    {
        return $this->image 
            ? asset('storage/'.$this->image)
            : asset('images/default-produk.png');
    }

    // Accessor untuk harga format Rupiah
    public function getFormattedPriceAttribute()
    {
        return 'Rp '.number_format($this->price, 0, ',', '.');
    }

    // Scope untuk produk unggulan
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($search = $filters['search'] ?? false) {
            $query->where('name', 'like', '%' . $search . '%');
        }
    }
}