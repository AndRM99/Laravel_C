@extends('layouts.app')


@section('content')


    <h1>Create Post</h1>

    {!! Form::open(['method'=>'POST', 'route' => 'posts.store', 'enctype' => 'multipart/form-data']) !!}
    {{ csrf_field() }}

    <div clas="form-group">
        {!! Form::label('title', 'Title') !!}

        {!! Form::text('title', null, ['class'=>'form-control']) !!}

    </div>


    <!-- <div class="form-group">

    {!! Form::label('file', 'File') !!}
    {!! Form::file('file', ['class'=>'form-control']) !!}

    </div>-->

    <div clas="form-group">

    {!! Form::file('file', ['class'=>'form-control']) !!}

    </div> 



    <div clas="form-group">

        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}

    </div>

    {!! Form::close()!!}

    
    @if(count($errors)>0)

    <div class="alert alert-danger">

    <ul>

        @foreach($errors ->all() as $error)

        <li>
            {{$error}}
        </li>

        @endforeach

    </ul>

    </div>

@endif

@endsection