@props([
    'action' => '{{URL::current()}}',
    'method' => null,
    'button' => 'svg-send',
    'buttonClass' => '',
    'formClass' => '',
    'buttonClassChiled' => '',
    'id' => ''
])
<form action="{{$action}}" method="POST" class="{{$formClass}}" enctype="multipart/form-data" id="{{$id}}">
    @csrf
    @if ($method)
        @method($method)
    @endif
    {{$slot}}
    <button type="submit" class="{{$buttonClass}} mx-auto">
        @component("components.$button" , ['class' => $buttonClassChiled])
        @endcomponent
    </button>
</form>

