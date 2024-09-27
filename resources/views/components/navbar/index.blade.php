<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <x-navbar.link  href="{{route('home')}}">Home</x-navbar.link>
                        <x-navbar.link href="{{route('about')}}">About</x-navbar.link>
                        <x-navbar.link href="{{route('contact')}}" >Contact</x-navbar.link>
                        <x-navbar.link href="{{route('gallery')}}" >Gallery</x-navbar.link>
                        <x-navbar.link href="{{route('users.index')}}" >User</x-navbar.link>
                        @auth
                            <x-navbar.link href="#" >{{auth()->user()->email}}</x-navbar.link>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <x-button type="submit">Logout</x-button>
                            </form>
                        @else
                            <x-navbar.link href="{{route('login')}}" >Login</x-navbar.link>

                        @endauth
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <x-navbar.dropdown-item href="{{route('home')}}" >Home</x-navbar.dropdown-item>
            <x-navbar.dropdown-item href="{{route('about')}}" >About</x-navbar.dropdown-item>
            <x-navbar.dropdown-item href="{{route('contact')}}" >Contact</x-navbar.dropdown-item>
            <x-navbar.dropdown-item href="{{route('gallery')}}" >Gallery</x-navbar.dropdown-item>
            <x-navbar.dropdown-item href="{{route('users.index')}}" >Users</x-navbar.dropdown-item>
            @auth
                <x-navbar.dropdown-item href="{{route('login')}}" >
                    {{auth()->user()->email}}
                </x-navbar.dropdown-item>

            @else
                <x-navbar.dropdown-item href="{{route('login')}}" >Login</x-navbar.dropdown-item>

            @endauth
        </div>
    </div>
</nav>
