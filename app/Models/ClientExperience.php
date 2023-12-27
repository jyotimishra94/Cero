<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientExperience extends Model
{
    use HasFactory;
    protected $primaryKey = 'client_experience_id';
    protected $table = 'client_experience';

    protected $fillable = [
        'client_name',
        'project_title',
        'description',
        'highlights',
        'project_size',
        'project_size_currency',
        'project_duration_in_month',
        'project_duration_in_year',
        'company_id',

    ];


    public function getFormattedDurationAttribute()
    {
        $formattedDuration = '';
        if ($this->attributes['project_duration_in_year']) {
            $years = $this->attributes['project_duration_in_year'] . ' year' . ($this->attributes['project_duration_in_year'] != 1 ? 's' : '');
            $formattedDuration .= $years;
        }
        if ($this->attributes['project_duration_in_month']) {
            $months = $this->attributes['project_duration_in_month'] . ' month' . ($this->attributes['project_duration_in_month'] != 1 ? 's' : '');
            if ($formattedDuration) {
                $formattedDuration .= ' ';
            }
            $formattedDuration .= $months;
        }
        return $formattedDuration;
    }

    public function getProjectSizeCurrencyAttribute($value)
    {
        if ($this->attributes['project_size_currency'] === 'INR') {
            return $this->attributes['project_size_currency'];
        } elseif ($this->attributes['project_size_currency'] === 'USD') {
            return $this->attributes['project_size_currency'];
        } else {
            return $value; 
        }
    }
    

}
