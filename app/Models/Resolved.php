<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Resolved
 *
 * @property int $id
 * @property array $steps
 * @property int $game_id
 * @property int $difference
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Resolved newModelQuery()
 * @method static Builder|Resolved newQuery()
 * @method static Builder|Resolved query()
 * @method static Builder|Resolved whereCreatedAt($value)
 * @method static Builder|Resolved whereDifference($value)
 * @method static Builder|Resolved whereGameId($value)
 * @method static Builder|Resolved whereId($value)
 * @method static Builder|Resolved whereSteps($value)
 * @method static Builder|Resolved whereUpdatedAt($value)
 */
class Resolved extends Model
{
    use HasFactory;

    protected $table = 'resolved';

    protected $fillable = [
        'steps',
        'difference'
    ];

    protected $casts = [
        'steps' => 'json',
    ];
}
