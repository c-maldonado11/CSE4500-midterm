@extends('adminlte::page')

@section('title', 'invoice')

@section('content_header')
    <h1>invc</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <table id="table" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">ID #</th><th>Invoice #</th><th>Name</th><th>Purchase Date</th><th>Tech Email</th><th>Tech Phone #</th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($invoice AS $invoice)
        <tr>
          <td>{{ $invoice->id }}</td>
          <td>{{ $invoice->customer_id }}</td>
          <td>{{ $invoice->purchase_date }}</td>
          <td>{{ $invoice->customer->name }}</td>

          <td><a class="btn btn-default btn-sm" href="{{ route('invoice.show',['invoice'=>$invoice->id]) }}">View</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<a href="{{ route('invoice.create') }} " class="btn btn-primary" >Create</a>
@stop