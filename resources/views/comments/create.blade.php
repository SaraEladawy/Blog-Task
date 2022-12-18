@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::open(['method' => 'POST','files' => true, 'route' => ['posts.comments.store', $post->id]]) !!}
        @include('comments._form')
        {!! Form::close() !!}
    </div>
@endsection
