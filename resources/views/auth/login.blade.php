@extends('layouts.app_auth')
@section('content')
  <h4 class="mb-1">Login 👋</h4>

  <form id="formAuthentication" class="mb-4" method="POST" action="{{ route('login') }}">
     @csrf
    <div class="mb-6 form-control-validation">
        <label for="email" class="form-label">Email or Username</label>
        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email or username" autocomplete="email" autofocus />
        @error('email')
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="username" data-validator="notEmpty">{{ $message }}</div>
            </div>
        @enderror
    </div>
    <div class="mb-6 form-password-toggle form-control-validation">
        <label class="form-label" for="password">Password</label>
        <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="icon-base ti tabler-eye-off"></i></span>
        </div>
        @error('password')
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="username" data-validator="notEmpty">{{ $message }}</div>
            </div>
        @enderror
    </div>
    <div class="my-8">
      <div class="d-flex justify-content-between">
        <div class="form-check mb-0 ms-2">
          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
          <label class="form-check-label" for="remember"> Remember Me </label>
        </div>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                <p class="mb-0">{{ __('Forgot Your Password?') }}</p>
            </a>
        @endif
      </div>
    </div>
    <div class="mb-6">
      <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
    </div>
  </form>

  <p class="text-center">
    <span>New on our platform?</span>
    <a href="{{ url('register') }}">
      <span>Create an account</span>
    </a>
  </p>
@endsection