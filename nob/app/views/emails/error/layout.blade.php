@extends('emails.commons.layout')
@section('content')
<table width="100%" cellspacing="2" cellpadding="2" style="border: 1px solid #ccc;">
    <thead>
        <tr>
            <th>Class</th>
            <th>File</th>
            <th>Function</th>
            <th>Line</th>
        </tr>
    </thead>
    <tbody>
@foreach($trace as $i => $e)
        <tr bgcolor="{{ ($i%2 == 0 || $i == 0) ? '#ffffff':'#f1f1f1' }}">
            <td>{{ $e['class'] }}</td>
            <td>{{ $e['file'] }}</td>
            <td>{{ $e['function'] }}</td>
            <td align="right">{{ $e['line'] }}</td>
        </tr>
@endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="5">Message: {{ $msg }}</td>
        </tr>
        <tr>
            <td colspan="5">Url: {{ $url }}</td>
        </tr>
        <tr>
            <td colspan="5">Method: {{ $method }}</td>
        </tr>
        <tr>
            <td colspan="5">Format: {{ $format }}</td>
        </tr>
    </tfoot>
</table>
@stop