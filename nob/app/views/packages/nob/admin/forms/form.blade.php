@extends('admin::commons.layout')
@section('content')
        @include('admin::forms.commons.title')

        @include('admin::forms.form.layout')

@stop
@section('mscript')
@include('admin::forms.commons.mscripts')

@yield('moduleIconsScript')
@yield('moduleListScript')
@yield('modulePointsScript')
@yield('moduleFontawesomeScript')
@yield('moduleDataLoaderScript')
@yield('moduleMapsScript')
@yield('moduleTreeScript')
@stop
@section('script')
@include('admin::forms.commons.scripts')

@yield('relationScript')
@stop
@section('style')
@include('admin::forms.commons.styles')

@yield('moduleIconsStyle')
@yield('modulePointsStyle')
@yield('moduleFontawesomeStyle')
@yield('moduleMapsStyle')
@stop