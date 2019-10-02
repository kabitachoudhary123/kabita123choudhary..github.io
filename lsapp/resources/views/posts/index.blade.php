@extends('layouts.app')
@section('content')
    <div class="todolist not-done"><h3>My TODO List</h3>
    

        <div class="row">
                {!! Form::open(['action'=> 'UserController@store','method'=>'POST']) !!}
                <div class="form-group">
                    {{Form::label('title','Title')}}
                    {{Form::text('title','',['placeholder'=>'Title','class'=>'form-control'])}}
                </div>
                <div class="form-group">
                        {{Form::label('body','Body')}}
                        {{Form::text('body','',['placeholder'=>'Body','class'=>'form-control'])}}
                    </div>
                {{Form::submit('Create',['class'=>'btn btn-primary right'])}}
            {!! Form::close() !!}
                <div class="col-md-6">
                    <div class="todolist not-done">
                     <h1>Todos</h1>
                            <ul id="sortable" class="list-unstyled ui-sortable">
                                    @foreach ($posts as $item)
                                    @if($item->Completed=="No")
                            <li class="ui-state-default">
                                <div display="block" class="well">
                                        <span><a href="/lsapp/public/posts/{{$item->id}}">{{$item->title}}</a></span>
                                        
                                        <a href="/lsapp/public/posts/{{$item->id}}/edit" class="btn btn-default" style="float:right">Edit</a>
                                        
                                       
                        {!! Form :: open(['action'=>['UserController@update',$item->id],'method'=>'POST','class'=>'pull-right'])!!}
                            {{ Form::hidden('title', $item->id) }}
                            {{ Form::hidden('body', $item->title) }}
                            {{ Form::hidden('completed', 'Yes') }}
                            {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Completed',['class'=>'btn btn-danger'])}}
                        {!! Form::close()!!}
                                </div></li>
                            @endif
                            @endforeach
                            
                        </ul>
                        @if(count($posts)<=0) 
                        <div class="todo-footer">
                            <strong><span class="count-todos">0</span></strong> Items Left
                        </div>
                        @endif
                    </div>
                </div>
               
               
                <div class="col-md-6">
                    <div class="todolist">
                     <h1>Already Done</h1>
                        <ul id="done-items" class="list-unstyled ui-sortable">
                               
                                @foreach ($posts as $item)
                                @if($item->Completed=="Yes")
                                <li class="list-unstyled ui-sortable">
                                        <div class="well">{{$item->body}} 
                                {!! Form :: open(['action'=>['UserController@destroy',$item->id],'method'=>'POST','class'=>'pull-right'])!!}
                               
                                  
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                        {!! Form::close()!!}
                                </div>
                                </li>
                               
                                
                              
                           
                            @endif
                            @endforeach
                       
                        </ul>
                        @if(count($posts)<=0) 
                        <div class="todo-footer">
                            <strong><span class="count-todos">0</span></strong> Items to Show
                        </div>
                        @endif
                    </div>
                </div>
            </div>
           
        
        
            
      
        {{$posts->links()}}


   
    </div>

@endsection