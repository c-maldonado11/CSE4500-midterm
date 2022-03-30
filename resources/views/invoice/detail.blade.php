@extends('adminlte::page')

@section('title', 'invoice')

@section('content_header')
    <h1>invoice</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <div>
        <div class="h1">
            {{ $invoice->fullname }}
        </div>
        <dl class="row">
            <dt class="col-sm-3">ID #</dt>
            <dd class="col-sm-9">{{ $invoice->id }}</dd>
            <dt class="col-sm-3">Sales Email</dt>
            <dd class="col-sm-9">{{ $invoice->sales_email }}</dd>
            <dt class="col-sm-3">Sales Phone #</dt>
            <dd class="col-sm-9">{{ $invoice->sales_phone }}</dd>
            <dt class="col-sm-3">Tech Email</dt>
            <dd class="col-sm-9">{{ $invoice->tech_email }}</dd>
            <dt class="col-sm-3">Tech Phone #</dt>
            <dd class="col-sm-9">{{ $invoice->tech_phone}}</dd>
        </dl>
    </div>
    <span style="float:right;">
        <a href="{{ route('invoice.create') }} " class="btn btn-warning">Update</a>
        <a href="{{ route('invoice.destroy',['invoice'=>$invoice->id]) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('submit-form').submit();">
        Delete</a>
        <form id="submit-form" action="{{ route('invoice.destroy',['invoice'=>$invoice->id]) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </span>
  </div>
</div>
@stop