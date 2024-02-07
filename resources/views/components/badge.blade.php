@props(['type' => 'occupied'])

@php
$typeColors = [
    'occupied' => 'red',
    'rentit' => 'orange',
    'vacant' => 'green',
    'pending' => 'amber',
    'ended' => 'sky',
    'ongoing' => 'teal',
    'pay' => 'lime',
    'yes' => 'green',
    'no' => 'amber',
];

$color = $typeColors[$type] ?? 'gray';
@endphp

<span class="px-2 py-1 font-semibold leading-tight text-{{ $color }}-700 bg-{{ $color }}-100 rounded-full dark:bg-{{ $color }}-500 dark:text-{{ $color }}-100 uppercase">
    {{ $slot }}
</span>