@extends('layouts.app')
@section('content')
    <a href="/posts" class="btn btn-default">Go back</a>
    <h1>{{$post->title}}</h1>
    <img src="/storage/cover_images/{{ $post->cover_image }}">
    <br><br>
    <div>
        {!! $post->body !!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{ $post->user->name }}</small>
    @if (!Auth::guest() && Auth::user()->id == $post->user_id)
        <hr>
        <a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit</a>

        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
        {!! Form::close() !!}        
    @endif
@endsection