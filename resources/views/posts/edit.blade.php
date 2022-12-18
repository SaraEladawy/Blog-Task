@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::model($post,['method' => 'PATCH', 'files' => true, 'url' => route('posts.update', $post->id)]) !!}
        @include('posts._form')
        {!! Form::close() !!}
    </div>
@endsection
