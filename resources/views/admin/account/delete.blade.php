@extends('admin.admin')
@section('content')
	<div class="container" >
  		{!!Form::open(array('url'=>asset('admin/manager/'.$use['id']),'method'=>'delete')) !!}
  		{!!Form::number('id',$use['id'])!!}
  		{!!Form::submit('Create')!!}
  		{!!Form::close()!!}
	</div>
@stop