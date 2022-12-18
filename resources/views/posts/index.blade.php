@extends('layouts.app')
@section('content')
    <div class="container">
    @permission('posts-store')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("posts.create") }}">
                   Add Post
                </a>
            </div>
        </div>
    @endpermission
    <div class="card">
        <div class="card-header">
            Posts
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $key => $post)
                        <tr data-entry-id="{{ $post->id }}">
                            <td>
                                {{ $post->id }}
                            </td>
                            <td>
                                {{ $post->title ?? '' }}
                            </td>
                            <td>
                                {{ $post->content ?? '' }}
                            </td>
                            <td>
                                @permission('comments-index')
                                <a class="btn btn-xs btn-success" href="{{ route('posts.comments.index', $post->id) }}">
                                    Comments
                                </a>
                                @endpermission
                                @permission('posts-update')
                                    <a class="btn btn-xs btn-info  m-2" href="{{ route('posts.edit', $post->id) }}">
                                        Edit
                                    </a>
                                @endpermission

                                @permission('posts-delete')
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are You Sure You Want to Delete Post');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                @endpermission

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
