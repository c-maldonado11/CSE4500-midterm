@extends('adminlte::page')

@section('title', 'Hardware')

@section('content_header')
    <h1>Hardware</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <table id="table" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th><th>Name</th><th>Manufacturer</th><th>Category</th><th>Price</th><th>Ram</th><th>Processor Speed</th><th style="width: 40px">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($hardware AS $hardware)
        <tr>
          <td>{{ $hardware->id }}</td>
          <td>{{ $hardware->name }}</td>
          <td>{{ $hardware->manufacturer->name }}</td>
          <td>{{ $hardware->category }}</td>
          <td>{{ $hardware->price }}</td>
          <td>{{ $hardware->ram }}</td>
          <td>{{ $hardware->ghz }}</td>
          <td><a class="btn btn-default btn-sm" href="{{ route('hardware.show',['hardware'=>$hardware->id]) }}">View</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<a href="{{ route('hardware.create') }} " class="btn btn-primary" >Create</a>
@stop