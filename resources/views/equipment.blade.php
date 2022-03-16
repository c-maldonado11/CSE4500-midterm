@extends('adminlte::page')

@section('title', 'Equipment')

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