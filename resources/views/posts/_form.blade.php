<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Add Post') }}</div>

            <div class="card-body">
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Post Title') }}</label>

                    <div class="col-md-6">
                        {!! Form::text('title', null, ['class' => 'form-control' , 'required'] )!!}
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="content" class="col-md-4 col-form-label text-md-end">{{ __('Post Content') }}</label>

                    <div class="col-md-6">
                        {!! Form::textarea('content', null, ['class' => 'form-control' , 'required'] )!!}
                        @error('content')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save') }}
                        </button>
                        <a class="btn is-info" href="{{ route('posts.index') }}"> {{ __('Cancel') }} </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
