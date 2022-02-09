<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 *
 * @Question
 *
 * @property $question_ua
 * @property $question_ru
 * @property $question_en
 * @property $answer_ua
 * @property $answer_ru
 * @property $answer_en
 */


class Question extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'question_ua',
            'question_ru',
            'question_en',
            'answer_ua',
            'answer_ru',
            'answer_en',
        ];
}
