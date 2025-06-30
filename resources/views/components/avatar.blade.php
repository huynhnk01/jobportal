@props(['avatarUrl'])

<img src="{{ $avatarUrl }}" {{ $attributes->merge(['class' => 'rounded-full']) }} alt="Avatar" />
