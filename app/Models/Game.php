<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Game
 *
 * @property int $id
 * @property string $chars
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Game newModelQuery()
 * @method static Builder|Game newQuery()
 * @method static Builder|Game query()
 * @method static Builder|Game whereChars($value)
 * @method static Builder|Game whereCreatedAt($value)
 * @method static Builder|Game whereId($value)
 * @method static Builder|Game whereUpdatedAt($value)
 * @method static Builder|Game whereUserId($value)
 */
class Game extends Model
{
    use HasFactory;

    protected $table = 'game';

    protected $fillable = [
        'chars',
    ];
}
