@extends('layouts.app')
@section('title') Home :: @parent @endsection
@section('content')
    <div class="row">
        <div class="page-header">
            <h2>Home</h2>
        </div>
    </div>

    @if(!Auth::check())
        <div class="row">
            <div class="col-lg-6 col-lg-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <span class="bigger">Login</span>
                        </div>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(array('url' => url('auth/login'), 'method' => 'post', 'files'=> true)) !!}
                        <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                            {!! Form::label('email', "E-Mail Address", array('class' => 'control-label')) !!}
                            <div class="controls">
                                {!! Form::text('email', null, array('class' => 'form-control')) !!}
                                <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                            </div>
                        </div>
                        <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
                            {!! Form::label('password', "Password", array('class' => 'control-label')) !!}
                            <div class="controls">
                                {!! Form::password('password', array('class' => 'form-control')) !!}
                                <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                    Login
                                </button>

                                <a href="{{ url('/password/email') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @else
        @if(Auth::user()->role->atLeast(30))
            <div class="panel">
                <div class="panel-body">
            <span class="bigger">
                There are currently {{ $orderCount }} orders in the system.
            </span>
                </div>
            </div>
        @endif
    @endif

@endsection

