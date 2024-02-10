@props(['type' => 'occupied'])

@php
$typeColors = [
    'occupied' => 'red',
    'rentit' => 'amber',
    'vacant' => 'green',
    'pending' => 'amber',
    'ended' => 'sky',
    'ongoing' => 'teal',
    'pay' => 'lime',
    'yes' => 'green',
    'active' => 'green',
    'inactive' => 'red',
    'no' => 'amber',
];

$color = $typeColors[$type] ?? 'gray';
@endphp

<span {{ $attributes->merge(['class' => 'text-center px-2 py-1 font-semibold leading-tight text-'.$color.'-700 bg-'.$color.'-100 rounded-full dark:bg-'.$color.'-700 dark:text-'.$color.'-100 uppercase']) }}>
    {{ $slot }}
</span>