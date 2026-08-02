<?php

namespace App\Models\BilalCenter;

use Illuminate\Database\Eloquent\Model;

class ProductAlias extends Model
{
    protected $connection = 'bilal_center';
    protected $table = 'bc_product_aliases';

    protected $fillable = ['product_id', 'alias'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
