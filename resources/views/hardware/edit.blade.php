@extends('adminlte::page')

@section('title', 'Edit Hardware')

@section('content_header')
    <h1>Edit Hardware</h1>
@stop

@section('content')
<form method="post" action="{{ route('hardware.update', $hardware->id) }}" >
    @csrf
    @method('PUT')
    <label>Model </label>
    <input name="model" value= "{{$hardware-> model}}" label="Model" />
    <br>
    <label>Manufacturer </label>
    <input name="manufacturer" value= "{{$hardware-> manufacturer}}" label="Manufacturer" />
    <br>
    <label>Category </label>
    <input name="category" value= "{{$hardware-> category}}" label="Category" />
    <br>
    <label>Note </label>
    <input name="note" value= "{{$hardware-> note}}" label="Note" />
    <br>
    <x-adminlte-button type="Update" label="Update" />
</form>
@stop