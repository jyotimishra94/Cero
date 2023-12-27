<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTopic extends Model
{
    use HasFactory;
    protected $table = 'survey_topics';
    protected $fillable = [
        'name',
        'parent_id',
        'status'
        
    ];
}
