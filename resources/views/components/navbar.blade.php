<nav class="bg-primary" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-8 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex-shrink-0 flex items-center">
                <h1 class="text-white text-lg lg:text-2xl font-extrabold">ENDANG STORE</h1>
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4 uppercase">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                    <x-nav-link href="/shop" :active="request()->is('shop')">Shop</x-nav-link>
                    <x-nav-link href="/cart" :active="request()->is('cart')">Cart</x-nav-link>
                </div>
            </div>

            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    @auth
                        <!-- Profile dropdown -->
                        <div class="relative ml-3" x-data="{ isOpen: false }">
                            <div>
                                <button type="button" @click="isOpen = !isOpen"
                                    class="relative flex max-w-xs items-center rounded-full bg-btn text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <div
                                        class="h-10 w-10 flex items-center justify-center bg-secondary text-hitamCoklat font-bold text-2xl rounded-full">
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    </div>
                                </button>
                            </div>
                            <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75 transform"
                                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                <a href="/profile/address" class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-1">Alamat Saya</a>
                                <div>
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700"
                                        role="menuitem"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        tabindex="-1" id="user-menu-item-2">Sign out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}"
                            class="py-2 px-4 bg-btn rounded-full hover:bg-hover text-white text-sm lg:text-md font-medium">Login</a>
                        <a href="{{ route('register') }}"
                            class="text-white text-sm lg:text-md font-medium hover:bg-hover py-2 px-4 rounded-full">Register</a>
                    @endauth
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" @click="isOpen = !isOpen"
                    class="relative inline-flex items-center justify-center rounded-md bg-btn p-2 text-white hover:bg-hover hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden bg-primary" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="/" class="bg-hover text-white block rounded-md px-3 py-2 text-base font-medium"
                aria-current="page">Home</a>
            <a href="/shop"
                class="text-white hover:bg-hover hover:text-white block rounded-md px-3 py-2 text-base font-medium">Shop</a>
            <a href="/cart"
                class="text-white hover:bg-hover hover:text-white block rounded-md px-3 py-2 text-base font-medium">Cart</a>
        </div>
        <div class="border-t border-secondary pb-3 pt-4">
            @auth
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <div
                            class="h-8 w-8 flex items-center justify-center bg-secondary text-hitamCoklat font-bold text-2xl rounded-full">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1 px-2">
                    <a href="{{ route('profile.edit') }}"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                        Profile</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                    <div>
                        <a href="{{ route('logout') }}"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign
                            out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <div class="text-center py-4">
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 bg-btn rounded-full text-sm font-medium text-white">Login</a>
                </div>
                <div class="text-center py-4">
                    <a href="{{ route('register') }}"
                        class="px-4 py-2 bg-hover rounded-full text-sm font-medium text-white">Register</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
