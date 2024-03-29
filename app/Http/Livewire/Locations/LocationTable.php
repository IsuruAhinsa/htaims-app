<?php

namespace App\Http\Livewire\Locations;

use App\Models\Location;
use App\Traits\PowergridActionButton;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

class LocationTable extends PowerGridComponent
{
    use PowergridActionButton;

    public string $sortDirection = 'desc';

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp()
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
        return Location::query();
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
            ->addColumn('code')
            ->addColumn('description')
            ->addColumn('created_at_formatted', function(Location $model) {
                return $model->getFormattedDateObject($model->created_at, 'datetime', false);
            })
            ->addColumn('updated_at_formatted', function(Location $model) {
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
    public function columns(): array
    {
        return [
            Column::add()
                ->title(__('CODE'))
                ->field('code')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title(__('DESCRIPTION'))
                ->field('description')
                ->sortable()
                ->headerAttribute(false, 'width:50%')
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title(__('CREATED AT'))
                ->field('created_at_formatted')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('created_at'),

            Column::add()
                ->title(__('UPDATED AT'))
                ->field('updated_at_formatted')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('updated_at')
                ->hidden(),
        ];
    }

}
