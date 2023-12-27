<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    use HasFactory;
    protected $table = 'user_products';
    protected $fillable = [
        'product_name',
        'description',
        'certifications',
        'tentative_cost',
        'currency',
        'user_id',
        'product_category_id ',
        'sub_product_category_id',
        'status',
        'others'
    ];
   
}
