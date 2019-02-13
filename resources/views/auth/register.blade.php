@extends('layouts.auth')

@section('content')
                    <form class="form-horizontal form-material" method="POST" action="{{ route('register') }}">
                        @csrf
                      <a href="javascript:void(0)" class="text-center db"><img src="{{ asset('plugins/images/admin-logo-dark.png')}}" alt="Home" /><br/><span>{{env('APP_NAME')}}<span></a>   
                        <div class="form-group m-t-40">
                          <div class="col-xs-12">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Full Name">

                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                          </div>
                        </div>
                        <div class="form-group m-t-40">
                          <div class="col-xs-12">
                             <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                          </div>
                        </div>
                        <div class="form-group m-t-40">
                          <div class="col-xs-12">
                             <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="password">


                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                          </div>
                        </div>
                        <div class="form-group m-t-40">
                          <div class="col-xs-12">
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                          </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                          <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Register</button>
                          </div>
                        </div>
                        <div class="form-group m-b-0">
                          <div class="col-sm-12 text-center">
                            <p>Already have an account? <a href="/login" class="text-primary m-l-5"><b>Sign In</b></a></p>
                          </div>
                        </div>
                    </form>
@endsection
