@if (session()->has('errors'))
    <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        @foreach (session()->get('errors') as $error)
            <li><strong>{{$error}}</strong></li>
        @endforeach
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            <li><strong>{!! session()->get('error') !!}</strong></li>
    </div>
@endif