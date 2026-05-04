@props([
    'width' => '28',
    'height' => '28',
    'class' => '',
])
<svg xmlns="http://www.w3.org/2000/svg" class="{{$class." hover:stroke-violet-400 fill-none cursor-pointer hover:scale-125"}}" width="{{$width}}" height="{{$height}}" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
  <polyline points="7 10 12 15 17 10"/>
  <line x1="12" y1="15" x2="12" y2="3"/>
</svg>

