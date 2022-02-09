<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 *
 * @Setting
 *
 * @property integer $id
 * @property string $setting_type
 * @property string $setting_email
 */

class Setting extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'setting_type',
            'setting_email',
        ];
}
