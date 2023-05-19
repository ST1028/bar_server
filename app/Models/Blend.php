<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blend
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Friend newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Friend newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Friend query()
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereUserId($value)
 * @mixin \Eloquent
 */
class Blend extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];
}
