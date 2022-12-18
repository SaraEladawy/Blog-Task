@extends('layouts.app')
@section('content')
    <div class="container">

        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-6">
                <a class="btn btn-info m-1" href="{{ route("posts.index") }}">
                    Posts List
                </a>
                @permission('comments-store')
                <a class="btn btn-success" href="{{ route("posts.comments.create",  $post->id) }}">
                   Add Comment  :{{  $post->title }}
                </a>
                @endpermission
            </div>
            <div class="col-lg-6">

            </div>
        </div>

    <div class="card">
        <div class="card-header">
            {{ $post->title }} : Comments
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">#</th>
                        <th>Comment</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($post->comments)
                        @foreach($post->comments as $key => $comment)
                        <tr data-entry-id="{{ $comment->id }}">
                            <td>
                                {{ $comment->id }}
                            </td>
                            <td>
                                {{ $comment->content ?? '' }}
                            </td>
                            <td>
                                @permission('comments-update')
                                    @if($comment->user_id == auth()->id())
                                        <a class="btn btn-xs btn-info m-1" href="{{ route('posts.comments.edit',[$comment->post_id, $comment->id]) }}">
                                            Edit
                                        </a>
                                   @endif
                                @endpermission
                                @permission('comments-delete')
                                    @if($comment->user_id == auth()->id())
                                        <form action="{{ route('posts.comments.destroy',[$comment->post_id, $comment->id]) }}" method="POST" onsubmit="return confirm('Are You Sure You Want to Delete Comment');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                        </form>
                                    @endif
                                @endpermission
                            </td>

                        </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
