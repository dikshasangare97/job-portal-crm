<div>
    <div class="m-3 p-5 bg-white rounded-b-lg shadow-xl border-t-4 border-blue-400">
        <div class="flex">
            <div class="w-4/6">
                <h1 class="font-semibold text-2xl">Job application status</h1>
                <p class="text-sm text-slate-400 font-normal mt-2">Not getting views on your CV? Highlight your application to get recruiter's attention</p>
            </div>
            <div class="w-2/6">
                <div class="flex">
                    <div class="w-1/2 border-r-4 border-gray-200 flex justify-end pr-3">
                        <span class="text-5xl font-medium">24</span>
                        <span class="text-md text-slate-500 font-semibold px-2 py-1">Total <br> applies</span>
                    </div>
                    <div class="w-1/2 flex">
                        <span class="text-5xl font-medium ml-3">14</span>
                        <span class="text-md text-slate-500 font-semibold py-1 px-2">Application <br> updates</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex m-4 bg-white">






        <!-- component -->
        <!-- <div class='flex items-center justify-center h-96'>
            <ul class="mx-auto grid max-w-full w-full grid-cols-3 gap-x-5 px-8">
                <li class="">
                    <input class="peer sr-only" type="radio" value="yes" name="answer" id="yes" checked />
                    <label class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-4 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:ring-2 peer-checked:ring-indigo-500 transition-all duration-500 ease-in-out" for="yes">Details</label>

                    <div class="absolute bg-white shadow-lg left-0 p-6 border mt-2 border-indigo-300 rounded-lg w-[97vw] mx-auto transition-all duration-500 ease-in-out translate-x-40 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-x-1">
                        Details
                    </div>
                </li>

                <li class="">
                    <input class="peer sr-only" type="radio" value="no" name="answer" id="no" />
                    <label class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-4 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:ring-2 peer-checked:ring-indigo-500 transition-all duration-500 ease-in-out" for="no">About</label>

                    <div class="absolute bg-white shadow-lg left-0 p-6 border mt-2 border-indigo-300 rounded-lg w-[97vw] mx-auto transition-all duration-500 ease-in-out translate-x-40 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-x-1">
                        About
                    </div>
                </li>

                <li class="">
                    <input class="peer sr-only" type="radio" value="yesno" name="answer" id="yesno" />
                    <label class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-4 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:ring-2 peer-checked:ring-indigo-500 transition-all duration-500 ease-in-out " for="yesno">Something</label>

                    <div class="absolute bg-white shadow-lg left-0 p-6 border mt-2 border-indigo-300 rounded-lg w-[97vw] mx-auto transition-all duration-500 ease-in-out translate-x-40 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-x-1">
                        Something
                    </div>
                </li>
            </ul>

        </div> -->




        <div class="flex flex-col justify-center ">
            <section class="py-5 mx-auto space-y-8 sm:py-5">
                <div class="container flex flex-row items-stretch  w-full max-w-4xl space-x-12" x-data="{tab: 1}">
                    <div class="flex flex-col justify-start w-2/6 space-y-4 border-r pr-2 ">

                        <h1 class="font-semibold text-lg mx-auto my-5">Application status</h1>

                        <a class="p-4 text-sm" :class="{'z-20 border-r-2 bg-blue-100 transform translate-x-2 border-blue-500 font-bold': tab === 1, ' transform -translate-x-2': tab !== 1}" href="#" @click.prevent="tab = 1">
                            BATMAN & ROBIN
                        </a>
                        <a class="px-4 py-2 text-sm" :class="{'z-20 border-r-2 bg-blue-100 transform translate-x-2 border-blue-500 font-bold': tab === 2, ' transform -translate-x-2': tab !== 2}" href="#" @click.prevent="tab = 2" @click.prevent="tab = 2">
                            BATMAN V SUPERMAN: DAWN OF JUSTICE (2016)
                        </a>
                        <a class="px-4 py-2 text-sm" :class="{'z-20 border-r-2 bg-blue-100 transform translate-x-2 border-blue-500 font-bold': tab === 3, ' transform -translate-x-2': tab !== 3}" href="#" @click.prevent="tab = 3" @click.prevent="tab = 3">
                            BATMAN FOREVER (1995)
                        </a>
                        <a class="px-4 py-2 text-sm" :class="{'z-20 border-r-2 bg-blue-100 transform translate-x-2 border-blue-500 font-bold': tab === 4, ' transform -translate-x-2': tab !== 4}" href="#" @click.prevent="tab = 4" @click.prevent="tab = 4">
                            BATMAN: THE KILLING JOKE (2016)
                        </a>
                        <a class="px-4 py-2 text-sm" :class="{'z-20 border-r-2 bg-blue-100 transform translate-x-2 border-blue-500 font-bold': tab === 5, ' transform -translate-x-2': tab !== 5}" href="#" @click.prevent="tab = 5" @click.prevent="tab = 5">
                            JUSTICE LEAGUE (2017)
                        </a>
                    </div>
                    <div class="w-3/6">
                        <div class="space-y-6" x-show="tab === 1">
                            <h3 class="text-xl font-bold leading-tight" x-show="tab === 1" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                BATMAN & ROBIN
                            </h3>
                            <p class="text-base text-gray-600" x-show="tab === 1" x-transition:enter="transition delay-100 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Rottentomatoes 12%
                            </p>
                            <p class="text-xl" x-show="tab === 1" x-transition:enter="transition delay-200 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Batman & Robin try to keep their relationship together even as they must stop Mr. Freeze and Poison Ivy from...
                            </p>
                            <p class="text-base" x-show="tab === 1" x-transition:enter="transition delay-300 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Is this the right batman for me?
                            </p>
                            <a href="https://twitter.com/smilesharks" class="inline-flex items-center justify-center px-8 pt-3 pb-2 mt-4 text-lg text-center text-white no-underline bg-blue-500 border-blue-500 cursor-pointer hover:bg-gray-900 rounded-3xl hover:text-white focus-within:bg-blue-500 focus-within:border-blue-500 focus-within:text-white sm:text-base lg:text-lg" class="text-base" x-show="tab === 1" x-transition:enter="transition delay-500 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Learn more
                            </a>
                        </div>

                        <div class="space-y-6" x-show="tab === 2">
                            <h3 class="text-xl font-bold leading-tight" x-show="tab === 2" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                BATMAN V SUPERMAN: DAWN OF JUSTICE (2016)
                            </h3>
                            <p class="text-base text-gray-600" x-show="tab === 2" x-transition:enter="transition delay-100 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Rottentomatoes 40%
                            </p>
                            <p class="text-xl" x-show="tab === 2" x-transition:enter="transition delay-200 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Batman (Ben Affleck) and Superman (Henry Cavill) share the screen in this Warner Bros./DC Entertainment co-production penned by David S....
                            </p>
                            <p class="text-base" x-show="tab === 2" x-transition:enter="transition delay-300 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Is this the right batman for me?
                            </p>
                            <a href="https://twitter.com/smilesharks" class="inline-flex items-center justify-center px-8 pt-3 pb-2 mt-4 text-lg text-center text-white no-underline bg-blue-500 border-blue-500 cursor-pointer hover:bg-gray-900 rounded-3xl hover:text-white focus-within:bg-blue-500 focus-within:border-blue-500 focus-within:text-white sm:text-base lg:text-lg" class="text-base" x-show="tab === 2" x-transition:enter="transition delay-500 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Learn more
                            </a>
                        </div>

                        <div class="space-y-6" x-show="tab === 3">
                            <h3 class="text-xl font-bold leading-tight" x-show="tab === 3" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                BATMAN FOREVER (1995)
                            </h3>
                            <p class="text-base text-gray-600" x-show="tab === 3" x-transition:enter="transition delay-100 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Rottentomatoes 12%
                            </p>
                            <p class="text-xl" x-show="tab === 3" x-transition:enter="transition delay-200 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Rottentomatoes 38%
                            </p>
                            <p class="text-base" x-show="tab === 3" x-transition:enter="transition delay-300 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Is this the right batman for me?
                            </p>
                            <a href="https://twitter.com/smilesharks" class="inline-flex items-center justify-center px-8 pt-3 pb-2 mt-4 text-lg text-center text-white no-underline bg-blue-500 border-blue-500 cursor-pointer hover:bg-gray-900 rounded-3xl hover:text-white focus-within:bg-blue-500 focus-within:border-blue-500 focus-within:text-white sm:text-base lg:text-lg" class="text-base" x-show="tab === 3" x-transition:enter="transition delay-500 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Learn more
                            </a>
                        </div>

                        <div class="space-y-6" x-show="tab === 4">
                            <h3 class="text-xl font-bold leading-tight" x-show="tab === 4" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                BATMAN: THE KILLING JOKE (2016)
                            </h3>
                            <p class="text-base text-gray-600" x-show="tab === 4" x-transition:enter="transition delay-100 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Rottentomatoes 39%
                            </p>
                            <p class="text-xl" x-show="tab === 4" x-transition:enter="transition delay-200 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Fathom Events, Warner Bros. and DC Comics invite you to a premiere event when Batman: The Killing Joke comes to...
                            </p>
                            <p class="text-base" x-show="tab === 4" x-transition:enter="transition delay-300 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Is this the right batman for me?
                            </p>
                            <a href="https://twitter.com/smilesharks" class="inline-flex items-center justify-center px-8 pt-3 pb-2 mt-4 text-lg text-center text-white no-underline bg-blue-500 border-blue-500 cursor-pointer hover:bg-gray-900 rounded-3xl hover:text-white focus-within:bg-blue-500 focus-within:border-blue-500 focus-within:text-white sm:text-base lg:text-lg" class="text-base" x-show="tab === 4" x-transition:enter="transition delay-500 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Learn more
                            </a>
                        </div>

                        <div class="space-y-6" x-show="tab === 5">
                            <h3 class="text-xl font-bold leading-tight" x-show="tab === 5" x-transition:enter="transition duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                JUSTICE LEAGUE (2017)
                            </h3>
                            <p class="text-base text-gray-600" x-show="tab === 5" x-transition:enter="transition delay-100 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Rottentomatoes 40%
                            </p>
                            <p class="text-xl" x-show="tab === 5" x-transition:enter="transition delay-200 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Fueled by his restored faith in humanity and inspired by Superman's selfless act, Bruce Wayne enlists the help of his...
                            </p>
                            <p class="text-base" x-show="tab === 5" x-transition:enter="transition delay-300 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Is this the right batman for me?
                            </p>
                            <a href="https://twitter.com/smilesharks" class="inline-flex items-center justify-center px-8 pt-3 pb-2 mt-4 text-lg text-center text-white no-underline bg-blue-500 border-blue-500 cursor-pointer hover:bg-gray-900 rounded-3xl hover:text-white focus-within:bg-blue-500 focus-within:border-blue-500 focus-within:text-white sm:text-base lg:text-lg" class="text-base" x-show="tab === 5" x-transition:enter="transition delay-500 duration-500 transform ease-in" x-transition:enter-start="opacity-0">
                                Learn more
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>

















        <!-- <div class="w-2/6 m-3 border-r-2">
            <h1 class="font-semibold text-lg">Application status</h1>
            <div class="p-3">

            </div>
        </div>
        <div class="w-4/6 m-3 p-5">
            sxcvbnm,
        </div> -->


    </div>



</div>