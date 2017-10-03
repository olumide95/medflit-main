@extends('layouts.auth')
@section('title', $title)
@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center"><h2 class="text-uppercase clear-bottom clear-top">Patient registration</h2></div>
        @if (Session::has('reg-success'))
            <div class="col-md-8 col-md-offset-2 text-center alert alert-info">{{ Session::get('reg-success') }}</div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
                <nav class="nav nav-pills nav-justified clear-bottom">
                    <a class="nav-item nav-link active text-uppercase" href="#">Sign up</a>
                    <a class="nav-item nav-link secondary disabled text-uppercase" href="{{ url('/login') }}">Sign in</a>
                </nav>
            </div>      
                    <form class="form-horizontal col-md-10" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        @foreach ($errors as $error)
                            <p>{{ $error }}</p>
                        @endforeach

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="control-label">First Name</label>
                            <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
                            @if ($errors->has('firstname'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('firstname') }}
                                    </small>
                                @endif
                        </div>
                        
						<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="control-label">Last Name</label>
                            <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
                            @if ($errors->has('lastname'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('lastname') }}
                                    </small>
                                @endif
                        </div>
                        
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="control-label">Username</label>
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">
                            @if ($errors->has('username'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('username') }}
                                    </small>
                                @endif
                        </div>
						
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('email') }}
                                    </small>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('password') }}
                                    </small>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirmation" class="control-label">Confirm Password</label>
                            <input id="password-confirmation" type="password" class="form-control" name="password_confirmation" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('password_confirmation') }}
                                    </small>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="control-label">Phone</label>
                            <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('phone') }}
                                    </small>
                                @endif
                        </div>						
						
						
						<div class="form-group{{ $errors->has('tos') ? ' has-error' : '' }}">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="tos"> I have read the terms and conditions and I hereby agree.
                                </label>
                            </div>
                            @if ($errors->has('tos'))
                                <small class="help-block form-text">
                                    {{ $errors->first('tos') }}
                                </small>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="hidden" name="usertype" value="2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>

                       
                    </form>
                
        </div>
        <div class="col-md-6">
            <div class="card clear-bottom">
                <div class="card-body">
                    <h4 class="card-title text-center text-uppercase">Welcome to Medflit</h4>
                    <p class="card-text">Medflit is a convenient and  affordable option that allows you to talk to a board-certified physician by phone or video.</p>
                </div>
            </div>
            <div class="card clear-bottom text-center">
                <div class="card-body">
                    <h5 class="card-title text-uppercase clear-bottom">Are you a doctor or pharmacist</h5>                    
                    <a href="{{ url('/provider/register') }}" class="btn btn-primary text-uppercase">Register as a doctor</a>
                    <a href="{{ url('/pharmacy/register') }}" class="btn btn-primary text-uppercase">Register your pharmacy</a>
                    <p class="clear-top"><a href="#" class="btn btn-link-secondary"><i class="fa fa-btn fa-user"></i>Already registered? Sign in</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection