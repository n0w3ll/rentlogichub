@props(['type' => 'occupied'])

@php
$typeColors = [
    'occupied' => 'red',
    'rentit' => 'orange',
    'vacant' => 'green',
    'pending' => 'amber',
    'ended' => 'sky',
    'ongoing' => 'teal'
];

$color = $typeColors[$type] ?? 'gray';
@endphp

<span class="ml-2 px-2 py-1 font-semibold leading-tight text-{{ $color }}-700 bg-{{ $color }}-100 rounded-full dark:bg-{{ $color }}-500 dark:text-{{ $color }}-100 uppercase">
    {{ $slot }}
</span>