<?php

namespace App\Models;

use App\Traits\UnixTimestampSerializable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
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
        'name',
        'region',
        'address',
        'phone',
        'fax',
        'email',
        'total_asset',
        'wo_prefix',
        'wocm_slno',
        'wopm_slno',
        'hospital_code_prefix',
    ];

    /**
     * Get the assets for the hospital.
     */
    public function assets()
    {
        return $this->hasMany(Asset::class,);
    }
}
