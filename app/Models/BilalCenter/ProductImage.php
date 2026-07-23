<?php

namespace App\Models\BilalCenter;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $connection = 'bilal_center';
    protected $table = 'bc_product_images';

    protected $fillable = ['product_id', 'image', 'sort_order'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
