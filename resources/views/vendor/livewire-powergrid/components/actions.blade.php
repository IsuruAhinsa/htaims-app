@props([
    'actions' => null,
    'theme' => null,
    'row' => null
])

<div class="w-full md:w-auto">
    @if(isset($actions) && count($actions) && $row !== '')
        <td class="pg-actions {{ $theme->table->tdBodyClass }} text-center">
            <div class="inline-flex">
                @foreach($actions as $key => $action)
                    @php
                        foreach ($action->param as $param => $value) {
                            if (!empty($row->{$value})) {
                               $parameters[$param] = $row->{$value};
                            } else {
                               $parameters[$param] = $value;
                            }
                        }
                    @endphp

                    @if(filled($action->event) || filled($action->view))
                        <a @if($action->event) wire:click='$emit("{{ $action->event }}", @json($parameters))'
                           @endif
                           @if($action->view) wire:click='$emit("openModal", "{{$action->view}}", @json($parameters))'
                           @endif
                           class="{{ filled($action->class) ? $action->class : 'cursor-pointer py-2 px-2 text-gray-500 dark:text-dark-typography bg-white dark:bg-dark-primary focus:shadow-outline hover:bg-gray-100 dark:hover:bg-dark-secondary dark:border-dark-third shadow-sm' }} {{ $loop->first ? 'rounded-l-lg border border-gray-200' : ''}} {{ $loop->last ? 'rounded-r-md border border-l-0 border-gray-200' : '' }} {{ !$loop->first && !$loop->last ? 'border-t border-b border-gray-200' : '' }} {{ $loop->even ? 'border-r border-gray-200' : '' }} {{ $loop->odd ? 'border-r border-gray-200' : '' }}">
                            {!! $action->caption !!}
                        </a>
                    @endif

                    @if(filled($action->route))
                        @if(strtolower($action->method) !== 'get')
                            <form target="{{ $action->target }}"
                                  action="{{ route($action->route, $parameters) }}"
                                  method="post">
                                @method($action->method)
                                @csrf
                                <button type="submit"
                                        class="{{ filled($action->class) ? $action->class : 'cursor-pointer py-2 px-2 text-gray-500 dark:text-dark-typography bg-white dark:bg-dark-primary focus:shadow-outline hover:bg-gray-100 dark:hover:bg-dark-secondary dark:border-dark-third shadow-sm' }} {{ $loop->first ? 'rounded-l-lg border border-gray-200' : ''}} {{ $loop->last ? 'rounded-r-md border border-l-0 border-gray-200' : '' }} {{ !$loop->first && !$loop->last ? 'border-t border-b border-gray-200' : '' }} {{ $loop->even ? 'border-r border-gray-200' : '' }} {{ $loop->odd ? 'border-r border-gray-200' : '' }}"
                                >
                                    {!! $action->caption ?? '' !!}
                                </button>
                            </form>
                        @else
                            <a href="{{ route($action->route, $parameters) }}"
                               target="{{ $action->target }}"
                               class="{{ filled($action->class) ? $action->class : 'cursor-pointer py-2 px-2 text-gray-500 dark:text-dark-typography bg-white dark:bg-dark-primary focus:shadow-outline hover:bg-gray-100 dark:hover:bg-dark-secondary dark:border-dark-third shadow-sm' }} {{ $loop->first ? 'rounded-l-lg border border-gray-200' : ''}} {{ $loop->last ? 'rounded-r-md border border-l-0 border-gray-200' : '' }} {{ !$loop->first && !$loop->last ? 'border-t border-b border-gray-200' : '' }} {{ $loop->even ? 'border-r border-gray-200' : '' }} {{ $loop->odd ? 'border-r border-gray-200' : '' }}"
                            >
                                {!! $action->caption !!}
                            </a>
                        @endif
                    @endif
                @endforeach
            </div>
        </td>
    @endif
</div>
