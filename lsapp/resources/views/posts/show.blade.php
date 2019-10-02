@extends('layouts.app')
@section('content')
    <a href="/lsapp/public/posts" class='btn btn-default'>Go Bbck</a>
    <h3>{{$post->title}}</h3>
    <div>
        {{$post->body}}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}} </small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id==$post->user_id)
    <a href="/lsapp/public/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
    {!! Form :: open(['action'=>['UserController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    {!! Form::close()!!}
    @endif
    @endif
@endsection