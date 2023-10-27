<div>
    <div class="bg-gray-100">
        <div class="container mx-auto my-5 p-5">
            <div class="w-full text-black bg-white shadow-lg rounded-xl">
                <div class="flex flex-col md:flex-row">
                    <div class="w-full md:w-1/6 p-6 my-auto">
                        <livewire:user.profile.user-profile-image />
                    </div>
                    <div class="w-full md:w-3/6 p-10">
                        <h3 class="text-2xl font-bold capitalize">{{ Auth::user()->name ?? '-' }}</h3>
                        <h4 class="text-sm font-bold capitalize text-slate-600">{{ Auth::user()->designation ?? '-' }}</h4>
                        <p class="text-sm  text-slate-500">at <span class="font-semibold capitalize">{{ Auth::user()->company_name ?? '-' }}</span></p>
                        <div class="border-b my-5"></div>
                        <div class="flex">
                            <div class="w-full md:w-1/2 border-r">
                                <div class="flex text-sm  text-slate-500 font-normal py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2 mt-0.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                    </svg>
                                    <p>{{ Auth::user()->contact_number ?? '-' }}</p>
                                </div>

                                <div class="flex text-sm  text-slate-500 font-normal py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2 mt-0.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                    <p>{{ Auth::user()->street_address  ?? '-' }}
                                        @if(Auth::user()->pin_code != null)
                                        , {{ Auth::user()->pin_code ?? '' }}
                                        @endif
                                    </p>
                                </div>

                            </div>
                            <div class="w-full md:w-1/2 pl-3">
                                <div class="flex text-sm  text-slate-500 font-normal py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2 mt-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                    <p>{{ Auth::user()->email ?? '-' }}</p>
                                </div>

                                <div class="flex text-sm  text-slate-500 font-normal py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2 mt-0.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                                    </svg>

                                    <p>{{ Auth::user()->designation ?? '-' }}</p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>