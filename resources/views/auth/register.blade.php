@extends('layouts.app')

@section('content')
<div class="uk-container uk-margin uk-flex uk-flex-center">
  <div class="uk-card uk-card-default uk-width-1-2@s">
    <div class="uk-card-header">
      <div uk-grid>
        <div class="uk-button-group uk-width-1-1">
          <button class="uk-button uk-button-default uk-width-1-3 uk-padding-small">
            <span uk-icon="icon: github; ratio: 1.5"></span>
          </button>
          <button class="uk-button uk-button-default uk-width-1-3 uk-padding-small">
            <span uk-icon="icon: facebook; ratio: 1.5"></span>
          </button>
          <button class="uk-button uk-button-default uk-width-1-3 uk-padding-small">
            <span uk-icon="icon: twitter; ratio: 1.5"></span>
          </button>
        </div>
      </div>
      <h3 class="uk-card-title">Register</h3>
    </div>
    <form class="uk-form-stacked" method="POST" action="{{ route('register') }}" novalidate>
      {{ csrf_field() }}
    <div class="uk-card-body">
        <div class="uk-margin">
          <label class="uk-form-label {{ $errors->has('name') ? ' uk-text-danger' : '' }}">
            Name
          </label>
          <div class="uk-width-1-1 uk-inline">
            <span class="uk-form-icon {{ $errors->has('name') ? ' uk-text-danger' : '' }}"
                  uk-icon="icon: user">
            </span>
            <input id="name"
                   type="name"
                   class="uk-input {{ $errors->has('name') ? ' uk-form-danger' : '' }}"
                   name="name"
                   value="{{ old('name') }}"
                   required
                   autofocus>
          </div>
          @if ($errors->has('email'))
            <span class="uk-text-small uk-text-danger">{{ $errors->first('email') }}</span>
          @endif
        </div>
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
        <div class="uk-margin">
          <label class="uk-form-label">
            Confirm Password
          </label>
          <div class="uk-width-1-1 uk-inline">
            <span class="uk-form-icon"
                  uk-icon="icon: lock">
            </span>
            <input id="password"
                   type="password"
                   class="uk-input"
                   name="password_confirmation"
                   required>
          </div>
        </div>
      </div>
      <div class="uk-card-footer uk-clearfix">
        <button type="submit" class="uk-button uk-button-primary uk-box-shadow-medium">
          Register
        </button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection
