<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = 'products_category';
    protected $fillable = [
        'product_desc',
        'parent_id',
        'status',
    ];
}
