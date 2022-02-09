<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 * @NewsModel
 * @property $titleUa
 * @property $titleRu
 * @property $titleEn
 * @property $contentUa
 * @property $contentRa
 * @property $contentEn

 */
class News extends Model
{
    use HasFactory;

    protected $fillable = [

        'title_ua',
        'title_ru',
        'title_en',
        'content_ua',
        'content_ru',
        'content_en',
    ];
}
