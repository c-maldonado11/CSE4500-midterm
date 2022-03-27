@extends('adminlte::page')

@section('title', 'Hardware')

@section('content_header')
    <h1>More info</h1>
@stop

@section('content')
<table id="table" class="table table-bordered">
      <thead>
        <tr>
         <th>Invoice #</th> <th>Model</th> <th>Manufacturer</th> <th>Category</th> <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <tr>
          <td>
          </td>
          <td>{{ $hardware->model }}</td>
          <td>{{ $hardware->manufacturer }}</td>
          <td>{{ $hardware->category }}</td>
          <td>{{ $hardware->note }}</td>
        </tr>
        <a href="{{ route('hardware.edit', $hardware->id) }} " class="btn btn-primary"> Edit </a>

@stop