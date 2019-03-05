@extends('layouts.app')

@section('content')
    <div class="mt-12">
        <div class="flex justify-center px-5 sm:px-0 pb-16">
            <div class="w-full sm:w-1/3 bg-white shadow rounded overflow-hidden">
                <header class="text-center p-6">
                    <img src="{{ asset('images/logos/logo-full.svg') }}" alt="{{ config('app.name') }}" class="w-48">

                    <h2 class="font-semibold text-sales-darkest mt-1 text-lg">Ja pode alterar sua senha!</h2>
                </header>

                <form action="{{ route('password.update') }}" method="POST" class="mb-6 px-6">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form mb-4{{ $errors->has('email') ? ' has-errors' : '' }}">
                        <label for="email">E-mail</label>

                        <input type="email" name="email" id="email" placeholder="jhon@example.com" value="{{ old('email') }}" required>

                        {!! $errors->first('email', '<span class="error">:message</span>') !!}
                    </div>

                    <div class="form mb-4{{ $errors->has('password') ? ' has-errors' : '' }}">
                        <label for="password">Senha</label>

                        <input type="password" name="password" id="password" placeholder="********" required>

                        {!! $errors->first('password', '<span class="error">:message</span>') !!}
                    </div>

                    <div class="form mb-4{{ $errors->has('password_confirmation') ? ' has-errors' : '' }}">
                        <label for="password_confirmation">Confirmação de senha</label>

                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="********" required>

                        {!! $errors->first('password_confirmation', '<span class="error">:message</span>') !!}
                    </div>

                    <div class="flex items-center justify-between">
                        <button class="btn">Alterar senha</button>
                    </div>
                </form>

                <footer class="w-full py-2 px-6 text-center text-sm text-grey-darker">
                    Ja tem uma conta? <a href="{{ route('login') }}">Logar-se</a>
                </footer>
            </div>
        </div>
    </div>
@endsection
