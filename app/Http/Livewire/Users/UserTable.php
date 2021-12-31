<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
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

class UserTable extends PowerGridComponent
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
        return User::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
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

            ->addColumn('name', function (User $model) {
                return "<div class='flex items-center'>" . "<div class='flex-shrink-0 h-10 w-10'>" . "<img class='h-10 w-10 rounded-full' src='$model->profile_photo_url' alt='$model->name'>" . "</div>" . "<div class='ml-4'>" . "<div class='text-sm font-medium text-gray-900 dark:text-white'>" . $model->name . "</div>" . "<div class='text-sm text-gray-500 dark:text-dark-typography'>" . $model->email . "</div>" . "</div>" . "</div>";
            })

            ->addColumn('phone')

            ->addColumn('last_login_formatted', function(User $model) {
                return "<div class='text-sm text-gray-900 dark:text-white'>{$model->getFormattedDateObject($model->last_login, 'datetime', false)}</div>" .
                "<div class='text-sm text-gray-500 dark:text-dark-typography'>$model->last_login_ip</div>";
            })

            ->addColumn('role', function (User $model) {
                $data = "";
                foreach ($model->roles as $role) {
                    $data .= "<div class='whitespace-nowrap text-sm text-gray-500 dark:text-dark-typography'>{$role->name}</div>";
                }

                return $data;
            })

            ->addColumn('created_at_formatted', function(User $model) {
                return $model->getFormattedDateObject($model->created_at, 'datetime', false);
            })

            ->addColumn('updated_at_formatted', function(User $model) {
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
                ->makeInputRange()
                ->hidden(),

            Column::add()
                ->title('NAME')
                ->field('name')
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
                ->title('LAST LOGIN')
                ->field('last_login_formatted', 'last_login')
                ->sortable()
                ->makeInputDatePicker('last_login'),

            Column::add()
                ->title('ROLE')
                ->field('role'),

            Column::add()
                ->title('CREATED AT')
                ->field('created_at_formatted', 'created_at')
                ->sortable()
                ->makeInputDatePicker('created_at'),

            Column::add()
                ->title('UPDATED AT')
                ->field('updated_at_formatted', 'updated_at')
                ->sortable()
                ->makeInputDatePicker('updated_at')
                ->hidden(),
        ];
    }
}
