@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">{{ __('Reset Password') }}</div>
      <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
        @endif
        <div class="text-center mb-4">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <form method="POST" action="{{ route('password.email') }}">
          @csrf
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail"
              class="form-control" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
              name="email" value="{{ old('email') }}" required>
              <label for="inputEmail">{{ __('E-Mail Address') }}</label>
              @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">
            {{ __('Send Password Reset Link') }}
          </button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{ route('register') }}">Register an Account</a>
          <a class="d-block small" href="{{ route('login') }}">Login Page</a>
        </div>
      </div>
    </div>
  </div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
