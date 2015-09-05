@if (Session::has('message') && Session::has('status'))
    <div class="alert alert-{{ Session::get('status') }} alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        {!! Session::get('message') !!}
    </div>
@endif

@if (Session::has('message') )
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        {!! Session::get('message') !!}
    </div>
@endif

@if (Session::has('errors'))
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <ul>
            @foreach(Session::get('errors')->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif
