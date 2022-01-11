<x-app-layout>

    <div class="py-3 px-6 border-t dark:border-dark-third lg:flex lg:items-center lg:justify-between">

        <div class="flex-1 min-w-0">

            {{ Breadcrumbs::render('roles.edit', $role) }}

            <h2 class="text-2xl font-bold leading-7 text-gray-900 dark:text-white sm:text-3xl sm:truncate">
                {{ $role->name }}
            </h2>

        </div>

    </div>

    <div x-data="{{ json_encode(['RoleHasAllPermissions' => \App\Models\User::roleHasPermissions($role, $allPermissions)]) }}" class="bg-white dark:bg-dark-secondary rounded-xl py-10 px-12 mx-4">

        <form action="{{ route('roles.update', $role->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">
                <x-jet-label for="name" value="{{ __('Role Name') }}"/>
                <x-jet-input id="name" type="text" placeholder="Enter Role Name" class="mt-1 block w-full" name="name" value="{{ $role->name }}"/>
                <x-jet-input-error for="name" class="mt-2"/>
            </div>

            <div class="mb-4">

                <x-jet-label for="permissions" value="{{ __('Permissions') }}"/>

                <label class="flex flex-row items-center py-3 cursor-pointer">
                    <x-jet-checkbox
                        class="text-indigo-600 focus:border-indigo-300 focus:ring-indigo-200"
                        id="checkPermissionAll"
                        value="1"
                        x-bind:checked="RoleHasAllPermissions"/>
                    <span class="ml-2 text-gray-700 font-medium dark:text-dark-typography">All</span>
                </label>

                <hr>

                @php $i = 1; @endphp

                @foreach($permissionGroups as $permissionGroup)

                    <div class="grid grid-cols-3 gap-2">

                        @php
                            $permissions = \App\Models\User::getpermissionsByGroupName($permissionGroup->name);
                            $j = 1;
                        @endphp

                        <div class="col-span-3 sm:col-span-1">

                            <label x-data="{{ json_encode(['roleHasPermissions' => \App\Models\User::roleHasPermissions($role, $permissions)]) }}" class="flex flex-row items-center py-3 cursor-pointer">
                                <x-jet-checkbox
                                    id="{{ $i }}Management"
                                    value="{{ $permissionGroup->name }}"
                                    x-bind:checked="roleHasPermissions"
                                    onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)"
                                    class="text-indigo-600 focus:border-indigo-300 focus:ring-indigo-200"
                                />
                                <span class="ml-2 text-gray-700 font-medium dark:text-dark-typography">{{ $permissionGroup->name }}</span>
                            </label>

                        </div>

                        <div class="col-span-3 sm:col-span-2 py-3 role-{{ $i }}-management-checkbox">

                            @foreach($permissions as $permission)

                                <label x-data="{{ json_encode(['RoleHasPermissionTo' => $role->hasPermissionTo($permission->name) ]) }}" class="flex flex-row items-center cursor-pointer py-0">
                                    <x-jet-checkbox
                                        id="checkPermission{{ $permission->id }}"
                                        name="permissions[]"
                                        value="{{ $permission->name }}"
                                        x-bind:checked="RoleHasPermissionTo"
                                        onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})"
                                        class="text-indigo-600 focus:border-indigo-300 focus:ring-indigo-200"
                                    />
                                    <span class="ml-2 text-gray-700 dark:text-dark-typography">{{ ucwords(Str::of($permission->name)->replace('.', ' ')) }}</span>
                                </label>

                                @php  $j++; @endphp

                            @endforeach

                        </div>

                    </div>

                    @if(!$loop->last)
                        <hr>
                    @endif

                    @php  $i++; @endphp

                @endforeach

            </div>

            <div class="text-right">

                <a href="{{ route('roles.index') }}">
                    <x-jet-secondary-button>
                        Nevermind
                    </x-jet-secondary-button>
                </a>

                <x-jet-button>
                    {{ __('Update Role') }}
                </x-jet-button>

            </div>

        </form>

    </div>

    @push('js')
        <script type="text/javascript">
            $(document).ready(function () {
                // check and uncheck all the permission
                $("#checkPermissionAll").click(function () {
                    if ($(this).is(':checked')) {
                        $('input[type=checkbox]').prop('checked', true);
                    } else {
                        $('input[type=checkbox]').prop('checked', false);
                    }
                })
            });

            function checkPermissionByGroup(className, checkThis) {
                const groupIdName = $("#" + checkThis.id);
                const classCheckBox = $('.' + className + ' input');
                if (groupIdName.is(':checked')) {
                    classCheckBox.prop('checked', true);
                } else {
                    classCheckBox.prop('checked', false);
                }
                implementAllChecked();
            }

            function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
                const classCheckbox = $('.' + groupClassName + ' input');
                const groupIDCheckBox = $("#" + groupID);
                // if there is any occurrence where something is not selected then make selected = false
                if ($('.' + groupClassName + ' input:checked').length == countTotalPermission) {
                    groupIDCheckBox.prop('checked', true);
                } else {
                    groupIDCheckBox.prop('checked', false);
                }
                implementAllChecked();
            }

            function implementAllChecked() {
                const countPermissions = {{ count($allPermissions) }};
                const countPermissionGroups = {{ count($permissionGroups) }};
                //  console.log((countPermissions + countPermissionGroups));
                //  console.log($('input[type="checkbox"]:checked').length);
                if ($('input[type="checkbox"]:checked').length >= (countPermissions + countPermissionGroups)) {
                    $("#checkPermissionAll").prop('checked', true);
                } else {
                    $("#checkPermissionAll").prop('checked', false);
                }
            }
        </script>
    @endpush

</x-app-layout>
