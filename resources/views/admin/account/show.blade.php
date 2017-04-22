@extends('admin.admin')
@section('title','Admin|detail account')
@section('content')
<div class="container">
	<h2>Account detail</h2>          
	<h3>{{ $use->id }}</h3>
	<h3>{{ $use->name }}</h3>
	<h3>{{ $use->email }}</h3>
</div>
@stop