@if ($errors->any())
    <div class="alert alert-danger">
        <a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('success'))
    {{--<div class="alert alert-success">--}}
        {{--<p>{{Session::get('success')}}</p>--}}
    {{--</div>--}}
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> {{Session::get('success')}}
    </div>
    @endif
@if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong> {{Session::get('error')}}
    </div>
@endif