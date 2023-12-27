<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    use HasFactory;
    protected $table = 'user_services';
    protected $fillable = [
        'service_name',
        'description',
        'certifications',
        'billing_type',
        'user_id',
        'service_id',
        'sub_service_id',
        'status',
        'others'
    ];
 
}
