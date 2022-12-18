@if(count($errors) > 0)
    <div class="container">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
        Fix this errors and try again
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    </div>
@endif

@if(session()->has('error'))
    <div class="container">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
        Oops! <a href="" class="alert-link">{{ session('error') }}</a>
    </div>
    </div>
@elseif(session()->has('success'))
    <div class="container">
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
        <a href="" class="alert-link">{{ session('success') }}</a>
    </div>
    </div>
@endif

