<?php

namespace App\Http\Livewire\Assets;

use App\Models\Asset;
use App\Traits\PowergridTrashActionButton;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

class AssetTrashTable extends PowerGridComponent
{
    use PowergridTrashActionButton;

    public string $sortDirection = 'desc';

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): void
    {
        $this->showRecordCount('full')
            ->showToggleColumns()
            ->showPerPage()
            ->showSearchInput();
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */
    public function datasource(): ?Builder
    {
        return Asset::query()->onlyTrashed();
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('generic_name')
            ->addColumn('asset_no')
            ->addColumn('type', function (Asset $model) {
                if ($model->type == 'BEMS') {
                    $color = 'indigo';
                } else {
                    $color = 'yellow';
                }
                return "<span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{$color}-100 text-{$color}-600'>
                  $model->type
                </span>";
            })
            ->addColumn('service')
            ->addColumn('brand')
            ->addColumn('model')
            ->addColumn('serial')
            ->addColumn('registration')
            ->addColumn('status', function (Asset $model) {
                return "<span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-600'>
                  $model->status
                </span>";
            })
            ->addColumn('ownership')
            ->addColumn('utilization')
            ->addColumn('pm_frequency')
            ->addColumn('purchase_date')
            ->addColumn('warranty_period')
            ->addColumn('warranty_expire_date')
            ->addColumn('warranty_status', function (Asset $model) {
                if ($model->warranty_status == 'Expired') {
                    $color = 'red';
                } else {
                    $color = 'green';
                }
                return "<span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{$color}-100 text-{$color}-600'>
                  $model->warranty_status
                </span>";
            })
            ->addColumn('cost_center')
            ->addColumn('date_commissioned')
            ->addColumn('ppm_date')
            ->addColumn('purchase_order')
            ->addColumn('manuals')
            ->addColumn('purchase_price')
            ->addColumn('variation')
            ->addColumn('comments')
            ->addColumn('date_created')
            ->addColumn('staff_name')
            ->addColumn('electrical')
            ->addColumn('mechanical')
            ->addColumn('capacity')
            ->addColumn('description')
            ->addColumn('hospital_asset_no')
            ->addColumn('created_at_formatted', function(Asset $model) {
                return $model->getFormattedDateObject($model->created_at, 'datetime', false);
            })
            ->addColumn('updated_at_formatted', function(Asset $model) {
                return $model->getFormattedDateObject($model->updated_at, 'datetime', false);
            });
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::add()
                ->title('ID')
                ->field('id')
                ->hidden()
                ->makeInputRange(),

            Column::add()
                ->title('GENERIC NAME')
                ->field('generic_name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('ASSET NO')
                ->field('asset_no')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('TYPE')
                ->field('type')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('SERVICE')
                ->field('service')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('BRAND')
                ->field('brand')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('MODEL')
                ->field('model')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('SERIAL')
                ->field('serial')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('REGISTRATION')
                ->field('registration')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('STATUS')
                ->field('status')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('OWNERSHIP')
                ->field('ownership')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('UTILIZATION')
                ->field('utilization')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('PM FREQUENCY')
                ->field('pm_frequency')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('PURCHASE DATE')
                ->field('purchase_date')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('purchase_date'),

            Column::add()
                ->title('WARRANTY PERIOD')
                ->field('warranty_period')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('WARRANTY EXPIRE DATE')
                ->field('warranty_expire_date')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('warranty_expire_date'),

            Column::add()
                ->title('WARRANTY STATUS')
                ->field('warranty_status')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('COST CENTER')
                ->field('cost_center')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('DATE COMMISSIONED')
                ->field('date_commissioned')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('date_commissioned'),

            Column::add()
                ->title('PPM DATE')
                ->field('ppm_date')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('ppm_date'),

            Column::add()
                ->title('PURCHASE ORDER')
                ->field('purchase_order')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('MANUALS')
                ->field('manuals')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('PURCHASE PRICE')
                ->field('purchase_price')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title('VARIATION')
                ->field('variation')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('COMMENTS')
                ->field('comments')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title('DATE CREATED')
                ->field('date_created')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('date_created'),

            Column::add()
                ->title('STAFF NAME')
                ->field('staff_name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('ELECTRICAL')
                ->field('electrical')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('MECHANICAL')
                ->field('mechanical')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('CAPACITY')
                ->field('capacity')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('DESCRIPTION')
                ->field('description')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title('HOSPITAL ASSET NO')
                ->field('hospital_asset_no')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('CREATED AT')
                ->field('created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->hidden()
                ->makeInputDatePicker('created_at'),

            Column::add()
                ->title('UPDATED AT')
                ->field('updated_at_formatted', 'updated_at')
                ->searchable()
                ->sortable()
                ->hidden()
                ->makeInputDatePicker('updated_at'),

        ];
    }
}
