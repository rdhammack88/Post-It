@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-10 offset-md-1">
                                <img src="storage/user_profile_images/userAvatarDefault.png" alt="User profile avatar" class="user_avatar_preview img-thumbnail"
                                />
                                <label htmlFor="avatar" class="control-label col-12 pl-0">User Avatar</label>
                                <input type="file" name="avatar" accept="image/*" />
                                <p class="help-block mb-0">(Image files only, max size 5Mb)</p>
                                <p class="text-danger imageTypeError d-none"><small> Please only use image file types ('jpg', 'jpeg', 'png', 'gif).</small></p>
                                <p class="text-danger imageSizeError d-none"><small> File size too large. (Max 5Mb)</small></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name" class="col-md-10 offset-md-1 col-form-label control-label">{{ __('First Name') }}</label>

                            <div class="col-md-10 offset-md-1">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name"
                                    value="{{ old('first_name') }}" placeholder="First Name" required autofocus>                                @if ($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('first_name') }}
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-10 offset-md-1 col-form-label control-label">{{ __('Last Name') }}</label>

                            <div class="col-md-10 offset-md-1">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name"
                                    value="{{ old('last_name') }}" placeholder="Last Name" required>                                @if ($errors->has('last_name'))
                                <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('last_name') }}
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-10 offset-md-1 col-form-label control-label">{{ __('Username') }}</label>

                            <div class="col-md-10 offset-md-1">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username"
                                    value="{{ old('username') }}" placeholder="Username" required>                                @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('username') }}
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-10 offset-md-1 col-form-label control-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-10 offset-md-1">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                    placeholder="Email" required> @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('email') }}
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-10 offset-md-1 col-form-label control-label">{{ __('Password') }}</label>

                            <div class="col-md-10 offset-md-1">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    placeholder="Password" required> @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('password') }}
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-10 offset-md-1 col-form-label control-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-10 offset-md-1">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bio" class="col-md-10 offset-md-1 col-form-label control-label">{{ __('Biography') }}</label>

                            <div class="col-md-10 offset-md-1">
                                <textarea id="bio" type="password" class="form-control" name="user_bio" placeholder="Biography" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
