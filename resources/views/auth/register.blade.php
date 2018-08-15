@extends('main')

@section('title', '| Register')

@section('content')

{{-- cutomized registeration form  --}}

<div class="row">
    <div class="col-md-6 offset-3 text-center">
        <h1>Register User</h1>
    </div>
    <div class="col-md-6 offset-3">
        {!! Form::open() !!}
            
            {{ Form::label('name', 'Name:', ['class' => 'btn-h1-spacing']) }}
            {{ Form::text('name', null, ['class' => 'form-control'])}}

            {{ Form::label('email', 'Email:' , ['class' => 'btn-h1-spacing'])}}
            {{ Form::email('email', null, ['class' => 'form-control']) }}
            
            {{ Form::label('password', 'Password:' , ['class' => 'btn-h1-spacing']) }}
            {{ Form::password('password', ['class' => 'form-control']) }}

            {{ Form::label('password_confirmation', 'Conirm Password:' , ['class' => 'btn-h1-spacing']) }}
            {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

            {{ Form::submit('Register', ['class' => 'btn btn-primary btn-block form-spacing-top']) }}

        {!! Form::close() !!}

    </div>
</div>


{{-- built in register form throug "php artisan make:auth" command --}}

{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
