<?php

namespace App\Http\Livewire\Roles;

use Illuminate\Support\Str;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

class RoleTable extends PowerGridComponent
{
    use ActionButton;

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
            ->showPerPage();
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
        return Role::query();
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
            ->addColumn('role_name', function (Role $model) {
                return $model->name;
            })
            ->addColumn('permissions', function (Role $model) {

                $data = "<div class='flex flex-wrap justify-center'>";

                if ($model->name == 'Super Administrator') {

                    foreach (Permission::all() as $permission) {

                        $data .= "<span class='flex justify-center items-center m-1 font-medium py-1 px-2 rounded-full text-blue-700 bg-blue-100 border border-blue-300'>";

                        $data .= "<span class='text-xs font-normal leading-none max-w-full flex-initial'>" . ucwords(Str::replaceFirst('.', ' ', $permission->name)) . "</span>";

                        $data .= "</span>";

                    }

                } else {

                    foreach ($model->permissions as $permission) {

                        $data .= "<span class='flex justify-center items-center m-1 font-medium py-1 px-2 rounded-full text-blue-700 bg-blue-100 border border-blue-300'>";

                        $data .= "<span class='text-xs font-normal leading-none max-w-full flex-initial'>" . ucwords(Str::replaceFirst('.', ' ', $permission->name)) . "</span>";

                        $data .= "</span>";

                    }

                }

                $data .= "</div>";

                return $data;
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
                ->hidden(),

            Column::add()
                ->title('Role Name')
                ->field('role_name'),

            Column::add()
                ->title('Permissions')
                ->field('permissions'),

        ];
    }

    public function actions(): array
    {
        $editSVGCaption = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>';

        $deleteSVGCaption = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>';

        return [
            Button::add('edit')
                ->caption(__($editSVGCaption))
                ->route('roles.edit', ['role' => 'id'])
                ->target('_self'),

            Button::add('destroy')
                ->caption(__($deleteSVGCaption))
                ->method('delete')
                ->route('roles.destroy', ['role' => 'id'])
                ->target('_self'),
        ];
    }
}
