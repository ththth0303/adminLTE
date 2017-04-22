@extends('admin.admin')
@section('title','Admin|profile')
@section('content')
	<div class="container">
      <h2>{{$admin['name']}}</h2>
      <h2>{{$admin['email']}}</h2>
      <h2>{{$admin['created_at']}}</h2>
  		<h2>{{$admin['updated_at']}}</h2>
	</div>
@stop