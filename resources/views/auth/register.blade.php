@extends('layouts.app_auth')
@section('content')
<!-- /Logo -->
<h4 class="mb-1">Registration 🚀</h4>

<form id="formAuthentication" class="mb-6" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-6 form-control-validation">
        <label for="username" class="form-label">{{ __('Name') }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your name" autofocus />
        @error('name')
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="username" data-validator="notEmpty">{{ $message }}</div>
            </div>
        @enderror
    </div>
    <div class="mb-6 form-control-validation">
        <label for="email" class="form-label">{{ __('Email Address') }}</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" />
        @error('email')
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="username" data-validator="notEmpty">{{ $message }}</div>
            </div>
        @enderror
    </div>
    <div class="mb-6 form-control-validation">
        <label for="phone_number" class="form-label">{{ __('Phone Number') }}</label>
        <input type="tel" id="phone_number" name="phone_number" placeholder="Enter your phone number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" />
        @error('phone_number')
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="username" data-validator="notEmpty">{{ $message }}</div>
            </div>
        @enderror
    </div>
    <div class="mb-6 form-password-toggle form-control-validation">
        <label class="form-label" for="password">{{ __('Password') }}</label>
        <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" autocomplete="new-password" />
            <span class="input-group-text cursor-pointer"><i class="icon-base ti tabler-eye-off"></i></span>
        </div>
        @error('password')
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="username" data-validator="notEmpty">{{ $message }}</div>
            </div>
        @enderror
    </div>
    <div class="mb-6 form-password-toggle form-control-validation">
        <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>
        <div class="input-group input-group-merge">
            <input type="password" id="password-confirm" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" autocomplete="new-password" />
            <span class="input-group-text cursor-pointer"><i class="icon-base ti tabler-eye-off"></i></span>
        </div>
        @error('password_confirmation')
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <div data-field="username" data-validator="notEmpty">{{ $message }}</div>
            </div>
        @enderror
    </div>
    <div class="my-8 form-control-validation">
      <div class="form-check mb-0 ms-2">
        <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" id="terms-conditions" name="terms" />
        <label class="form-check-label" for="terms-conditions">
          I agree to
          <a href="javascript:void(0);">privacy policy & terms</a>
        </label>
        @error('terms')
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
            <div data-field="terms" data-validator="notEmpty">Please agree to terms &amp; conditions</div>
        </div>
        @enderror
      </div>
    </div>
    <button class="btn btn-primary d-grid w-100">{{ __('Sign up') }}</button>
</form>

<p class="text-center">
<span>Already have an account?</span>
<a href="{{ url('login') }}">
  <span>Sign in instead</span>
</a>
</p>
@endsection