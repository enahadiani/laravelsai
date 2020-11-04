<label for="{{ $id }}">{{ $label }}</label>
<input class="form-control {{ $class }}" type="{{ $tipe }}"  id="{{ $id }}" name="{{ $name }}" {{ $attr }}  value="{{ $value }}">
@if(isset($icon))
    <i style="font-size: 18px;position: absolute;top: 35px;right: 25px;" class="{{ $icon['class'] }} date-search"></i>
@endif