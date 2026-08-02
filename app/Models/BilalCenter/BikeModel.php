<?php

namespace App\Models\BilalCenter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikeModel extends Model
{
    use HasFactory;

    protected $connection = 'bilal_center';
    protected $table = 'bc_bike_models';

    protected $fillable = ['company', 'model', 'year_from', 'year_to'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'bc_product_bike_model', 'bike_model_id', 'product_id');
    }
}
