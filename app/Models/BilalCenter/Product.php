<?php

namespace App\Models\BilalCenter;

use App\Services\BilalCenter\BarcodeService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'bilal_center';
    protected $table = 'bc_products';

    protected $fillable = [
        'sku',
        'barcode',
        'oem_number',
        'shop_code',
        'name_en',
        'name_ur',
        'description',
        'internal_notes',
        'purchase_price',
        'selling_price',
        'stock',
        'minimum_stock',
        'unit',
        'location',
        'search_keywords',
        'brand_id',
        'category_id',
        'supplier_id',
        'status',
    ];

    protected static function booted()
    {
        static::creating(function (Product $product) {
            if (empty($product->barcode)) {
                $product->barcode = BarcodeService::generate();
            }
        });
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function bikeModels()
    {
        return $this->belongsToMany(BikeModel::class, 'bc_product_bike_model', 'product_id', 'bike_model_id');
    }

    public function aliases()
    {
        return $this->hasMany(ProductAlias::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }
}
