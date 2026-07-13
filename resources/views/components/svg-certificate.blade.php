@props([
    'width' => '28',
    'height' => '28',
    'class' => '',
])
<svg xmlns="http://www.w3.org/2000/svg" class="{{$class." hover:stroke-violet-400 fill-none cursor-pointer hover:scale-125"}}" width="{{$width}}" height="{{$height}}" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <path d="M20 14v4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-4"/>
  <path d="M20 10V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v4"/>
  <circle cx="12" cy="10" r="3"/>
  <path d="M12 13v5l2-2 2 2v-5"/>
</svg>

