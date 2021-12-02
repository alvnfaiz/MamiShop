@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="justify-center w-full p-10 mx-auto mt-10 md:shadow-md md:border md:mt-40 md:w-4/5 lg:w-2/5">
        <h1 class="text-2xl text-center">{{ ('Login') }}</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="my-10">
                <label for="email" class="block mb-2 text-sm font-black">
                    {{ __('E-Mail Address') }}:
                </label>
                <input type="email" id="email" name="email" class="rounded border focus:outline-none focus:ring-2 focus:ring-blue-600 p-2 w-full @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <div class="text-red-500">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
            
            <div class="mt-10">
                <label for="password" class="block mb-2 text-sm font-bold">
                    {{ __('Password') }}:
                </label>
                <input type="password" id="password" name="password" class="rounded w-full p-2 border  focus:outline-none focus:ring-2 focus:ring-blue-600  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <div class="text-red-500">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
            
            
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
            <hr/>
            <button type="submit" class="px-6 py-4 mt-4 font-medium text-white bg-blue-500 rounded hover:bg-blue-100 hover:text-blue-500">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="px-6 py-4 mt-4 font-medium text-blue-400 rounded hover:text-blue-700" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>
    </div>
</div>
@endsection
