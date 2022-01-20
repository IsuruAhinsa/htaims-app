<?php

namespace App\Models;

use App\Traits\UnixTimestampSerializable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
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
        'generic_name',
        'asset_no',
        'type',
        'service',
        'brand',
        'model',
        'serial',
        'registration',
        'status',
        'ownership',
        'utilization',
        'pm_frequency',
        'purchase_date',
        'warranty_period',
        'warranty_expire_date',
        'warranty_status',
        'cost_center',
        'date_commissioned',
        'ppm_date',
        'purchase_order',
        'manuals',
        'purchase_price',
        'variation',
        'asset_condition',
        'comments',
        'date_created',
        'staff_name',
        'electrical',
        'mechanical',
        'capacity',
        'description',
        'hospital_asset_no',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date_created',
        'ppm_date',
        'date_commissioned',
        'warranty_expire_date',
        'purchase_date',
    ];

    public static function assetStatus(): array
    {
        return array(
            "FG" => "Functioning Good",
            "FP" => "Functioning Partially",
            "FTF" => "Functioning Test Failed",
            "STF" => "Safety Test Failed",
            "BER" => "Beyond Economic Repair",
            "MP" => "Missing Parts",
            "ASP" => "Awaiting Spare Parts",
            "SSR" => "Sent to Supplier for Repair",
            "IAS" => "In-Active in Storage",
            "NOP" => "Non-Operational",
            "UNS" => "User Not Satisfied",
            "D" => "Damage",
            "NW" => "Not Working"
        );
    }

    public static function assetManuals(): array
    {
        return array(
            "INST.M" => "Installation Manual",
            "OM" => "Operation Manual",
            "IM" => "Instruction Manual",
            "SM" => "Service Manual",
            "CD" => "Circuit Diagram",
            "PL" => "Parts List",
        );
    }

    public static function assetVariations(): array
    {
        return array(
            "V1" => "Existing / No Claim",
            "V10" => "Asset in Initial Fee Submission (New Replacement Hospital)",
            "V3" => "Added Installed Facilities (New)",
            "V4" => "Decommissioned Installed Facilities",
        );
    }

    public static function warrantyStatus(): array
    {
        return array(
            'In warranty' => 'In warranty',
            'Expired' => 'Expired',
        );
    }

    public function getPurchaseDateAttribute($value)
    {
        return self::getFormattedDateObject($value, 'date', false);
    }

    public function getWarrantyExpireDateAttribute($value)
    {
        return self::getFormattedDateObject($value, 'date', false);
    }

    public function getDateCommissionedAttribute($value)
    {
        return self::getFormattedDateObject($value, 'date', false);
    }

    public function getPPMDateAttribute($value)
    {
        return self::getFormattedDateObject($value, 'date', false);
    }

    public function getDateCreatedAttribute($value)
    {
        return self::getFormattedDateObject($value, 'date', false);
    }

    /**
     * Get the asset photos for the asset.
     */
    public function photos()
    {
        return $this->hasMany(AssetPhoto::class);
    }

    /**
     * Get the hospital that owns the asset.
     */
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    /**
     * Get the location that owns the asset.
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Get the manufacturer that owns the asset.
     */
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    /**
     * Get the department that owns the asset.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the vendor that owns the asset.
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    /**
     * Get the contractor that owns the asset.
     */
    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }
}
