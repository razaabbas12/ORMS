@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @if(Auth::user()->type=='customer')
    <a href="{{ route('manage-order',5) }}"><button class="btn btn-success">Manage Order</button></a>
    @elseif(Auth::user()->type=='tailor')
	<a href="/orders"><button class="btn btn-success">Manage Orders</button></a>
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop