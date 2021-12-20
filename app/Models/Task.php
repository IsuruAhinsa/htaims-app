<?php

namespace App\Models;

use App\Traits\HasFile;
use App\Traits\UnixTimestampSerializable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;
    use UnixTimestampSerializable;
    use HasFile;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'type_code',
        'description',
        'checklist_path',
        'service_life',
    ];
}
