@extends('adminlte::page')

@section('title', 'Hardware')

@section('content_header')
    <h1>Header</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
  <a href="{{ route('hardware.create') }} " class="btn btn-primary"> Create </a>

    <table id="table" class="table table-bordered">
      <thead>
        <tr>
         <th style="width: 15px">Invoice #</th> <th>Name</th> <th>Email</th> <th>Specs</th> <th style="width: 30px">Manufacture</th> <th style="width: 50px">Category</th> <th style="width: 30px">Price</th> <th style="width: 50px">Purchase Date</th> <th>Action</th>
        </tr>
      </thead>
      <tbody>

      @foreach($hardware AS $hardware)
        <tr>
          <td>
          <a href="{{ url('hardware/' . $hardware->id) }} ">  {{ $hardware->id }} </a>
          </td>
          <td>{{ $hardware->model }}</td>
          <td>{{ $hardware->manufacturer }}</td>
          <td>{{ $hardware->category }}</td>
          <td>{{ $hardware->note }}</td>
          <td></td>
          <td></td>
          <td></td>
          <td><a href="{{url('delete/'.$hardware->id) }}" class="btn btn-danger"> Delete </a></td>
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