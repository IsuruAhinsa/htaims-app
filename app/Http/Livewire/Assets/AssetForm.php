<?php

namespace App\Http\Livewire\Assets;

use App\Models\Asset;
use App\Models\AssetPhoto;
use App\Models\Contractor;
use App\Models\Department;
use App\Models\Hospital;
use App\Models\Location;
use App\Models\Manufacturer;
use App\Models\Task;
use App\Models\Vendor;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class AssetForm extends Component
{
    public $state = [];
    public $hospital;
    public $contractor;
    public $location;
    public $department;
    public $vendor;
    public $manufacturer;
    public $type_code;
    public $manuals;
    public $variation;
    public $ppm_date;
    public $pm_frequency;
    public $status;
    public $purchase_date;
    public $warranty_expire_date;
    public $warranty_status;
    public $date_commissioned;
    public $date_created;

    public $images;

    public $updateMode = false;

    use Actions;
    use WithFileUploads;

    protected $listeners = [
        'clear_file' => 'clearImage'
    ];

    public function store()
    {
        $input = $this->mergeArray();

        $validatedData = Validator::make($input, [
            'type' => ['required'],
            'asset_no' => ['required', 'string', 'max:50', 'unique:assets,asset_no'],
            'service' => ['nullable', 'string'],
            'type_code' => ['required'],
            'description' => ['nullable', 'string'],
            'brand' => ['nullable', 'string'],
            'model' => ['nullable', 'string'],
            'serial' => ['nullable', 'string'],
            'registration' => ['nullable', 'string'],
            'status' => ['required', 'string'],
            'ownership' => ['required'],
            'utilization' => ['required'],
            'pm_frequency' => ['required'],
            'purchase_date' => ['required', 'date'],
            'warranty_period' => ['nullable', 'string'],
            'warranty_expire_date' => ['nullable', 'date'],
            'warranty_status' => ['nullable', 'string'],
            'cost_center' => ['nullable', 'string'],
            'date_commissioned' => ['nullable', 'date'],
            'ppm_date' => ['required', 'date'],
            'purchase_order' => ['nullable', 'string'],
            'manuals' => ['required'],
            'purchase_price' => ['nullable', 'numeric'],
            'variation' => ['nullable'],
            'comments' => ['nullable', 'string'],
            'date_created' => ['required', 'date'],
            'staff_name' => ['nullable', 'string'],
            'electrical' => ['nullable', 'string'],
            'mechanical' => ['nullable', 'string'],
            'capacity' => ['nullable', 'string'],
            'hospital' => ['required'],
            'department' => ['required'],
            'location' => ['required'],
            'manufacturer' => ['required'],
            'vendor' => ['required'],
            'contractor' => ['required'],
            'generic_name' => ['required', 'string'],
            'hospital_asset_no' => ['required', 'string'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpeg,bmp,png,svg,gif,webp,jpg', 'max:5120']
        ], [], [
            'type' => 'Category',
            'image.*' => 'Images'
        ])->validate();

        $taskData = Task::find($validatedData['type_code']);

        $asset = new Asset;
        $asset->contractor_id = $validatedData['contractor'];
        $asset->department_id = $validatedData['department'];
        $asset->hospital_id = $validatedData['hospital'];
        $asset->location_id = $validatedData['location'];
        $asset->manufacturer_id = $validatedData['manufacturer'];
        $asset->task_id = $validatedData['type_code'];
        $asset->vendor_id = $validatedData['vendor'];

        $asset->asset_no = $validatedData['asset_no'];
        $asset->type = $validatedData['type'];
        $asset->service = $validatedData['service'];
        $asset->brand = $validatedData['brand'];
        $asset->model = $validatedData['model'];
        $asset->serial = $validatedData['serial'];
        $asset->registration = $validatedData['registration'];
        $asset->status = $validatedData['status'];
        $asset->ownership = $validatedData['ownership'];
        $asset->utilization = $validatedData['utilization'];
        $asset->pm_frequency = $validatedData['pm_frequency'];
        $asset->purchase_date = $validatedData['purchase_date'];
        $asset->warranty_period = $validatedData['warranty_period'];
        $asset->warranty_expire_date = $validatedData['warranty_expire_date'];
        $asset->warranty_status = $validatedData['warranty_status'];
        $asset->cost_center = $validatedData['cost_center'];
        $asset->date_commissioned = $validatedData['date_commissioned'];
        $asset->ppm_date = $validatedData['ppm_date'];
        $asset->purchase_order = $validatedData['purchase_order'];
        $asset->manuals = $validatedData['manuals'];
        $asset->purchase_price = $validatedData['purchase_price'];
        $asset->variation = $validatedData['variation'];
        $asset->comments = $validatedData['comments'];
        $asset->date_created = $validatedData['date_created'];
        $asset->staff_name = $validatedData['staff_name'];
        $asset->electrical = $validatedData['electrical'];
        $asset->mechanical = $validatedData['mechanical'];
        $asset->capacity = $validatedData['capacity'];
        $asset->description = $taskData->description;
        $asset->generic_name =  $validatedData['generic_name'];
        $asset->hospital_asset_no =  $validatedData['hospital_asset_no'];
        $asset->save();

        // multiple image upload
        $this->uploadMultiplePhotos($asset);

        $this->dialog()->confirm([
            'title'       => 'Asset Saved! Redirect?',
            'description' => 'Asset saved! Do you want to redirect to all assets page?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, redirect',
                'method' => 'redirectToAssetPage',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function clearImage($index)
    {
        unset($this->images[$index]);
    }

    protected function uploadMultiplePhotos($asset)
    {
        if ($this->images) {
            foreach ($this->images as $image) {

                $assetPhoto = new AssetPhoto();
                $assetPhoto->asset_id = $asset->id;

                if ($image->isValid()) {
                    $assetPhoto->updatePhoto($image, 'image', 'uploads/assets/images');
                }

                $assetPhoto->save();
            }
        }
    }

    public function redirectToAssetPage()
    {
        return redirect()->route('assets.index');
    }

    protected function mergeArray(): array
    {
        return array_merge($this->state, [
            'hospital' => $this->hospital,
            'contractor' => $this->contractor,
            'location' => $this->location,
            'department' => $this->department,
            'vendor' => $this->vendor,
            'manufacturer' => $this->manufacturer,
            'type_code' => $this->type_code,
            'manuals' => $this->manuals,
            'variation' => $this->variation,
            'ppm_date' => $this->ppm_date,
            'pm_frequency' => $this->pm_frequency,
            'status' => $this->status,
            'purchase_date' => $this->purchase_date,
            'warranty_expire_date' => $this->warranty_expire_date,
            'warranty_status' => $this->warranty_status,
            'date_commissioned' => $this->date_commissioned,
            'date_created' => $this->date_created,
        ]);
    }

    public function render()
    {
        return view('assets.asset-form', [
            'hospitals' => Hospital::all()->sortByDesc('created_at'),
            'contractors' => Contractor::all()->sortByDesc('created_at'),
            'locations' => Location::all()->sortByDesc('created_at'),
            'departments' => Department::all()->sortByDesc('created_at'),
            'vendors' => Vendor::all()->sortByDesc('created_at'),
            'manufacturers' => Manufacturer::all()->sortByDesc('created_at'),
            'tasks' => Task::all()->sortByDesc('created_at'),
        ]);
    }
}
