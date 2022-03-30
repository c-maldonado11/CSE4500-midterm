@extends('adminlte::page')

@section('title', 'hardwares')

@section('content_header')
    <h1>hardware</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <div>
        <div class="h1">
            {{ $hardware->fullname }}
        </div>
        <dl class="row">
            <dt class="col-sm-3">ID #</dt>
            <dd class="col-sm-9">{{ $hardware->id }}</dd>
            <dt class="col-sm-3">Name</dt>
            <dd class="col-sm-9">{{ $hardware->name }}</dd>
            <dt class="col-sm-3">Manufacturer</dt>
            <dd class="col-sm-9">{{ $hardware->manufacturer->name }}</dd>
            <dt class="col-sm-3">Category</dt>
            <dd class="col-sm-9">{{ $hardware->category }}</dd>
            <dt class="col-sm-3">Price</dt>
            <dd class="col-sm-9">{{ $hardware->price }}</dd>
            <dt class="col-sm-3">Ram Size and Processor Speed</dt>
            <dd class="col-sm-9">{{ $hardware->ram}} GB {{ $hardware->ghz }} Ghz</dd>
        </dl>
    </div>
    <span style="float:right;">
        <a href="{{ route('hardware.create') }} " class="btn btn-warning">Update</a>
        <a href="{{ route('hardware.destroy',['hardware'=>$hardware->id]) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('submit-form').submit();">
        Delete</a>
        <form id="submit-form" action="{{ route('hardware.destroy',['hardware'=>$hardware->id]) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </span>
  </div>
</div>
@stop