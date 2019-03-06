@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="mx-0 md:-mx-4 flex flex-col md:flex-row px-4 md:px-0">
            <nav class="w-full md:w-1/5 md:mx-4">
                <div class="mb-6">
                    <a class="text-sales-dark hover:text-sales font-semibold flex items-center mb-3" href="#">
                        <div class="mdi mdi-home-outline mr-2 text-xl"></div>
                        <span>Home</span>
                    </a>

                    <a class="text-sales-darker hover:text-sales-dark flex items-center mb-3" href="#">
                        <div class="mdi mdi-newspaper mr-2 text-xl"></div>
                        <span>Atividades</span>
                    </a>
                </div>
            </nav>

            <main class="w-full md:w-4/5 md:mx-4">
                @yield('main')
            </main>
        </div>
    </div>
@endsection
