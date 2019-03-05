@extends('layouts.app')

@section('content')
    <div class="mt-32 pt-32 flex items-center justify-center">
        <img src="{{ asset('images/logos/logo-full.svg') }}" alt="{{ config('app.name') }}" class="w-64">
    </div>
@endsection
