<?php

namespace App\Models;

use App\Traits\UnixTimestampSerializable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory;
    use SoftDeletes;
    use UnixTimestampSerializable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'code',
        'description',
    ];

    /**
     * Get the assets for the location.
     */
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
