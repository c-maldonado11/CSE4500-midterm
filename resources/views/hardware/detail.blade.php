@extends('adminlte::page')

@section('title', 'hardware')

@section('content_header')
    <h1>hardware</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <div>
        <div class="h1">
            {{ $hardware->name }}
        </div>
        <dl class="row">
            <dt class="col-sm-3">Price</dt>
            <dd class="col-sm-9">${{ $hardware->price }}</dd>

            <dt class="col-sm-3">Manufacturer</dt>
            <dd class="col-sm-9">
                <a href="{{ route('manufacturer.show',['manufacturer'=>$hardware->manufacturer->id]) }}">
                    {{ $hardware->manufacturer->name }}
                </a>
            </dd>

            <dt class="col-sm-3">Processor Speed (GHz)</dt>
            <dd class="col-sm-9">{{ $hardware->ghz }} Ghz</dd>

            <dt class="col-sm-3">Ram</dt>
            <dd class="col-sm-9">{{ $hardware->ram }}</dd>

            <dt class="col-sm-3">Category</dt>
            <dd class="col-sm-9">{{ ucwords($hardware->category) }}</dd>
        </dl>
    </div>
    <span style="float:right; margin-bottom: 10px;">
        <a href="{{ route('note.create')}}?hardware={{$hardware->id}} " class="btn btn-primary">Create Note</a>
        <a href="{{ route('hardware.edit', ['hardware'=>$hardware->id]) }} " class="btn btn-warning">Update</a>
        <a href="{{ route('hardware.destroy',['hardware'=>$hardware->id]) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('submit-form').submit();">
        Delete</a>

        <form id="submit-form" action="{{ route('hardware.destroy',['hardware'=>$hardware->id]) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </span>

    <table id="table" class="table table-bordered" style=" margin-bottom:10px;">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>Service</th>
          <th>Software</th>
          <th>Content</th>
          <th style="width: 150px">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($hardware->notes AS $note)
        <tr>
            <td>{{ $note->id }}</td>
            <td>{{ $note->service }}</td>
            <td>{{ $note->software }}</td>
            <td>{{ $note->content }}</td>

            <td>
                <span>
                <a class="btn btn-default btn-sm" href="{{ route('note.show',['note'=>$note->id]) }}">View</a>
                <a class="btn btn-danger btn-sm"  href="{{ route('note.destroy',['note'=>$note->id]) }}" onclick="event.preventDefault(); document.getElementById('note-submit-{!! $note->id !!}').submit();">Delete</a>


                <form id="note-submit-{{ $note->id }}" action="{{ route('note.destroy',['note'=>$note->id]) }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
                </span>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>


  </div>
</div>
@stop