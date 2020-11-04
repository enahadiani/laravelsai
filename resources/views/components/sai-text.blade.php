<label for="{{ $id }}">{{ $label }}</label>
<textarea class="form-control {{ $class }}" id="{{ $id }}" name="{{ $name }}" {{ $attr }}  value="{{ $value }}"></textarea>
@if(isset($icon))
    <i style="font-size: 18px;position: absolute;top: 35px;right: 25px;" class="{{ $icon['class'] }} date-search"></i>
@endif
