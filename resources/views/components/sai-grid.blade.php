@php
$cls = (isset($class) ? $class : 'table table-bordered table-condensed gridexample table-grid' );
@endphp
<table class="{{ $cls }}" id="{{ $id }}">
    <thead style="background:#F8F8F8">
        <tr>
            @for($i=0; $i < count($thead); $i++ )
            <th style="width:{{ $thwidth[$i] }}%; text-align:center;">{{ $thead[$i] }}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>