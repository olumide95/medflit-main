@extends('layouts.auth')
@section('title', 'Login Form')
@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-toggleable-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('public/assets/images/logo-coloured.png') }}" alt="Medflit logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                    <li><a class="nav-link" href="{{ url('/patient/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    </nav>

@endsection
@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center"><h2 class="text-uppercase clear-bottom clear-top">Login form</h2></div>
        @if (Session::has('reg-success'))
            <div class="col-md-8 col-md-offset-2 text-center alert alert-info">{{ Session::get('reg-success') }}</div>
        @endif
        @if ($errors->has('email'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('email') }}
                                    </small>
                                @endif
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
                <nav class="nav nav-pills nav-justified clear-bottom">
                    <a class="nav-item nav-link secondary disabled text-uppercase" href="{{ url('/patient/register') }}">Sign up</a>
                    <a class="nav-item nav-link active text-uppercase" href="#">Sign in</a>
                </nav>
            </div>      
                    <form class="form-horizontal col-md-10" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        @foreach ($errors->all() as $error)
                            <p class="error">{{ $error }}</p>
                        @endforeach
                        
						<div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                            <label for="login" class="control-label">Email, username or phone</label>
                            <input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}">
                            @if ($errors->has('login'))
                                    <small class="help-block form-text">
                                        {{-- $errors->first('login') --}}
                                    </small>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                                    <small class="help-block form-text">
                                        {{-- $errors->first('password') --}}
                                    </small>
                                @endif
                        </div>						
						
						<div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
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
                <div class="card-body register-option">
                    <h5 class="card-title text-uppercase clear-bottom">Are you a doctor or pharmacist</h5>                    
                    <a href="{{ url('/provider/register') }}" class="btn btn-primary text-uppercase">Register as a doctor</a>
                    <a href="{{ url('/pharmacy/register') }}" class="btn btn-primary text-uppercase">Register your pharmacy</a>
                    <a href="{{ url('/partner/register') }}" class="btn btn-primary text-uppercase">Register your a partner</a>
                    <p class="clear-top"><a href="#" class="btn btn-link-secondary"><i class="fa fa-btn fa-user"></i>Already registered? Sign in</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
