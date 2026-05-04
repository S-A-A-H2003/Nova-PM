@props([
    'width' => '80',
    'height' => '80',
    'class' => '',
])

<svg class="{{$class}}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="{{$width}}" height="{{$height}}">
    <!-- Background circle -->
    <circle cx="50" cy="50" r="48" fill="#7c3aed"/>

    <!-- Letter M -->
    <path d="M30 65 L30 40 L42 55 L54 40 L54 65" stroke="white" stroke-width="6" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
    <!-- Lower part of M -->
    <path d="M30 65 L42 50 L54 65" stroke="white" stroke-width="5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>

    <!-- Small decorative element -->
    <circle cx="70" cy="30" r="8" fill="white" opacity="0.3"/>
</svg>
