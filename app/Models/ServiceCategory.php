<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $table = 'services_category';
    protected $fillable = [
        'service_desc',
        'parient_id',
        'status',
    ];
}
