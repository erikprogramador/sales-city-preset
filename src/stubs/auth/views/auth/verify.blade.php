@extends('layouts.app')

@section('content')
    <div class="mt-12">
        @if (session('resent'))
            <div class="w-full mx-5 sm:w-1/3 sm:mx-auto mb-4 bg-white shadow border-t-4 border-sales-darker rounded overflow-hidden px-4 py-6 text-sales-darkest">
                Um novo link de verificação for enviado para o se e-mail.
            </div>
        @endif

        <div class="flex justify-center px-5 sm:px-0 pb-16">
            <div class="w-full sm:w-1/3 bg-white shadow rounded overflow-hidden">
                <header class="text-center p-6">
                    <img src="{{ asset('images/logos/logo-full.svg') }}" alt="{{ config('app.name') }}" class="w-48">

                    <h2 class="font-semibold text-sales-darkest mt-1 text-lg">Falta pouco!</h2>
                </header>

                <div class="px-4 mb-4 text-center">
                    <p class="leading-normal mb-2 text-sales-darkest">Antes de continuar, veja no seu e-mail o link de verificação.</p>
                    <p class="leading-normal mb-2 text-sales-darkest">Caso não tenha recebido o email, <a href="{{ route('verification.resend') }}">click aqui para requisitar um novo.</a></p>
                </div>

                <footer class="w-full py-2 px-6 text-center text-sm text-grey-darker">
                    Ja tem uma conta? <a href="{{ route('login') }}">Logar-se</a>
                </footer>
            </div>
        </div>
    </div>
@endsection
