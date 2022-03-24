@extends('adminlte::page')

@section('title', 'Hardware')

@section('content_header')
    <h1>Header</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <table id="table" class="table table-bordered">
      <thead>
        <tr>
         <th style="width: 15px">Invoice #</th> <th>Name</th> <th>Email</th> <th>Specs</th> <th style="width: 30px">Manufacture</th> <th style="width: 50px">Category</th> <th style="width: 30px">Price</th> <th style="width: 50px">Purchase Date</th> <th>Notes</th>
        </tr>
      </thead>
      <tbody>

      @foreach($hardware AS $hardware)
        <tr>
          <td>{{ $hardware->id }}</td>
          <td>{{ $hardware->model }}</td>
          <td>{{ $hardware->manufacturer }}</td>
          <td>{{ $hardware->category }}</td>
          <td>{{ $hardware->note }}</td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>
<a href="{{ route('hardware.create') }} " class="btn btn-primary" >Create</a>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@stop