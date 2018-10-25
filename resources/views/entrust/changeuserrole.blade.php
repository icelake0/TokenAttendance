@extends('layouts.app')

@section('content')
<?php $page_title='Change User Role'; ?>
<link href="{{asset('css/jquery.fancybox.min.css')}}" rel="stylesheet">
<div class="col-md-3 col-xs-0">
</div>
<div class="col-md-6 col-sm-12">
    <div class="white-box">
        <div class="user-bg"> <img width="100%" alt="user" src="{{$user->avatar}}">
            <div class="overlay-box">
                <div class="user-content">
                    <a href="javascript:void(0)"><img src="{{$user->avatar}}" class="thumb-lg img-circle" alt="img"></a>
                    <h4 class="text-white">{{$user->name}}</h4>
                    <h5 class="text-white">{{$user->email}}</h5> </div>
            </div>
        </div>
        <div class="user-btm-box">
             <div class="row">
            <div class="col-sm-12 col-xs-12">
                <form method="post" action="{{route('webauth.changeuserrole')}}">
                  {{ csrf_field() }}
                    <div class="form-group">
                      <input type='hidden' name='user_id', value='{{$user->id}}'>
                      <label for="exampleFormControlSelect1">Select A Role</label>
                      <select class="form-control" id="selectClass" name='role_id' required>
                        <option>--Select One Role--</option>
                        @foreach($roles as $role)
                        <option value ='{{$role->id}}'>{{$role->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <button type="submit" class="btn btn-success">Change Role</button>
                    <a data-fancybox data-type="ajax" data-src="/profile/{{$user->id}}/partial" href="javascript:;" class="btn btn-primary btn-rounded waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-user"></i></span>User Profile</a>
                </form>
            </div>
        </div>
        </div>
    </div>

</div>
<div class="col-md-3 col-xs-0">
</div>
<script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('js/jquery.fancybox.min.js')}}"></script>
<script src="{{ asset('js/star-rating.min.js')}}" type="text/javascript"></script>
@endsection