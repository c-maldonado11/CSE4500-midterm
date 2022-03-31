@extends('adminlte::page')

@section('title', 'Customers')

@section('content_header')
    <h1>Customer</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <div>
        <div class="h1">
            {{ $customer->fullname }}
        </div>
        <dl class="row">
          <dt class="col-sm-3">Email</dt>
          <dd class="col-sm-9">{{ $customer->email }}</dd>

          <dt class="col-sm-3">Phone Number</dt>
          <dd class="col-sm-9">{{ $customer->phonenumber }}</dd>
        </dl>
    </div>
    <span style="float:right; margin-bottom: 10px">
        <a href="{{ route('customer.edit', ['customer'=>$customer->id]) }} " class="btn btn-warning">Update</a>
        <a href="{{ route('customer.destroy',['customer'=>$customer->id]) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('submit-form').submit();">Delete</a>
        <form id="submit-form" action="{{ route('customer.destroy',['customer'=>$customer->id]) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </span>

    @if (is_null($customer->invoices))
    @else

    <table id="table" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">ID</th>
          <th>Items</th>
          <th>Total</th>
          <th>Purchase Date</th>
          <th style="width: 40px">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $customer->invoices->id }}</td>
          <td>{{ $customer->invoices->number_of_items() }}</td>
          <td>${{ $customer->invoices->total_price() }}</td>
          <td>{{ $customer->invoices->purchase_date }}</td>
        </tr>
      </tbody>
    </table>
  </div>
  @endif
      
</div>
@stop