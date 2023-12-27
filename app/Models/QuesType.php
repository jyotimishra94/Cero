<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuesType extends Model
{
    use HasFactory;
    protected $table = 'ques_types';
    protected $fillable = [
        'ques_type',
        'survey_questions_id',
        'survey_topics_id',
        'status'
        
    ];
}
