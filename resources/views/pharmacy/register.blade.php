@extends('layouts.auth')
@section('title', 'Provider Registration')
@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center"><h2 class="text-uppercase clear-bottom clear-top">Pharmacy Registration</h2></div>
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
        <div class="col-md-7">
        <div class="col-12"><h4 class="">Personal Information</h4></div>  
              
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        @foreach ($errors as $error)
                            <p>{{ $error }}</p>
                        @endforeach

                        <div class="row">
                        <div class="col-6">
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="control-label">First Name</label>
                            <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
                            @if ($errors->has('firstname'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('firstname') }}
                                    </small>
                                @endif
                        </div>
                        </div>
                        
                        <div class="col-6">
						<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="control-label">Last Name</label>
                            <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
                            @if ($errors->has('lastname'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('lastname') }}
                                    </small>
                                @endif
                        </div>
                        </div>
                        </div>

						<div class="row">
                        <div class="col-6">
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('email') }}
                                    </small>
                                @endif
                        </div>
                        </div>                       

                        <div class="col-6">
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="control-label">Phone</label>
                            <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('phone') }}
                                    </small>
                                @endif
                        </div>
                        </div>
                        </div>						
						
                        <div class="row">
                        <div class="col">
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="control-label">Address</label>
                            <textarea id="address" class="form-control" name="address">{{ old('address') }}</textarea>
                            @if ($errors->has('address'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('address') }}
                                    </small>
                                @endif
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-6">
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="control-label">City</label>
                            <select class="form-control" name="city">
                                <option value="1">Lekki</option>
                                <option value="2">Surulere</option>
                            </select>
                            @if ($errors->has('city'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('city') }}
                                    </small>
                                @endif
                        </div>
                        </div>
                        
                        <div class="col-6">
						<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="control-label">State</label>
                            <select class="form-control" name="state">
                                <option value="1">Lagos</option>
                                <option value="2">Abuja</option>
                            </select>
                            @if ($errors->has('state'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('state') }}
                                    </small>
                                @endif
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-6">
                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="control-label">Country</label>
                            <select class="form-control" name="country">
                                <option value="1">Nigeria</option>
                                <option value="2">USA</option>
                            </select>
                            @if ($errors->has('country'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('country') }}
                                    </small>
                                @endif
                        </div>
                        </div>
                        </div>
						
						
                    </form>
                
        </div>
        <div class="col-md-5">
            <div class="col-12"><h4 class="">Professional Information</h4></div>
            <div class="row">
            <div class="col-12">
            <div class="form-group{{ $errors->has('specialty') ? ' has-error' : '' }}">
                <label for="specialty" class="control-label">Business Name</label>
                <input type="text" class="form-control" name="business_name" value="{{ old('business_name') }}">
                @if ($errors->has('business_name'))
                    <small class="help-block form-text">
                        {{ $errors->first('business_name') }}
                    </small>
                @endif
            </div>
            </div>

            <div class="col-12">
            <div class="form-group{{ $errors->has('licence_id') ? ' has-error' : '' }}">
                <label for="licence_id" class="control-label">Licence ID</label>
                <input id="licence_id" type="text" class="form-control" name="licence_id" value="{{ old('licence_id') }}">
                @if ($errors->has('licence_id'))
                    <small class="help-block form-text">
                        {{ $errors->first('licence_id') }}
                    </small>
                @endif
            </div>
            </div>

            <div class="col-12">
            <div class="form-group{{ $errors->has('affiliation') ? ' has-error' : '' }}">
                <label for="affiliation" class="control-label">Affiliation</label>
                <input id="affiliation" type="text" class="form-control" name="affiliation" value="{{ old('affiliation') }}">
                @if ($errors->has('affiliation'))
                    <small class="help-block form-text">
                        {{ $errors->first('affiliation') }}
                    </small>
                @endif
            </div>
            </div>

            <div class="col-12">
            <div class="form-group{{ $errors->has('licence_expiry_date') ? ' has-error' : '' }}">
                <label for="licence_expiry_date" class="control-label">Licence Expiry Date</label>
                <input id="licence_expiry_date" type="text" class="form-control" name="licence_expiry_date" value="{{ old('licence_expiry_date') }}">
                @if ($errors->has('licence_expiry_date'))
                    <small class="help-block form-text">
                        {{ $errors->first('licence_expiry_date') }}
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
                <input type="hidden" name="usertype" value="2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Register
                </button>
        </div>
        </div>
    </div>
</div>
@endsection