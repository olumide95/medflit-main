@extends('layouts.auth')
@section('title', 'Provider Registration')
@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-warning bg-warning navbar-toggleable-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('public/assets/images/logo.png') }}" alt="Medflit logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('http://www.medflit.com') }}">Home <span class="sr-only">(current)</span></a>
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
        <div class="col-md-12 text-center"><h2 class="text-uppercase clear-bottom clear-top">Partner Registration</h2></div>
        @if (Session::has('reg-success'))
            <div class="col-md-8 col-md-offset-2 text-center alert alert-info">{{ Session::get('reg-success') }}</div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <nav class="nav nav-pills nav-justified clear-bottom">
                    <a class="nav-item nav-link active text-uppercase" href="#">Sign up</a>
                    <a class="nav-item nav-link secondary disabled text-uppercase" href="#">Sign in</a>
                </nav>
            </div>
        <div class="col-md-5">
        <div class="col-12"><h4 class="">Company Information</h4></div>  
              
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        @foreach ($errors as $error)
                            <p>{{ $error }}</p>
                        @endforeach

                        <div class="col-12">
                        <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                            <label for="company_name" class="control-label">Company Name</label>
                            <input id="company_name" type="text" class="form-control" name="company_name" value="{{ old('company_name') }}">
                            @if ($errors->has('company_name'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('company_name') }}
                                    </small>
                                @endif
                        </div>
                        </div>

                        <div class="col-12">
                        <div class="form-group{{ $errors->has('company_email') ? ' has-error' : '' }}">
                            <label for="company_email" class="control-label">Company Email</label>
                            <input type="email" class="form-control" name="company_email" value="{{ old('company_email') }}">
                            @if ($errors->has('company_email'))
                                <small class="help-block form-text">
                                    {{ $errors->first('company_email') }}
                                </small>
                            @endif
                        </div>
                        </div>

                        <div class="col-12">
                        <div class="form-group{{ $errors->has('company_phone') ? ' has-error' : '' }}">
                            <label for="company_phone" class="control-label">Company Phone</label>
                            <input id="company_phone" type="text" class="form-control" name="company_phone" value="{{ old('company_phone') }}">
                            @if ($errors->has('company_phone'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('company_phone') }}
                                    </small>
                                @endif
                        </div>
                        </div>
                        
                        <div class="col-12">
						<div class="form-group{{ $errors->has('company_services') ? ' has-error' : '' }}">
                            <label for="company_services" class="control-label">Company Services</label>
                            <input id="company_services" type="text" class="form-control" name="company_services" value="{{ old('company_services') }}">
                            @if ($errors->has('company_services'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('company_services') }}
                                    </small>
                                @endif
                        </div>
                        </div>					
						
                        <div class="col">
                        <div class="form-group{{ $errors->has('company_address') ? ' has-error' : '' }}">
                            <label for="company_address" class="control-label">Company Address</label>
                            <textarea id="company_address" class="form-control" name="company_address">{{ old('company_address') }}</textarea>
                            @if ($errors->has('company_address'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('company_address') }}
                                    </small>
                                @endif
                        </div>
                        </div>

                       
                
        </div>
        <div class="col-md-6">
            <div class="col-12"><h4 class="">Contact Person</h4></div>
            <div class="row">
            <div class="col-12">
            <div class="form-group{{ $errors->has('contact_firstname') ? ' has-error' : '' }}">
                <label for="contact_firstname" class="control-label">First Name</label>
                <input type="text" class="form-control" name="contact_firstname" value="{{ old('contact_firstname') }}">
                @if ($errors->has('contact_firstname'))
                    <small class="help-block form-text">
                        {{ $errors->first('contact_firstname') }}
                    </small>
                @endif
            </div>
            </div>

            <div class="col-12">
            <div class="form-group{{ $errors->has('contact_lastname') ? ' has-error' : '' }}">
                <label for="contact_lastname" class="control-label">Last Name</label>
                <input id="contact_lastname" type="text" class="form-control" name="contact_lastname" value="{{ old('contact_lastname') }}">
                @if ($errors->has('contact_lastname'))
                    <small class="help-block form-text">
                        {{ $errors->first('contact_lastname') }}
                    </small>
                @endif
            </div>
            </div>

            <div class="col-12">
            <div class="form-group{{ $errors->has('contact_email') ? ' has-error' : '' }}">
                <label for="contact_email" class="control-label">Email Address</label>
                <input id="contact_email" type="text" class="form-control" name="contact_email" value="{{ old('contact_email') }}">
                @if ($errors->has('contact_email'))
                    <small class="help-block form-text">
                        {{ $errors->first('contact_email') }}
                    </small>
                @endif
            </div>
            </div>

            <div class="col-12">
            <div class="form-group{{ $errors->has('contact_phone') ? ' has-error' : '' }}">
                <label for="contact_phone" class="control-label">Phone Number</label>
                <input id="contact_phone" type="text" class="form-control" name="contact_phone" value="{{ old('contact_phone') }}">
                @if ($errors->has('contact_phone'))
                    <small class="help-block form-text">
                        {{ $errors->first('contact_phone') }}
                    </small>
                @endif
            </div>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12"><h4 class="text-center">Login Information</h4></div>
        <div class="col-12">
        <div class="row">
        <div class="col-4">
        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label for="username" class="control-label">Username</label>
            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">
            @if ($errors->has('username'))
                    <small class="help-block form-text">
                        {{ $errors->first('username') }}
                    </small>
                @endif
        </div>
        </div>

        <div class="col-4">
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="control-label">Password</label>
            <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">
            @if ($errors->has('password'))
                    <small class="help-block form-text">
                        {{ $errors->first('password') }}
                    </small>
                @endif
        </div>
        </div>

        <div class="col-4">
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirmation" class="control-label">Confirm Password</label>
            <input id="password-confirmation" type="password" class="form-control" name="password_confirmation" value="{{ old('password') }}">
            @if ($errors->has('password'))
                    <small class="help-block form-text">
                        {{ $errors->first('password_confirmation') }}
                    </small>
                @endif
        </div>
        </div>
        </div>
        </div>

        <div class="col-12">

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

        </div>

        <div class="col-12">
        <div class="form-group">
                <input type="hidden" name="usertype" value="5">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Register
                </button>
        </div>
        </div>
    </div>
</form>
</div>
@endsection