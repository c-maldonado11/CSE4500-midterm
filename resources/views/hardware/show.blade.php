@extends('adminlte::page')

@section('title', 'Hardware')

@section('content_header')
    <h1>Hardware</h1>
@stop

@section('content')
  <h2>{{ $hardware->model; }}</h2>
  <!-- <div><p>{{ $hardware->progress; }}% finished</p></div> -->
@stop