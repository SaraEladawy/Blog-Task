@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::open(['method' => 'POST','files' => true, 'route' => ['posts.store']]) !!}
        @include('posts._form')
        {!! Form::close() !!}
    </div>
@endsection
