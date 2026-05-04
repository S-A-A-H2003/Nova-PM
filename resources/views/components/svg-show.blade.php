@props([
    'width' => '28',
    'height' => '28',
    'class' => '',
])

<svg xmlns="http://www.w3.org/2000/svg" class="{{$class." hover:stroke-violet-400 fill-none cursor-pointer hover:scale-125"}}" width="{{$width}}" height="{{$height}}" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/>
  <circle cx="12" cy="12" r="3"/>
</svg>

