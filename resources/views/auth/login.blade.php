@extends('layouts.app')

@section('content')
  <div class="uk-container uk-margin-large uk-flex uk-flex-center">
    <div class="uk-card uk-card-default uk-width-1-2@s">
      <div class="uk-card-header">
        <div uk-grid>
          <div class="uk-button-group uk-width-1-1" id="social-icons">
            <a href="{{ url('/login/github') }}"
               class="uk-button uk-button-default uk-width-1-7 uk-padding-small"
               title="GitHub"
               id="social-github"
               uk-tooltip>
              <span uk-icon="icon: github; ratio: 1.5"></span>
            </a>
            <a href="{{ url('/login/twitter') }}"
               class="uk-button uk-button-default uk-width-1-7 uk-padding-small"
               title="Twitter"
               id="social-twitter"
               uk-tooltip>
              <span uk-icon="icon: twitter; ratio: 1.5"></span>
            </a>
            <a href="{{ url('/login/facebook') }}"
               class="uk-button uk-button-default uk-width-1-7 uk-padding-small"
               title="Facebook"
               id="social-facebook"
               uk-tooltip>
              <span uk-icon="icon: facebook; ratio: 1.5"></span>
            </a>
            <a href="{{ url('/login/google') }}"
               class="uk-button uk-button-default uk-width-1-7 uk-padding-small"
               title="Google"
               id="social-google"
               uk-tooltip>
              <span uk-icon="icon: google; ratio: 1.5"></span>
            </a>
            <a href="{{ url('/login/linkedin') }}"
               class="uk-button uk-button-default uk-width-1-7 uk-padding-small"
               title="LinkedIn"
               id="social-linkedin"
               uk-tooltip>
              <span uk-icon="icon: linkedin; ratio: 1.5"></span>
            </a>
            <a href="{{ url('/login/bitbucket') }}"
               class="uk-button uk-button-default uk-width-1-7 uk-padding-small"
               title="Bitbucket"
               id="social-bitbucket"
               uk-tooltip>
              <img src="{{ asset('images/bitbucket.svg') }}" alt="Bitbucket" height="25px" width="25px" uk-svg>
            </a>
            <a href="{{ url('/login/gitlab') }}"
               class="uk-button uk-button-default uk-width-1-7 uk-padding-small"
               title="GitLab"
               id="social-gitlab"
               uk-tooltip>
              <span src="{{ asset('images/gitlab.svg') }}" alt="GitLab" height="25px" width="25px" uk-svg>
            </a>
          </div>
        </div>
        <hr class="uk-divider-icon">
        <h3 class="uk-card-title uk-margin-remove">Login</h3>
      </div>
      <form class="uk-form-stacked" method="POST" action="{{ route('login') }}" novalidate>
        {{ csrf_field() }}
      <div class="uk-card-body">
          <div class="uk-margin">
            <label class="uk-form-label {{ $errors->has('email') ? ' uk-text-danger' : '' }}">
              E-Mail Address
            </label>
            <div class="uk-width-1-1 uk-inline">
              <span class="uk-form-icon {{ $errors->has('email') ? ' uk-text-danger' : '' }}"
                    uk-icon="icon: user">
              </span>
              <input id="email"
                     type="email"
                     class="uk-input {{ $errors->has('email') ? ' uk-form-danger' : '' }}"
                     name="email"
                     value="{{ old('email') }}"
                     required
                     autofocus>
            </div>
            @if ($errors->has('email'))
              <span class="uk-text-small uk-text-danger">{{ $errors->first('email') }}</span>
            @endif
          </div>
          <div class="uk-margin">
            <label class="uk-form-label {{ $errors->has('password') ? ' uk-text-danger' : '' }}">
              Password
            </label>
            <div class="uk-width-1-1 uk-inline">
              <span class="uk-form-icon {{ $errors->has('password') ? ' uk-text-danger' : '' }}"
                    uk-icon="icon: lock">
              </span>
              <input id="password"
                     type="password"
                     class="uk-input {{ $errors->has('password') ? ' uk-form-danger' : '' }}"
                     name="password"
                     required>
            </div>
            @if ($errors->has('password'))
              <span class="uk-text-small uk-text-danger">{{ $errors->first('password') }}</span>
            @endif
          </div>

          <div class="margin uk-inline uk-float-right">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="uk-checkbox">
            Remember Me
          </label>
          </div>

      </div>
        <div class="uk-card-footer uk-clearfix">
          <button type="submit" class="uk-button uk-button-primary uk-box-shadow-medium">
            Login
          </button>
        </div>
      </form>
      </div>
    </div>
  </div>
@endsection
