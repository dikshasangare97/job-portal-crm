<div>
    <div class="bg-gray-100">
        <div class="container mx-auto my-5 p-5">
            <div class="w-full text-black bg-white shadow-lg rounded-xl">
                <div class="flex">
                    <div class="w-1/4 p-10">
                        <div class="relative  ">
                            <img class="w-20 h-20 rounded-full" src="https://dummyimage.com/500x250" alt="dummy-image">
                            <!-- <button class="absolute top-0 bg-blue-500 text-white p-2 rounded hover:bg-blue-800 m-2">Button</button> -->
                        </div>
                    </div>
                    <div class="w-3/4 p-10">
                        <div class="flex">
                            <h3 class="text-2xl font-bold capitalize">{{ Auth::user()->name }}</h3>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:flex no-wrap md:-mx-2 mt-10">
                <div class="w-full md:w-3/12 md:mx-2">
                    <div class="bg-white p-3 border-t-4 border-blue-400">
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">Quick Links</h1>
                    </div>
                </div>

                <div class="w-full md:w-9/12 mx-2 ">
                    <livewire:user.profile.resume-upload />
                    <div class="my-4"></div>

                    <livewire:user.profile.resume-headline />
                    <div class="my-4"></div>

                    <livewire:user.profile.profile-summary />
                    <div class="my-4"></div>

                </div>
            </div>
        </div>
    </div>
</div>