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
                    <input type="checkbox" wire:model="work_mode" id="from_office">
                    <label class="ml-2" for="from_office">Work from office</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" wire:model="work_mode" id="remote">
                    <label class="ml-2" for="remote">Remote</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" wire:model="work_mode" id="hybrid">
                    <label class="ml-2" for="hybrid">Hybrid</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" wire:model="work_mode" id="from_home">
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
                    <input type="checkbox" wire:model="department" id="from_office">
                    <label class="ml-2" for="from_office">Work from office</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" wire:model="department" id="remote">
                    <label class="ml-2" for="remote">Remote</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" wire:model="department" id="hybrid">
                    <label class="ml-2" for="hybrid">Hybrid</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" wire:model="department" id="from_home">
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
                @foreach($locations as $location)
                <li class="py-1">
                    <input type="checkbox" wire:model="location" value="{{ $location->id }}" id="location_{{ $location->id }}">
                    <label class="ml-2" for="location_{{ $location->id }}">{{$location->city_name}}</label>
                </li>
                @endforeach
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
                    <input type="checkbox" wire:model="salary" id="from_office">
                    <label class="ml-2" for="from_office">Work from office</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" wire:model="salary" id="remote">
                    <label class="ml-2" for="remote">Remote</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" wire:model="salary" id="hybrid">
                    <label class="ml-2" for="hybrid">Hybrid</label>
                </li>
                <li class="py-1">
                    <input type="checkbox" wire:model="salary" id="from_home">
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
                @foreach($company_types as $company_type)
                <li class="py-1">
                    <input type="checkbox" wire:model="company_type" value="{{ $company_type->id }}" id="company_type_{{ $company_type->id }}">
                    <label class="ml-2" for="company_type_{{ $company_type->id }}">{{$company_type->company_type_name}}</label>
                </li>
                @endforeach
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
                @foreach($role_categories as $role_category)
                <li class="py-1">
                    <input type="checkbox" wire:model="work_mode" value="{{ $role_category->id }}" id="role_category_{{ $role_category->id }}">
                    <label class="ml-2" for="role_category_{{ $role_category->id }}">{{$role_category->role_name}}</label>
                </li>
                @endforeach
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
                @foreach($educations as $education)
                <li class="py-1">
                    <input type="checkbox" wire:model="work_mode" value="{{ $education->id }}" id="education_{{ $education->id }}">
                    <label class="ml-2" for="education_{{ $education->id }}">{{$education->education_name}}</label>
                </li>
                @endforeach
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
                @foreach($industries as $industry)
                <li class="py-1">
                    <input type="checkbox" wire:model="work_mode" value="{{ $industry->id }}" id="industry_{{ $industry->id }}">
                    <label class="ml-2" for="industry_{{ $industry->id }}">{{$industry->industry_name}}</label>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <hr class="my-3">


</div>