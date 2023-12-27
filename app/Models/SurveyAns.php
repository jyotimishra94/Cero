<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyAns extends Model
{
    use HasFactory;
    protected $table = 'survey_answers';
    protected $fillable = [
        'name',
        'survey_questions_id', 
        'ques_name',
        'survey_topic_name'
    ];
}
