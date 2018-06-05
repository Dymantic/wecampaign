@extends('admin.base')

@section('content')
<div class="max-w-sm mx-auto mt-20">

    <h1 class="mb-8">Forgot your password?</h1>
    @if(session()->has('status'))
        <div class="max-w-sm mx-auto py-8 px-4 bg-black flex">
            <span class="text-white mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current" height="30px"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
            </span>
            <p class="text-white text-xl font-light antialiased">Your password reset link has been sent to your email. If you would like to send another link, just reuse the form below.</p>
        </div>
    @endif
    <p class="my-4">Enter the email address you use to login and you'll be sent instructions on how to reset your password.</p>
    <div>
        <form action="/admin/forgot-password" method="POST" class="max-w-sm mx-auto my-8">
            {!! csrf_field() !!}
            <div class="form-group{{ $errors->has('email') ? ' border border-danger p-2' : '' }}">
                <label class="text-sm font-bold" for="email">Email</label>
                @if($errors->has('email'))
                <span class="text-sm text-danger">{{ $errors->first('email') }}</span>
                @endif
                <input type="email" name="email" value="{{ old('email') }}" class="w-full h-8 border mt-2 pl-2 block">
            </div>
            <div class="form-group">
                <button type="submit" class="w-full block my-4 bg-black text-white uppercase tracking-wide h-12">Send Reset Link</button>
            </div>
        </form>
    </div>
</div>
@endsection