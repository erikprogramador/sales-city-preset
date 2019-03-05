<header>
    <div class="container">
        <div class="flex items-center justify-between py-5 px-5 sm:px-5">
            {{-- Replace with logo --}}
            <a class="no-underline text-sales-darkest text-xl font-semibold tracking-wide" href="{{ route('welcome') }}">
                <img src="{{ asset('images/logos/logo.svg') }}" alt="{{ config('app.name') }}" class="w-12">
            </a>

            <nav class="flex items-center{{ auth()->guest() ? ' py-2' : '' }}">
                @guest
                    <a class="text-sales-darker mx-4 uppercase tracking-wide text-xs hover:text-sales-darkest" href="{{ route('login') }}">
                        Login
                    </a>
                    <a class="no-underline text-sales-darker mx-4 uppercase tracking-wide text-xs hover:text-sales-darkest" href="{{ route('register') }}">
                        Register
                    </a>
                @endguest

                @auth
                    <div class="relative" data-dropdown-parent>
                        <a href="#" class="no-underline font-semibold text-sm flex items-center text-sales-darkest" data-dropdown>
                            <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y" alt="{{ auth()->user()->name }}" class="w-8 rounded-full mr-2">
                        </a>

                        <ul class="hidden overflow-hidden list-reset absolute pin-r bg-white rounded w-64 mt-3 shadow" data-dropdown-list>
                            <li class="p-3 flex flex-col">
                                <strong class="text-sales-darkest">{{ auth()->user()->name }}</strong>
                                <span class="text-grey-darker text-sm">{{ auth()->user()->email }}</span>
                            </li>
                            <li class="border-t border-grey-lighter"></li>
                            <li class="text-center">
                                <a class="no-underline block p-3 uppercase text-xs text-sales-darkest font-semibold tracking-wide" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    Sair
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </nav>
        </div>
    </div>
</header>
