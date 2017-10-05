@extends('layouts.auth')
@section('title', 'Payment Response')
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
        <div class="col-md-12 text-center"><h2 class="text-uppercase clear-bottom clear-top">Payment response</h2></div>
       
        @if ($errors->has('email'))
                                    <small class="help-block form-text">
                                        {{ $errors->first('email') }}
                                    </small>
                                @endif
    </div>
    <div class="row">
            <div class="row col-12 text-center" style="margin-bottom:40px;">
              <div class="col-md-12">
                
                    <div class="text-center">
                        @if ($payment['status'] === true)
                            @if ($payment['data']['status'] === 'success')
                                <h4 style="color: green;">Your payment was successful.</h4>
                            @else
                                <h4 style="color: red;">Your payment was not successful.</h4>
                            @endif
                        @else
                            <h4 style="color: red;">Your payment was not successful. No data was received</h4>
                        @endif
                    </div>
                    <table class="table text-left table-bordered" style="width: 600px;margin: 2em auto;">
                        <tr>
                            <td><b>Amount</b></td><td>{{ '&#8358; ' . number_format($payment['data']['amount']/100, 2, '.', '') }}</td>
                        </tr>
                        <tr>
                            <td><b>Payment Response</b></td><td>{{ $payment['data']['gateway_response'] }}</td>
                        </tr>
                        <tr>
                            <td><b>Payment Channel</b></td><td>{{ $payment['data']['channel'] }}</td>
                        </tr>
                        <tr>
                            <td><b>Transaction Reference</b></td><td>{{ $payment['data']['reference'] }}</td>
                        </tr>
                        <tr>
                            <td><b>Transaction Date</b></td><td>{{ date("F jS, Y H:m:i", strtotime($payment['data']['transaction_date'])) }}</td>
                        </tr>
                    </table>
             
                    <p style="margin-top: 2em;" class="text-center">
                          <button class="btn btn-success btn-lg" type="button" value="Back to dashboard">
                          <i class="fa fa-plus-circle fa-lg"></i>Back to dashboard
                          </button>
                    </p>
                
              </div>
            </div>
    
    </div>
</div>
@endsection
