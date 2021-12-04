@props([
    'actions' => null,
    'theme' => null,
    'row' => null
])

@php

    $btnGroupFirst = 'cursor-pointer py-2 px-2 text-gray-500 dark:text-dark-typography bg-white dark:bg-dark-primary rounded-l-lg focus:shadow-outline hover:bg-gray-100 dark:hover:bg-dark-secondary border border-r-0 border-gray-300 dark:border-dark-third shadow-sm';
    $btnGroupLast = 'cursor-pointer py-2 px-2 text-gray-500 dark:text-dark-typography bg-white dark:bg-dark-primary rounded-r-lg focus:shadow-outline hover:bg-gray-100 dark:hover:bg-dark-secondary border border-l-0 border-gray-300 dark:border-dark-third shadow-sm';
    $btnGroupMiddle = 'cursor-pointer py-2 px-2 text-gray-500 dark:text-dark-typography bg-white dark:bg-dark-primary focus:shadow-outline hover:bg-gray-100 dark:hover:bg-dark-secondary border border-gray-300 dark:border-dark-third shadow-sm';

@endphp

<div class="w-full md:w-auto">
    @if(isset($actions) && count($actions) && $row !== '')

        <td class="pg-actions {{ $theme->table->tdBodyClass }}">

            <div class="inline-flex" role="group" aria-label="Button group">

            @foreach($actions as $action)

                @php
                    $parameters = [];
                    foreach ($action->param as $param => $value) {
                        if (!empty($row->{$value})) {
                            $parameters[$param] = $row->{$value};
                        } else {
                            $parameters[$param] = $value;
                        }
                    }
                @endphp

                @if($action->event !== '')

                    @if($loop->first)

                        <a wire:click='$emit("{{ $action->event }}", @json($parameters))'
                           class="{{ filled($action->class) ? $action->class : $btnGroupFirst }}">
                            {!! $action->caption !!}
                        </a>

                    @elseif($loop->last)

                        <a wire:click='$emit("{{ $action->event }}", @json($parameters))'
                           class="{{ filled($action->class) ? $action->class : $btnGroupLast }}">
                            {!! $action->caption !!}
                        </a>

                    @else

                        <a wire:click='$emit("{{ $action->event }}", @json($parameters))'
                           class="{{ filled($action->class) ? $action->class : $btnGroupMiddle }}">
                            {!! $action->caption !!}
                        </a>

                    @endif

                @elseif($action->view !== '')

                    @if($loop->first)

                        <a wire:click='$emit("openModal", "{{$action->view}}", @json($parameters))'
                           class="{{ filled($action->class) ? $action->class : $btnGroupFirst }}">
                            {!! $action->caption !!}
                        </a>

                    @elseif($loop->last)

                        <a wire:click='$emit("openModal", "{{$action->view}}", @json($parameters))'
                           class="{{ filled($action->class) ? $action->class : $btnGroupLast }}">
                            {!! $action->caption !!}
                        </a>

                    @else

                        <a wire:click='$emit("openModal", "{{$action->view}}", @json($parameters))'
                           class="{{ filled($action->class) ? $action->class : $btnGroupMiddle }}">
                            {!! $action->caption !!}
                        </a>

                    @endif

                @else

                    @if(strtolower($action->method) !== ('get'))
                        <form target="{{ $action->target }}"
                              action="{{ route($action->route, $parameters) }}"
                              method="{{ $action->method }}">
                            @method($action->method)
                            @csrf

                            @if($loop->first)

                                <button type="submit"
                                    class="{{ filled( $action->class) ? $action->class : $btnGroupFirst }}">
                                    {!! $action->caption ?? '' !!}
                                </button>

                            @elseif($loop->last)

                                <button type="submit"
                                    class="{{ filled( $action->class) ? $action->class : $btnGroupLast }}">
                                    {!! $action->caption ?? '' !!}
                                </button>

                            @else

                                <button type="submit"
                                    class="{{ filled( $action->class) ? $action->class : $btnGroupMiddle }}">
                                    {!! $action->caption ?? '' !!}
                                </button>

                            @endif

                        </form>
                    @else

                        @if($loop->first)

                            <a href="{{ route($action->route, $parameters) }}"
                                target="{{ $action->target }}"
                                class="{{ filled($action->class) ? $action->class : $btnGroupFirst }}">
                                {!! $action->caption !!}
                            </a>

                        @elseif($loop->last)

                            <a href="{{ route($action->route, $parameters) }}"
                                target="{{ $action->target }}"
                                class="{{ filled($action->class) ? $action->class : $btnGroupLast }}">
                                {!! $action->caption !!}
                            </a>

                        @else

                            <a href="{{ route($action->route, $parameters) }}"
                                target="{{ $action->target }}"
                                class="{{ filled($action->class) ? $action->class : $btnGroupMiddle }}">
                                {!! $action->caption !!}
                            </a>

                        @endif

                    @endif

                @endif

            @endforeach

            </div>

        </td>

    @endif
</div>
