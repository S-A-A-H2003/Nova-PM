@props([
    'width' => '28',
    'height' => '28',
    'class' => '',
])

<svg  xmlns="http://www.w3.org/2000/svg" class="{{$class." hover:stroke-violet-400 fill-none cursor-pointer hover:scale-125"}}" width="{{$width}}" height="{{$height}}" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/>
  <polyline points="16 6 12 2 8 6"/>
  <line x1="12" y1="2" x2="12" y2="15"/>
</svg>
