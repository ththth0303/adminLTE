@extends('admin.admin')
@section('title','Admin|create')
@section('content')
	<div class="container">
      @if (count($errors) > 0)
        <div>     
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach        
        </div>
      @endif
  		{!!Form::open(array('url'=>asset('admin/manager'),'enctype'=>'multipart/form-data')) !!}
      <table>
        <tr>
          <td>{!!Form::label('name','Name')!!}</td>
          <td>{!!Form::text('name',$value='',$attributes = array('class'=>'form-control'))!!}</td>
        </tr>
        <tr>
          <td>{!!Form::label('email','Email')!!}</td>
          <td>{!!Form::email('email',$value='',$attributes = array('class'=>'form-control'))!!}</td>
        </tr>
        <tr>
          <td>{!!Form::label('Sex')!!}</td>
          <td> Nam {!!Form::radio('sex', '1', true) !!}
               Nu   {!!Form::radio('sex', '0') !!}
               khac {!!Form::radio('sex', '2') !!}
          </td>
        </tr>
        <tr>
          <td>{!!Form::label('password', 'Password')!!}</td>
          <td>{!!Form::password('password',['class'=>'form-control'])!!}</td>
        </tr>
        <tr>
          <td>{!!Form::label('Avata')!!}</td>
          <td>{!!Form::file('avata')!!}</td>
        </tr>
        <tr>
          <td></td>
          <td>{!!Form::submit('Create',['class'=>'btn btn-success'])!!}</td>
        </tr>
        
      </table>
  		
  		{!!Form::close()!!}
	</div>
@stop
