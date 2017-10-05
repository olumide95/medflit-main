@extends('layouts.auth')
@section('title', 'Online Payment')
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
        <div class="col-md-12 text-center"><h2 class="text-uppercase clear-bottom clear-top">Pay online</h2></div>
       
        @if ($errors->has('email'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('email') }}
                                    </small>
                                @endif
    </div>
    <div class="row">
        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal col-12" role="form">
            <div class="row text-center" style="margin-bottom:40px;">
              <div class="col-md-12">
                
                    <div class="text-center">
                        <h4>Standard Health Plan: ₦ 2,000</h4>
                    </div>
                
                <input type="hidden" name="email" value="rasheedsaidi@gmail.com"> {{-- required --}}
                <input type="hidden" name="orderID" value="345">
                <input type="hidden" name="amount" value="200000"> {{-- required in kobo --}}
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                 <!--nput type="hidden" name="_token" value="{{ csrf_token() }}"--> {{-- employ this in place of csrf_field only in laravel 5.0 --}}


                <p style="margin-top: 2em;">
                  <button class="btn btn-success btn-lg" type="submit" value="Pay Now!">
                  <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                  </button>
                </p>
              </div>
            </div>
    </form>    
    </div>
</div>
@endsection
