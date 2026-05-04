@props([
    'width' => '28',
    'height' => '28',
    'class' => '',
])
<svg xmlns="http://www.w3.org/2000/svg" class="{{$class." hover:stroke-violet-400 fill-none cursor-pointer hover:scale-125"}}" width="{{$width}}" height="{{$height}}" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <rect x="9" y="9" width="13" height="13" rx="2" ry="2"/>
  <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
</svg>
