<?php

namespace App\Http\Livewire\Assets;

use App\Models\Asset;
use App\Traits\PowergridActionButton;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

class AssetTable extends PowerGridComponent
{
    use ActionButton;

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
            ->showExportOption('download', ['excel', 'csv'])
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
        return Asset::query();
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

    public function actions(): array
    {
        $editSVGCaption = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>';

        $viewSVGCaption = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>';

        $deleteSVGCaption = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>';

        return [
            Button::add('view')
                ->caption(__($viewSVGCaption))
                ->route('assets.show', ['id'])
                ->target('_self'),
        ];
    }
}
