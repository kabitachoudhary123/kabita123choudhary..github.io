@extends('layouts.app')
@section('content')
    <h3>List Edit</h3>
    {!! Form::open(['action'=> ['UserController@update',$post->id],'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$post->title,['placeholder'=>'Title','class'=>'form-control'])}}
        </div>
        <div class="form-group">
                {{Form::label('body','Body')}}
                {{Form::textarea('body',$post->body,['placeholder'=>'Body','class'=>'form-control'])}}
            </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection