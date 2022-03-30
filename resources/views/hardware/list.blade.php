@extends('adminlte::page')

@section('title', 'hardware')

@section('content_header')
    <h1>hardware</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <table id="table" class="table table-bordered sortable">
      <thead>
        <tr>
          <th style="width: 10px">#</th><th style="width: 40px">Manufacturer</th><th style="width: 40px">Category</th>
          <th class="sorttable_nosort">Name</th>

          <th style="width: 40px">Notes</th>
          <th style="width: 40px" class="sorttable_nosort">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($hardware AS $hardware)
        <tr>
          <td>{{ $hardware->id }}</td>
          <td>{{ $hardware->manufacturer->name }}</td>
          <td>{{ ucwords($hardware->category) }}</td>
          <td>{{ $hardware->name }}</td>
          <td>{{ $hardware->num_of_notes() }}</td>

          <td><a class="btn btn-default btn-sm" href="{{ route('hardware.show',['hardware'=>$hardware->id]) }}">View</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<a href="{{ route('hardware.create') }} " class="btn btn-primary" >Create</a>
@stop


@section('js')
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
@stop