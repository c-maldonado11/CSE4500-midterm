@extends('adminlte::page')

@section('title', 'Manufacturer Details')

@section('content_header')
    <h1>Manufacturer Details</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <div>
        <div class="h1">
            {{ $manufacturer->fullname }}
        </div>
        <dl class="row">
        <dt class="col-sm-3">ID #</dt>
        <dd class="col-sm-9">{{ $manufacturer->id }}</dd>
        <dt class="col-sm-3">Sales Email</dt>
        <dd class="col-sm-9">{{ $manufacturer->sales_email }}</dd>
        <dt class="col-sm-3">Sales Phone #</dt>
        <dd class="col-sm-9">{{ $manufacturer->sales_phone }}</dd>
        <dt class="col-sm-3">Tech Email</dt>
      <dd class="col-sm-9">{{ $manufacturer->tech_email }}</dd>
     <dt class="col-sm-3">Tech Phone #</dt>
     <dd class="col-sm-9">{{ $manufacturer->tech_phone}}</dd>
        </dl>
    </div>
    <span style="float:right;">
        <a href="{{ route('manufacturer.create') }} " class="btn btn-warning">Update</a>
        <a href="{{ route('manufacturer.destroy',['manufacturer'=>$manufacturer->id]) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('submit-form').submit();">
        Delete</a>
        <form id="submit-form" action="{{ route('manufacturer.destroy',['manufacturer'=>$manufacturer->id]) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </span>
  </div>
</div>
@stop