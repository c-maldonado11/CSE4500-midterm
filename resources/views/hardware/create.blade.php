@extends('adminlte::page')

@section('title', 'Add Hardware')

@section('content_header')
    <h1>Add Hardware</h1>
@stop

@section('content')
<form method="post" action="{{ route('hardware.store') }}" >
    @csrf
    <x-adminlte-input name="model" label="Model" />
    <x-adminlte-input name="manufacturer" label="Manufacturer" />
    <x-adminlte-input name="category" label="Category" />
    <x-adminlte-input name="note" label="Note" />
    <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop