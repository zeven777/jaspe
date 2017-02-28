@extends('emails.commons.layout')
@section('content')
        <p><strong>Nombre:</strong> {{ $cname }}</p>
        <p><strong>E-mail:</strong> {{ $cemail }}</p>
        <p><strong>Tel&eacute;fono:</strong> {{ $cphone }}</p>
        <p><strong>Ciudad:</strong> {{ $ccity }}</p>
        <p>&nbsp;</p>
        <p><strong>Mensaje:</strong> {{ $cmessage }}</p>
@stop