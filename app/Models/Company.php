<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = [
        'company_name',
        'team_size',
        'logo',
        'official_website',
        'pan_number',
        'pan_number_image',
        'gst_number',
        'experience_in_month',
        'experience_in_year',
        'specialization',
        'min_project_amount',
        'min_project_currency',
        'max_project_amount',
        'max_project_currency',
         'user_id',
    ];

    public function clients(){
        return $this->hasMany(ClientExperience::class, 'company_id', 'company_id');
    }
    public function service(){
        return $this->hasOne(UserService::class, 'company_id', 'company_id');
    }
    public function product(){
        return $this->hasOne(UserProduct::class, 'company_id', 'company_id');
    }
}
