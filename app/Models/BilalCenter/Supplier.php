<?php

namespace App\Models\BilalCenter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $connection = 'bilal_center';
    protected $table = 'bc_suppliers';

    protected $fillable = ['name', 'phone', 'address', 'status'];

    public function products()
    {
        return $this->hasMany(Product::class, 'supplier_id');
    }
}
