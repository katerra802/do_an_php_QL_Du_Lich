<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Left side: Logo and Navigation -->
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2 text-xl font-bold text-blue-600 hover:text-blue-700 transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Du Lịch VN
                </a>

                <!-- Navigation Links -->
                <div class="hidden md:flex md:ml-10 md:space-x-8">
                    <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('home') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700 hover:text-blue-600' }} transition">
                        Trang chủ
                    </a>
                    <a href="{{ route('tours.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('tours.*') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700 hover:text-blue-600' }} transition">
                        Điểm đến
                    </a>
                    @auth
                    <a href="{{ route('bookings.myBookings') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('bookings.*') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700 hover:text-blue-600' }} transition">
                        Liên hệ
                    </a>
                    @endauth
                </div>
            </div>

            <!-- Right side: Actions -->
            <div class="hidden md:flex md:items-center md:space-x-4">
                <!-- Search Icon -->
                <button class="p-2 text-gray-600 hover:text-blue-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                <!-- Wishlist Icon -->
                <button class="p-2 text-gray-600 hover:text-blue-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>

                @auth
                <!-- User Dropdown -->
                <div x-data="{ openDropdown: false }" class="relative">
                    <button @click="openDropdown = !openDropdown" class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="openDropdown" @click.away="openDropdown = false"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50"
                        style="display: none;">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Profile
                        </a>
                        <a href="{{ route('bookings.myBookings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            My Bookings
                        </a>
                        <hr class="my-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <!-- Login Button -->
                <a href="{{ route('login') }}" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                    Đăng nhập
                </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button @click="open = !open" class="p-2 rounded-md text-gray-600 hover:text-blue-600 hover:bg-gray-100">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden border-t border-gray-200">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" class="block pl-3 pr-4 py-2 text-base font-medium {{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50 border-l-4 border-blue-600' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-600' }}">
                Trang chủ
            </a>
            <a href="{{ route('tours.index') }}" class="block pl-3 pr-4 py-2 text-base font-medium {{ request()->routeIs('tours.*') ? 'text-blue-600 bg-blue-50 border-l-4 border-blue-600' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-600' }}">
                Điểm đến
            </a>
            @auth
            <a href="{{ route('bookings.myBookings') }}" class="block pl-3 pr-4 py-2 text-base font-medium {{ request()->routeIs('bookings.*') ? 'text-blue-600 bg-blue-50 border-l-4 border-blue-600' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-600' }}">
                Liên hệ
            </a>
            @endauth
        </div>

        @auth
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                    Profile
                </a>
                <a href="{{ route('bookings.myBookings') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                    My Bookings
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left pl-3 pr-4 py-2 text-base font-medium text-red-600 hover:bg-gray-50">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
        @else
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="px-4">
                <a href="{{ route('login') }}" class="block w-full px-4 py-2 text-center bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                    Đăng nhập
                </a>
            </div>
        </div>
        @endauth
    </div>
</nav>