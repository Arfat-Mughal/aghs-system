<?php

namespace App\Models\BilalCenter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'bilal_center';
    protected $table = 'bc_brands';

    protected $fillable = ['name', 'country', 'status'];

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
}
