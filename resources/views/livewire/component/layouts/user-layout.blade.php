<div>
    <div class="bg-white">
        <header class="">
            <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="/" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button" id="nav-toggle" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12 text-end">
                    @if (Route::has('login'))
                    @auth
                    @if(Auth::user()->is_user == 0)
                    <!-- for recruiter -->
                    <!-- <a class="text-sm font-semibold leading-6 text-blue-900 px-2 py-2 rounded-lg  hover:bg-blue-100 focus:outline-none focus:bg-blue-100 transition duration-150 ease-in-out" href="#">
                        {{ __('About us') }}
                    </a>
                    <a class="text-sm font-semibold leading-6 text-blue-900 px-2 py-2 rounded-lg  hover:bg-blue-100 focus:outline-none focus:bg-blue-100 transition duration-150 ease-in-out" href="#">
                        {{ __('Contact us')}}
                    </a> -->

                    <a class="text-sm font-semibold leading-6 text-blue-900 px-2 py-2 rounded-lg  hover:bg-blue-100 focus:outline-none focus:bg-blue-100 transition duration-150 ease-in-out" href="/recruiter/jobs">
                        {{ __('Jobs')}}
                    </a>
                    @else
                    <!-- for user -->
                    <a class="text-sm font-semibold leading-6 text-blue-900 px-2 py-2 rounded-lg  hover:bg-blue-100 focus:outline-none focus:bg-blue-100 transition duration-150 ease-in-out" href="/user/myapply">
                        {{ __('Application Status')}}
                    </a>
                    @endif

                    @endauth
                    @endif
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    @if (Route::has('login'))
                    <div class="">
                        @auth
                        <div class="flex">
                            <div class="">
                                @if(Auth::user()->is_user == 0)
                                <!-- for recruiter -->
                                @elseif(Auth::user()->is_user == 2)
                                <!-- for admin -->
                                @else
                                <!-- for user -->
                                <form wire:submit="searchJobResult">
                                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                                    <div class="relative">
                                        <input type="search" wire:model="search_input" id="default-search" class="block w-64 py-3 pl-2 text-sm text-gray-900 border rounded-full border-gray-300 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 focus:outline-none" placeholder="Search job here..." required>
                                        <button type="submit" class="text-white absolute right-2.5 bottom-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-2 py-2 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                                @endif
                            </div>
                            <div class="">
                                <button class="text-sm font-semibold leading-6 text-gray-900 px-2 py-2 rounded-lg  hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" type="button" data-dropdown-toggle="dropdown">{{ Auth::user()->name}}
                                    <span aria-hidden="true">&#9662;</span>
                                </button>
                                <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
                                    <div class="px-4 py-3">
                                        <span class="block text-sm">{{ Auth::user()->name}}</span>
                                        <span class="block text-sm font-medium text-gray-900 truncate">{{ Auth::user()->email}}</span>
                                    </div>
                                    <ul class="py-1" aria-labelledby="dropdown">
                                        <li>
                                            <a href="/user/profile" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Profile</a>
                                        </li>
                                        <li>
                                            <a href="/change-password" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Change Password</a>
                                        </li>
                                        <li class="border-t">
                                            <livewire:component.logout />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @else
                        <!-- for user login -->
                        <a class="text-sm font-semibold leading-6 text-blue-900 px-2 py-2 rounded-lg  hover:bg-blue-100 focus:outline-none focus:bg-blue-100 transition duration-150 ease-in-out" href="/login">
                            {{ __('Log in')}} <span aria-hidden="true">&rarr;</span>
                        </a>

                        @if (Route::has('register'))
                        <a class="text-sm font-semibold leading-6 text-blue-900 px-2 py-2 rounded-lg  hover:bg-blue-100 focus:outline-none focus:bg-blue-100 transition duration-150 ease-in-out" href="/register">
                            {{ __('Sign up')}} <span aria-hidden="true">&rarr;</span>
                        </a>
                        @endif
                        <!-- for recruiter login -->
                        <a class="text-sm font-semibold leading-6 text-blue-900 px-2 py-2 rounded-lg  hover:bg-blue-100 focus:outline-none focus:bg-blue-100 transition duration-150 ease-in-out" href="/recruiter-login">
                            {{ __('Recruiter Login')}} <span aria-hidden="true">&rarr;</span>
                        </a>

                        @endauth
                    </div>
                    @endif
                </div>
            </nav>
            <!-- Mobile menu, show/hide based on menu open state. -->
            <div class="hidden lg:hidden " role="dialog" aria-modal="true" id="nav-content">
                <div class="fixed inset-0 z-10"></div>
                <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                        </a>
                        <button type="button" id="colse-nav-btn" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root" id="colse-nav-content">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="space-y-2 py-6">
                                @if (Route::has('login'))
                                @auth

                                @if(Auth::user()->is_user == 0)
                                <!-- for recruiter -->
                                <!-- <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ __('About us') }}</a>
                                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ __('Contact us')}}</a> -->

                                <a class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" href="/recruiter/jobs">
                                    {{ __('Jobs')}}
                                </a>

                                @else

                                <!-- for user -->
                                <a class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" href="/user/myapply">
                                    {{ __('Application Status')}}
                                </a>
                                <form wire:submit="searchJobResult">
                                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                                    <div class="flex">
                                        <input type="search" wire:model="search_input" id="default-search" class="block w-auto py-3 pl-2 text-sm text-gray-900 border rounded-full border-gray-300 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 focus:outline-none" placeholder="Search job here..." required>
                                        <button type="submit" class="text-white ml-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-2 py-2 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </button>
                                    </div>

                                </form>
                                @endif

                                @endauth
                                @endif
                            </div>
                            <div class="py-6">
                                @if (Route::has('login'))
                                <div class="">
                                    @auth
                                    <button class="bg-gray-300 text-sm font-semibold leading-6 text-gray-900 px-2 py-2 rounded-lg  hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" type="button" data-dropdown-toggle="mobile-dropdown">{{ Auth::user()->name}}
                                        <span aria-hidden="true">&#9662;</span>
                                    </button>
                                    <div class="hidden bg-gray-200 text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="mobile-dropdown">
                                        <div class="px-4 py-3">
                                            <span class="block text-sm">{{ Auth::user()->name}}</span>
                                            <span class="block text-sm font-medium text-gray-900 truncate">{{ Auth::user()->email}}</span>
                                        </div>
                                        <ul class="py-1" aria-labelledby="mobile-dropdown">
                                            <li>
                                                <a href="/user/profile" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Profile</a>
                                            </li>
                                            <li>
                                                <livewire:component.logout />
                                            </li>
                                        </ul>
                                    </div>
                                    @else
                                    <!-- user login -->
                                    <a href="/login" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ __('Log in')}} <span aria-hidden="true">&rarr;</span></a>

                                    @if (Route::has('register'))
                                    <a href="/register" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ __('Sign up')}} <span aria-hidden="true">&rarr;</span></a>
                                    @endif

                                    <!-- for recruiter login -->
                                    <a class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" href="/recruiter-login">
                                        {{ __('Recruiter Login')}} <span aria-hidden="true">&rarr;</span>
                                    </a>
                                    @endauth
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <script>
        // Javascript to toggle the menu
        document.getElementById('nav-toggle').onclick = function() {
            document.getElementById("nav-content").classList.toggle("hidden");
        }
        // close navbar for mobile
        document.getElementById('colse-nav-btn').onclick = function() {
            document.getElementById("nav-content").classList.toggle("hidden");
        }
    </script>

</div>