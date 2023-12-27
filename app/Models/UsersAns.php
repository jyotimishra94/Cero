<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersAns extends Model
{
    use HasFactory;
    protected $primaryKey = 'survey_users_answers_id';
    protected $table = 'survey_user_answers';
    protected $fillable = [
        'ans_name',
        'ques_name',
        'survey_questions_id',
        'user_id',
        'survey_topics_id',
        'status',
        'others'
        
    ];

    public function answers(){
        return $this->hasMany(SurveyAns::class, 'survey_questions_id', 'survey_questions_id');

    }
   
}
