<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyQues extends Model
{
    use HasFactory;
    protected $table = 'survey_questions';
    protected $fillable = [
        'name',
        'survey_topics_id', 
        'ques_type',
        'options',
        'survey_topics_id'

    ];

    public function answers(){
        return $this->hasMany(SurveyAns::class, 'survey_questions_id', 'survey_questions_id');
    }
}
