use App\User;

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="card card-default list-group">
                <div class="card-header"><h1>Dashboard</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <a class="btn btn-primary" href="posts/create">Create List</a>
                  
                   @if(count($posts)>0)
                   <h3>Your TODO Lists</h3>
                   <table class="table table-stripped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/lsapp/public/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></th>
                                <td>
                                    {!! Form :: open(['action'=>['UserController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                    {!! Form::close()!!}    
                                <td>
                            </tr>
                        @endforeach

                   </table>
                   @else
                        <h3>You have no list</h3>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
