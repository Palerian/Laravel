@props(['user' => null, 'size' => 'md'])

@php
    $user = $user ?? Auth::user();
    $sizes = [
        'sm' => 'h-7 w-7 text-[10px]',
        'md' => 'h-9 w-9 text-xs',
        'lg' => 'h-12 w-12 text-sm',
        'xl' => 'h-16 w-16 text-base',
    ];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $initials = $user?->initials() ?? 'MZ';
@endphp

<div {{ $attributes->merge(['class' => $sizeClass . ' rounded-full bg-purple-700 text-white font-bold inline-flex items-center justify-center select-none shadow-sm']) }}>
    <span>{{ $initials }}</span>
</div>
