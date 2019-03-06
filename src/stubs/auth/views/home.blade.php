@extends('layouts.dashboard')

@section('main')
    @component('components.panel')
        @slot('header')
            Home
        @endslot

        @slot('slot')
            <h4 class="text-sales-darkest font-normal text-xl">
                Bem vindo de volta {{ auth()->user()->name }}!
            </h4>
        @endslot
    @endcomponent
@endsection
