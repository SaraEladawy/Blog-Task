@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::model($comment,['method' => 'PATCH', 'files' => true, 'url' => route('posts.comments.update',[$comment->post_id, $comment->id])]) !!}
        @include('comments._form')
        {!! Form::close() !!}
    </div>
@endsection
