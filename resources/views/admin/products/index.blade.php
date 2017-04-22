@extends('admin.admin')

@section('title', 'Admin|index')

@section('content')

<div class="container">
    <h2>Account list</h2>
    <h2><a href="{{asset('admin/manager/create')}}" class="btn btn-primary">Create new user</a></h2>

    {!! Form::open(array('url'=>asset('admin/manager'), 'method' => 'get')) !!}
    {!! Form::text('search',$value=null,$attributes = array('id'=> 'data'))!!}
    {!! Form::close()!!} 
    <button id="search">Search</button>
    <div id="form">{!!Form::open(array('url'=>asset('admin/manager'),'method'=>'get')) !!}   
    {!! Form::hidden('token',csrf_token(),array('id' => 'token')) !!}
    {!! Form::close()!!} </div>

    @if (session()->has('status'))
        <h3><p class="alert alert-success">{{session()->get('status') }}</p></h3>
    @endif

    <div class="" id="list-acc">

      @include('admin.products.search')

    </div>
    <div id="result" class="container">{{ print_r(session()->all()) }}</div>
</div>
{{-- {{ $account->links() }} --}}

@stop
