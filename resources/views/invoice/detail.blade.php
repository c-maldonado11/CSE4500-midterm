@extends('adminlte::page')

@section('title', 'Invoice')

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content_header')
    <h1>Invoice</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <div>
        <div class="h1">
            Invoice ID: {{ $invoice->id }}
        </div>
        <dl class="row">
          <dt class="col-sm-3">Customer Name:</dt>
          <dd class="col-sm-9">{{ $invoice->customer->fullname }}</dd>

          <dt class="col-sm-3">Purchase Date:</dt>
          <dd class="col-sm-9">{{ $invoice->purchase_date }}</dd>

          <dt class="col-sm-3">Total Items:</dt>
          <dd class="col-sm-9">{{ $invoice->number_of_items() }}</dd>

          <dt class="col-sm-3">Total Cost:</dt>
          <dd class="col-sm-9">${{ $invoice->total_price() }}</dd>
        </dl>
    </div>
    <span style="float:right; margin-bottom:10px;">
        <a href="{{ route('invoice.edit', ['invoice'=>$invoice->id]) }} " class="btn btn-warning">Update</a>
        <a href="{{ route('invoice.destroy',['invoice'=>$invoice->id]) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('submit-form').submit();">
        Delete</a>

        <form id="submit-form" action="{{ route('invoice.destroy',['invoice'=>$invoice->id]) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </span>


    <table id="table" class="table table-bordered" style=" margin-bottom:10px;">
      <thead>
        <tr>
          <th style="width: 10px">ID</th>
          <th>Name</th>
          <th>Price</th>
          <th style="width: 150px">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($invoice->hardware AS $hardware)
        <tr>
            <td>{{ $hardware->id }}</td>
            <td>{{ $hardware->name }}</td>
            <td>${{ $hardware->price }}</td>
            <td>
                <span>
                <a class="btn btn-default btn-sm" href="{{ route('hardware.show',['hardware'=>$hardware->id]) }}">View</a>
                <a class="btn btn-danger btn-sm" onclick="deleteItem( {!! $hardware->id !!}  )">Delete</a>
                </span>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="input-group mb-3">
        <input type="number" class="form-control" id="hardware-input" placeholder="Add item by ID" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="button" onclick="addItem()">Submit</button>
    </div>

    <div class="card">
  <div class="card-body">
    <table id="table" class="table table-bordered sortable">
      <thead>
        <tr>
          <th style="width: 10px">#</th><th style="width: 40px">Manufacturer</th><th style="width: 40px">Category</th>
          <th class="sorttable_nosort">Name</th>
          <h1>Available Hardware</h1>
        </tr>
      </thead>
      <tbody>
        @foreach($hardwares AS $hardwares)
        <tr>
          <td>{{ $hardwares->id }}</td>
          <td>{{ $hardwares->manufacturer->name }}</td>
          <td>{{ ucwords($hardwares->category) }}</td>
          <td>{{ $hardwares->name }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
  </div>
</div>
@stop

@section('js')
    <script>
    const addItem = () => {
        let element = document.getElementById("hardware-input").value;
        let invoiceID = "{!! $invoice->id !!}"
        fetch(`/invoice/${invoiceID}/${element}`, {
          method: 'POST',
          redirect: 'manual',
          headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).then(response => window.location.reload())
    }
    const deleteItem = (itemID) => {
        let invoiceID = "{!! $invoice->id !!}"
        fetch(`/invoice/${invoiceID}/${itemID}`, {
          method: 'DELETE',
          redirect: 'manual',
          headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).then(response => window.location.reload())
        console.log(itemID)
    }
    
    </script>
@stop