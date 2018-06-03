@extends('admin.base')

@section('content')
    <div class="w-full h-full flex justify-center items-center">
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
        <form action="/admin/reset-password"
              method="POST"
              class="max-w-sm mx-auto">
            <svg fill="#dddddd"
                 height="60"
                 viewBox="0 0 24 24"
                 width="60"
                 class="mx-auto my-8 block"
                 xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <path d="M0 0h24v24H0V0z"
                          id="a"/>
                </defs>
                <clipPath id="b">
                    <use overflow="visible"
                         xlink:href="#a"/>
                </clipPath>
                <path clip-path="url(#b)"
                      d="M12 17c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm6-9h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM8.9 6c0-1.71 1.39-3.1 3.1-3.1s3.1 1.39 3.1 3.1v2H8.9V6zM18 20H6V10h12v10z"/>
            </svg>
            <h1 class="col-grey tc">Reset Your Password</h1>
            {!! csrf_field() !!}
            <input type="hidden"
                   name="token"
                   value="{{ $token }}">
            <div class="my-4{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="text-sm font-bold"
                       for="email">Email</label>
                @if($errors->has('email'))
                    <span class="text-sm text-danger">{{ $errors->first('email') }}</span>
                @endif
                <input type="email"
                       name="email"
                       value="{{ $email ?? old('email') }}"
                       class="block h-8 w-full pl-2 mt-2 border">
            </div>
            <div class="my-4{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="text-sm font-bold"
                       for="password">New Password: </label>
                @if($errors->has('password'))
                    <span class="text-sm text-danger">{{ $errors->first('password') }}</span>
                @endif
                <input type="password"
                       name="password"
                       value="{{ old('password') }}"
                       class="block h-8 w-full pl-2 mt-2 border">
            </div>
            <div class="my-4">
                <label class="text-sm font-bold"
                       for="password_confirmation">Confirm Password: </label>
                @if($errors->has('password_confirmation'))
                    <span class="text-sm text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
                <input type="password"
                       name="password_confirmation"
                       value="{{ old('password_confirmation') }}"
                       class="block h-8 w-full pl-2 mt-2 border">
            </div>
            <div class="my-4">
                <button type="submit"
                        class="h-12 bg-green text-white tracking-wide uppercase font-bold w-full block">Reset Password
                </button>
            </div>
        </form>
    </div>
@endsection
