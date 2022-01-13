<?php

namespace App\Http\Livewire\Hospitals;

use App\Models\Hospital;
use App\Traits\PowergridTrashActionButton;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

class HospitalTrashTable extends PowerGridComponent
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
        return Hospital::query()->onlyTrashed();
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
            ->addColumn('code')
            ->addColumn('hospital_code_prefix')
            ->addColumn('name')
            ->addColumn('region')
            ->addColumn('address')
            ->addColumn('phone')
            ->addColumn('fax')
            ->addColumn('email')
            ->addColumn('wo_prefix')
            ->addColumn('wocm_slno')
            ->addColumn('wopm_slno')
            ->addColumn('created_at_formatted', function(Hospital $model) {
                return $model->getFormattedDateObject($model->created_at, 'datetime', false);
            })
            ->addColumn('updated_at_formatted', function(Hospital $model) {
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
                ->title('CODE')
                ->field('code')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('HOSPITAL CODE PREFIX')
                ->field('hospital_code_prefix')
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
                ->title('REGION')
                ->field('region')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('ADDRESS')
                ->field('address')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('PHONE')
                ->field('phone')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('FAX')
                ->field('fax')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('EMAIL')
                ->field('email')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('WO PREFIX')
                ->field('wo_prefix')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('WOCM SLNO')
                ->field('wocm_slno')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('WOPM SLNO')
                ->field('wopm_slno')
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
