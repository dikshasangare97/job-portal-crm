<div class="bg-white px-5 py-10 border border-blue-500 mr-3 rounded-xl shadow-md">

    <h2 class="font-semibold text-lg">All Filters</h2>
    <hr class="my-3">

    <!-- work mode -->
    <div x-data="{ workModeOpen: true }">
        <div @click="workModeOpen = !workModeOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
            <div class='w-5/6 items-center font-bold text-black py-3'>
                <button class="hover:underline"> Work Mode</button>
            </div>
            <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': workModeOpen,' -translate-y-0.0': !workModeOpen }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
        </div>
        <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="workModeOpen" x-collapse x-collapse.duration.500ms>
            <ul class="text-gray-500 text-sm">
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="from_office">
                    <label class="ml-2" for="from_office">Work from office</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="remote">
                    <label class="ml-2" for="remote">Remote</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="hybrid">
                    <label class="ml-2" for="hybrid">Hybrid</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="from_home">
                    <label class="ml-2" for="from_home">Temp. WFH</label>
                </li>
            </ul>
        </div>
    </div>

    <hr class="my-3">

    <!-- department -->
    <div x-data="{ workModeOpen: true }">
        <div @click="workModeOpen = !workModeOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
            <div class='w-5/6 items-center font-bold text-black py-3'>
                <button class="hover:underline">Department</button>
            </div>
            <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': workModeOpen,' -translate-y-0.0': !workModeOpen }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
        </div>
        <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="workModeOpen" x-collapse x-collapse.duration.500ms>
            <ul class="text-gray-500 text-sm">
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="from_office">
                    <label class="ml-2" for="from_office">Work from office</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="remote">
                    <label class="ml-2" for="remote">Remote</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="hybrid">
                    <label class="ml-2" for="hybrid">Hybrid</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="from_home">
                    <label class="ml-2" for="from_home">Temp. WFH</label>
                </li>
            </ul>
        </div>
    </div>

    <hr class="my-3">

    <!-- Location -->
    <div x-data="{ workModeOpen: true }">
        <div @click="workModeOpen = !workModeOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
            <div class='w-5/6 items-center font-bold text-black py-3'>
                <button class="hover:underline">Location</button>
            </div>
            <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': workModeOpen,' -translate-y-0.0': !workModeOpen }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
        </div>
        <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="workModeOpen" x-collapse x-collapse.duration.500ms>
            <ul class="text-gray-500 text-sm">
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="from_office">
                    <label class="ml-2" for="from_office">Work from office</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="remote">
                    <label class="ml-2" for="remote">Remote</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="hybrid">
                    <label class="ml-2" for="hybrid">Hybrid</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="from_home">
                    <label class="ml-2" for="from_home">Temp. WFH</label>
                </li>
            </ul>
        </div>
    </div>

    <hr class="my-3">

    <!-- Location -->
    <div x-data="{ workModeOpen: true }">
        <div @click="workModeOpen = !workModeOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
            <div class='w-5/6 items-center font-bold text-black py-3'>
                <button class="hover:underline">Salary</button>
            </div>
            <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': workModeOpen,' -translate-y-0.0': !workModeOpen }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
        </div>
        <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="workModeOpen" x-collapse x-collapse.duration.500ms>
            <ul class="text-gray-500 text-sm">
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="from_office">
                    <label class="ml-2" for="from_office">Work from office</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="remote">
                    <label class="ml-2" for="remote">Remote</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="hybrid">
                    <label class="ml-2" for="hybrid">Hybrid</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="from_home">
                    <label class="ml-2" for="from_home">Temp. WFH</label>
                </li>
            </ul>
        </div>
    </div>

    <hr class="my-3">

    <!-- company type -->
    <div x-data="{ workModeOpen: true }">
        <div @click="workModeOpen = !workModeOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
            <div class='w-5/6 items-center font-bold text-black py-3'>
                <button class="hover:underline">Company Type</button>
            </div>
            <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': workModeOpen,' -translate-y-0.0': !workModeOpen }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
        </div>
        <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="workModeOpen" x-collapse x-collapse.duration.500ms>
            <ul class="text-gray-500 text-sm">
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="from_office">
                    <label class="ml-2" for="from_office">Work from office</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="remote">
                    <label class="ml-2" for="remote">Remote</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="hybrid">
                    <label class="ml-2" for="hybrid">Hybrid</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="from_home">
                    <label class="ml-2" for="from_home">Temp. WFH</label>
                </li>
            </ul>
        </div>
    </div>

    <hr class="my-3">

    <!-- role category -->
    <div x-data="{ workModeOpen: true }">
        <div @click="workModeOpen = !workModeOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
            <div class='w-5/6 items-center font-bold text-black py-3'>
                <button class="hover:underline">Role Category</button>
            </div>
            <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': workModeOpen,' -translate-y-0.0': !workModeOpen }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
        </div>
        <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="workModeOpen" x-collapse x-collapse.duration.500ms>
            <ul class="text-gray-500 text-sm">
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="from_office">
                    <label class="ml-2" for="from_office">Work from office</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="remote">
                    <label class="ml-2" for="remote">Remote</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="hybrid">
                    <label class="ml-2" for="hybrid">Hybrid</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="from_home">
                    <label class="ml-2" for="from_home">Temp. WFH</label>
                </li>
            </ul>
        </div>
    </div>

    <hr class="my-3">

    <!-- education -->
    <div x-data="{ workModeOpen: true }">
        <div @click="workModeOpen = !workModeOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
            <div class='w-5/6 items-center font-bold text-black py-3'>
                <button class="hover:underline">Education</button>
            </div>
            <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': workModeOpen,' -translate-y-0.0': !workModeOpen }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
        </div>
        <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="workModeOpen" x-collapse x-collapse.duration.500ms>
            <ul class="text-gray-500 text-sm">
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="from_office">
                    <label class="ml-2" for="from_office">Work from office</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="remote">
                    <label class="ml-2" for="remote">Remote</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="hybrid">
                    <label class="ml-2" for="hybrid">Hybrid</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="from_home">
                    <label class="ml-2" for="from_home">Temp. WFH</label>
                </li>
            </ul>
        </div>
    </div>

    <hr class="my-3">

    <!-- industry -->
    <div x-data="{ workModeOpen: true }">
        <div @click="workModeOpen = !workModeOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
            <div class='w-5/6 items-center font-bold text-black py-3'>
                <button class="hover:underline">Industry</button>
            </div>
            <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': workModeOpen,' -translate-y-0.0': !workModeOpen }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
        </div>
        <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="workModeOpen" x-collapse x-collapse.duration.500ms>
            <ul class="text-gray-500 text-sm">
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="from_office">
                    <label class="ml-2" for="from_office">Work from office</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="remote">
                    <label class="ml-2" for="remote">Remote</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="hybrid">
                    <label class="ml-2" for="hybrid">Hybrid</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" name="work_mode" id="from_home">
                    <label class="ml-2" for="from_home">Temp. WFH</label>
                </li>
            </ul>
        </div>
    </div>

    <hr class="my-3">


</div>