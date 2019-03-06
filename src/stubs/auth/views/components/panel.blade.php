<div class="bg-white rounded shadow {{ $class ?? '' }}">
    @if (isset($header))
        <header class="p-4 text-xl text-sales-darkest">{{ $header }}</header>
    @endif

    <main class="px-4 py-6">{{ $slot }}</main>

    @if (isset($footer))
        <footer class="p-4">{{ $footer }}</footer>
    @endif
</div>
