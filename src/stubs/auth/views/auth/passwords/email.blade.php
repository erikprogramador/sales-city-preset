@extends('layouts.app')

@section('content')
    <div class="mt-12">
        @if (session('status'))
            <div class="w-full mx-5 sm:w-1/3 sm:mx-auto mb-4 bg-white shadow border-t-4 border-sales-darker rounded overflow-hidden px-4 py-6 text-sales-darkest">
                {{ session('status') }}
            </div>
        @endif
        <div class="flex justify-center px-5 sm:px-0 pb-16">
            <div class="w-full sm:w-1/3 bg-white shadow rounded overflow-hidden">
                <header class="text-center p-6">
                    <img src="{{ asset('images/logos/logo-full.svg') }}" alt="{{ config('app.name') }}" class="w-48">

                    <h2 class="font-semibold text-sales-darkest mt-1 text-lg">Ok, vamos recuperar sua senha!</h2>
                </header>

                <form action="{{ route('password.email') }}" method="POST" class="mb-6 px-6">
                    @csrf

                    <div class="form mb-4{{ $errors->has('email') ? ' has-errors' : '' }}">
                        <label for="email">E-mail</label>

                        <input type="email" name="email" id="email" placeholder="jhon@example.com" value="{{ old('email') }}" autofocus required>

                        {!! $errors->first('email', '<span class="error">:message</span>') !!}
                    </div>

                    <div class="flex items-center justify-between">
                        <button class="btn">Enviar link para meu e-mail</button>
                    </div>
                </form>

                <footer class="w-full py-2 px-6 text-center text-sm text-grey-darker">
                    Ja tem uma conta? <a href="{{ route('login') }}">Logar-se</a>
                </footer>
            </div>
        </div>
    </div>
@endsection
