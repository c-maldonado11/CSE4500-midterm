@extends('adminlte::page')

@section('title', 'Purchases')

@section('content_header')
    <h1>Header</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
  <a href="{{ route('purchases.create') }} " class="btn btn-primary"> Create </a>

    <table id="table" class="table table-bordered">
      <thead>
        <tr>
         <th style="width: 15px">Invoice #</th> <th>Price</th> <th>Purchase Date</th>
        </tr>
      <tbody>

      @foreach($purchases AS $purchases)
        <tr>
          <td>
          <a href="{{ url('purchases/' . $purchases->id) }} ">  {{ $purchases->id }} </a>
          </td>
          <td>{{ $purchases->invoice }}</td>
          <td>{{ $purchases->price }}</td>
          <td>{{ $purchases->purchase_date }}</td>
          <td><a href="{{url('delete/'.$purchases->id) }}" class="btn btn-danger"> Delete </a></td>
        </tr>
      @endforeach

      </tbody>
    </table>
  </div>
</div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@stop