<?php

namespace App\Http\Livewire\Vendors;

use App\Models\Vendor;
use App\Traits\PowergridActionButton;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

class VendorTable extends PowerGridComponent
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
        return Vendor::query();
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
            ->addColumn('name')
            ->addColumn('contact_person')
            ->addColumn('address')
            ->addColumn('city')
            ->addColumn('state')
            ->addColumn('zip')
            ->addColumn('country')
            ->addColumn('phone')
            ->addColumn('fax')
            ->addColumn('email')
            ->addColumn('created_at_formatted', function(Vendor $model) {
                return $model->getFormattedDateObject($model->created_at, 'datetime', false);
            })
            ->addColumn('updated_at_formatted', function(Vendor $model) {
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
                ->title('NAME')
                ->field('name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('CONTACT PERSON')
                ->field('contact_person')
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
                ->title('CITY')
                ->field('city')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('STATE')
                ->field('state')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('ZIP')
                ->field('zip')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('COUNTRY')
                ->field('country')
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
