@extends('app')

@section('content')

    <h1>Edit: {!! $article->title !!}</h1>


    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}

    <div class="form-group">

        {!! Form::label('title', 'Title:') !!}

        {!! Form::text('title', null, ['class' => 'form-control']) !!}

    </div>

    <div class="form-group">

        {!! Form::label('body', 'Body:') !!}

        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

    </div>

    <div class="form-group">

        {!! Form::submit('Update Article', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    <div class="form-group">

        {!! Form::label('published_at', 'Published On:') !!}

        {!! Form::input('date', 'published_at', date('m/d/Y'), ['class' => 'form-control']) !!}

    </div>



    {!! Form::close() !!}


    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@stop