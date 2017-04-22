@extends('admin.admin')
@section('title','Admin|edit')
@section('content')
	<div class="container">
     @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <p class="alert-danger">{{ $error }}</p>
            @endforeach

      @endif
  		{!!Form::open(array('url'=>asset('admin/manager/'.$use['id']),'method'=>'put')) !!}
      {!!Form::hidden('url', $use['url']) !!}
  		{!!Form::label('id','ID')!!}
  		{!!Form::number('id',$use['id'])!!}
  		{!!Form::label('name','Name')!!}
  		{!!Form::text('name',$value = $use['name'])!!}
  		{!!Form::label('email','Email')!!}
  		{!!Form::email('email',$use['email'])!!}
  		{!!Form::submit('Update')!!}
  		{!!Form::close()!!}
	</div>
@stop