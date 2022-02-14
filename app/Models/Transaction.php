<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

/**
 * @package App\Models
 * @Transaction
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $amount
 * @property string $description
 * @property string $status
 *
 * @property-read Collection|User $user
 *
 */

class Transaction extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'amount',
            'description',
            'status'

        ];

    /**
     * @return BelongsTo
     */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
