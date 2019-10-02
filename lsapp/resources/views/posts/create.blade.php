@extends('layouts.app')
@section('content')
    <h3>List Create</h3>
    {!! Form::open(['action'=> 'UserController@store','method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['placeholder'=>'Title','class'=>'form-control'])}}
        </div>
        <div class="form-group">
                {{Form::label('body','Body')}}
                {{Form::textarea('body','',['placeholder'=>'Body','class'=>'form-control'])}}
            </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection