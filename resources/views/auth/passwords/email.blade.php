@extends('main')

@section('title', '| Forgot My Password')

@section('content')


{{-- customized forgot my password form --}}

{{-- <div class="row">
    <div class="col-md-6 col-md-offset 3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Reset Password
            </div>
            <div class="panel-body">
                {!! Form::open(['route' => 'password.email']) !!}

                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}

                {{ Form::submit('Reset Password', ['class' => 'btn btn-primary btn-h1-spacing']) }}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div> --}}




{{-- built in design for forgot password --}}


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
