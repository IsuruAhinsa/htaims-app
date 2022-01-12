<?php

namespace App\Models;

use App\Traits\UnixTimestampSerializable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contractor extends Model
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
        'reference_code',
        'contractor_no',
        'name',
        'start_date',
        'end_date',
        'type',
        'value',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'start_date',
        'end_date',
    ];

    /**
     * Contractor's types.
     * @return string[]
     */
    public static function contractorTypes(): array
    {
        return array(
            'Project Contractor' => 'Project Contractor',
            'Full-Time Contractor' => 'Full-Time Contractor',
            'Permanent Contractor' => 'Permanent Contractor',
        );
    }

    /**
     * Get the formatted start date.
     *
     */
    public function getStartDateAttribute($value)
    {
        return self::getFormattedDateObject($value, 'date', false);
    }

    /**
     * Get the formatted end date.
     *
     */
    public function getEndDateAttribute($value)
    {
        return self::getFormattedDateObject($value, 'date', false);
    }
}
