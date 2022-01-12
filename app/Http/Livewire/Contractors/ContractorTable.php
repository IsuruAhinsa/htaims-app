<?php

namespace App\Http\Livewire\Contractors;

use App\Models\Contractor;
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

class ContractorTable extends PowerGridComponent
{
    use PowergridActionButton;

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
        return Contractor::query();
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
            ->addColumn('reference_code')
            ->addColumn('contractor_no')
            ->addColumn('name')
            ->addColumn('start_date')
            ->addColumn('end_date')
            ->addColumn('type')
            ->addColumn('value')
            ->addColumn('created_at_formatted', function(Contractor $model) {
                return $model->getFormattedDateObject($model->created_at, 'datetime', false);
            })
            ->addColumn('updated_at_formatted', function(Contractor $model) {
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
                ->title('REFERENCE CODE')
                ->field('reference_code')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('CONTRACTOR NO')
                ->field('contractor_no')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('NAME')
                ->field('name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('START DATE')
                ->field('start_date')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('start_date'),

            Column::add()
                ->title('END DATE')
                ->field('end_date')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('end_date'),

            Column::add()
                ->title('TYPE')
                ->field('type')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title('VALUE')
                ->field('value')
                ->sortable()
                ->makeInputRange()
                ->searchable(),

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
