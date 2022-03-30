@extends('adminlte::page')

@section('title', 'Add Purchase Info')

@section('content_header')
    <h1>Add Purchase Info</h1>
@stop

@section('content')
<form method="post" action="{{ route('purchases.store') }}" >
    @csrf
    <td>
        <select name="hardware_id" id="hardware_id" class="form-control">
    @foreach ($hardware as $hardware)
            <option value="{{ $hardware-> id }}">{{ $hardware-> id}}</option>
    @endforeach
    </select>
    </td>
    <x-adminlte-input name="invoice" label="Invoice" />
    <x-adminlte-input name="price" label="Price $:" />
    <x-adminlte-input name="purchase_date" type="datetime-local" label="Purchase Date" />
    <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop