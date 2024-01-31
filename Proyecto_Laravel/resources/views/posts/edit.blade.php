@extends('layouts.app')



@section('content')


    {!! Form::model($post, ['method'=>'PATCH', 'route' => ['posts.update', $post->id], 'enctype' => 'multipart/form-data']) !!}


    {{ csrf_field() }}

    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}


    {!! Form::submit('Update Post', ['class'=>'btn btn-info']) !!}

    {!! Form::close()!!}




    {!! Form::open(['method'=>'DELETE', 'route' => ['posts.destroy', $post->id], 'enctype' => 'multipart/form-data']) !!}
    {{ csrf_field() }}

    {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}



    {!! Form::close()!!}


@yield('footer')