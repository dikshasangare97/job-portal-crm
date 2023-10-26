<div class="flex">
    <div class="w-1/4">

        <div class="bg-white px-5 py-10 border border-blue-500 mr-3 rounded-xl shadow-md">

            <div class="flex">
                <div class="w-4/6">
                    <h2 class="font-semibold text-lg">All Filters</h2>
                </div>
                @if($clearFilterBtn)
                <div>
                    <button wire:click="clearFilter()" class="bg-blue-600 text-white px-2 py-2 rounded-lg text-xs">Clear Filter</button>
                </div>
                @endif
            </div>
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
                        @foreach($workmodes as $workmode)
                        <li class="py-1">
                            <input type="checkbox" wire:model="selectedWorkmodes" wire:click="toggleWorkmode({{ $workmode->id }})" value="{{ $workmode->work_mode_name }}" id="workmode_{{ $workmode->id }}">
                            <label class="ml-2" for="workmode_{{ $workmode->id }}">{{$workmode->work_mode_name}}</label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <hr class="my-3">
            <!-- Experience -->
            <div x-data="{ experienceOpen: true }">
                <div @click="experienceOpen = !experienceOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
                    <div class='w-5/6 items-center font-bold text-black py-3'>
                        <button class="hover:underline">Experience</button>
                    </div>
                    <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': experienceOpen,' -translate-y-0.0': !experienceOpen }">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>
                <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="experienceOpen" x-collapse x-collapse.duration.500ms>
                    <ul class="text-gray-500 text-sm">
                        @foreach($experiences as $experience)
                        <li class="py-1">
                            <input type="checkbox" wire:model="selectedExperiences" wire:click="toggleExperience({{ $experience->id }})" value="{{ $experience->experience }}" id="experience_{{ $experience->id }}">
                            <label class="ml-2" for="experience_{{ $experience->id }}">{{$experience->experience}}</label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <hr class="my-3">
            <!-- department -->
            <div x-data="{ departmentOpen: true }">
                <div @click="departmentOpen = !departmentOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
                    <div class='w-5/6 items-center font-bold text-black py-3'>
                        <button class="hover:underline">Department</button>
                    </div>
                    <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': departmentOpen,' -translate-y-0.0': !departmentOpen }">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>
                <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="departmentOpen" x-collapse x-collapse.duration.500ms>
                    <ul class="text-gray-500 text-sm">
                        @foreach($departments as $department)
                        <li class="py-1">
                            <input type="checkbox" wire:model="selectedDepartments" wire:click="toggleDepartment({{ $department->id }})" value="{{ $department->department_name }}" id="department_{{ $department->id }}">
                            <label class="ml-2" for="department_{{ $department->id }}">{{$department->department_name}}</label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <hr class="my-3">

            <!-- Location -->
            <div x-data="{ locationOpen: true }">
                <div @click="locationOpen = !locationOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
                    <div class='w-5/6 items-center font-bold text-black py-3'>
                        <button class="hover:underline">Location</button>
                    </div>
                    <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': locationOpen,' -translate-y-0.0': !locationOpen }">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>
                <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="locationOpen" x-collapse x-collapse.duration.500ms>
                    <ul class="text-gray-500 text-sm">
                        @foreach($locations as $location)
                        <li class="py-1">
                            <input type="checkbox" wire:model="selectedLocations" wire:click="toggleLocation({{ $location->id }})" value="{{ $location->city_name }}" id="location_{{ $location->id }}">
                            <label class="ml-2" for="location_{{ $location->id }}">{{$location->city_name}}</label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <hr class="my-3">

            <!-- salary -->
            <div x-data="{ salaryOpen: true }">
                <div @click="salaryOpen = !salaryOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
                    <div class='w-5/6 items-center font-bold text-black py-3'>
                        <button class="hover:underline">Salary</button>
                    </div>
                    <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': salaryOpen,' -translate-y-0.0': !salaryOpen }">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>
                <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="salaryOpen" x-collapse x-collapse.duration.500ms>
                    <ul class="text-gray-500 text-sm">
                        @foreach($salaries as $salary)
                        <li class="py-1">
                            <input type="checkbox" wire:model="selectedSalary" wire:click="toggleSalary({{ $salary->id }})" value="{{ $salary->salary_to }}-{{ $salary->salary_from }}" id="salary_{{ $salary->id }}">
                            <label class="ml-2" for="salary_{{ $salary->id }}">{{ $this->formatNumber($salary->salary_to) }} - {{ $this->formatNumber($salary->salary_from) }}</label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <hr class="my-3">

            <!-- company type -->
            <div x-data="{ companyTypeOpen: true }">
                <div @click="companyTypeOpen = !companyTypeOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
                    <div class='w-5/6 items-center font-bold text-black py-3'>
                        <button class="hover:underline">Company Type</button>
                    </div>
                    <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': companyTypeOpen,' -translate-y-0.0': !companyTypeOpen }">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>
                <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="companyTypeOpen" x-collapse x-collapse.duration.500ms>
                    <ul class="text-gray-500 text-sm">
                        @foreach($company_types as $company_type)
                        <li class="py-1">
                            <input type="checkbox" wire:model="selectedCompanyTypes" wire:click="toggleCompanyType({{ $company_type->id }})" value="{{ $company_type->company_type_name }}" id="company_type_{{ $company_type->id }}">
                            <label class="ml-2" for="company_type_{{ $company_type->id }}">{{$company_type->company_type_name}}</label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <hr class="my-3">

            <!-- role category -->
            <div x-data="{ roleCategoryOpen: true }">
                <div @click="roleCategoryOpen = !roleCategoryOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
                    <div class='w-5/6 items-center font-bold text-black py-3'>
                        <button class="hover:underline">Role Category</button>
                    </div>
                    <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': roleCategoryOpen,' -translate-y-0.0': !roleCategoryOpen }">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>
                <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="roleCategoryOpen" x-collapse x-collapse.duration.500ms>
                    <ul class="text-gray-500 text-sm">
                        @foreach($role_categories as $role_category)
                        <li class="py-1">
                            <input type="checkbox" wire:model="selectedRoleCategories" wire:click="toggleRoleCategory({{ $role_category->id }})" value="{{ $role_category->role_name }}" id="role_category_{{ $role_category->id }}">
                            <label class="ml-2" for="role_category_{{ $role_category->id }}">{{$role_category->role_name}}</label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <hr class="my-3">

            <!-- education -->
            <div x-data="{ educationOpen: true }">
                <div @click="educationOpen = !educationOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
                    <div class='w-5/6 items-center font-bold text-black py-3'>
                        <button class="hover:underline">Education</button>
                    </div>
                    <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': educationOpen,' -translate-y-0.0': !educationOpen }">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>
                <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="educationOpen" x-collapse x-collapse.duration.500ms>
                    <ul class="text-gray-500 text-sm">
                        @foreach($educations as $education)
                        <li class="py-1">
                            <input type="checkbox" wire:model="selectedEducations" wire:click="toggleEducation({{ $education->id }})" value="{{ $education->education_name }}" id="education_{{ $education->id }}">
                            <label class="ml-2" for="education_{{ $education->id }}">{{$education->education_name}}</label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <hr class="my-3">

            <!-- industry -->
            <div x-data="{ industryOpen: true }">
                <div @click="industryOpen = !industryOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
                    <div class='w-5/6 items-center font-bold text-black py-3'>
                        <button class="hover:underline">Industry</button>
                    </div>
                    <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': industryOpen,' -translate-y-0.0': !industryOpen }">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>
                <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="industryOpen" x-collapse x-collapse.duration.500ms>
                    <ul class="text-gray-500 text-sm">
                        @foreach($industries as $industry)
                        <li class="py-1">
                            <input type="checkbox" wire:model="selectedIndustries" wire:click="toggleIndustry({{ $industry->id }})" value="{{ $industry->industry_name }}" id="industry_{{ $industry->id }}">
                            <label class="ml-2" for="industry_{{ $industry->id }}">{{$industry->industry_name}}</label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <hr class="my-3">

            <!-- posted by -->
            <div x-data="{ postedByOpen: true }">
                <div @click="postedByOpen = !postedByOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
                    <div class='w-5/6 items-center font-bold text-black py-3'>
                        <button class="hover:underline">Posted By</button>
                    </div>
                    <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': postedByOpen,' -translate-y-0.0': !postedByOpen }">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>
                <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="postedByOpen" x-collapse x-collapse.duration.500ms>
                    <ul class="text-gray-500 text-sm">
                        @foreach($posted_bies as $posted_by)
                        <li class="py-1">
                            <input type="checkbox" wire:model="selectedPostedBy" wire:click="togglePostedJob({{ $posted_by->id }})" value="{{ $posted_by->posted_by_name }}" id="posted_{{ $posted_by->id }}">
                            <label class="ml-2" for="posted_{{ $posted_by->id }}">{{$posted_by->posted_by_name}}</label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <hr class="my-3">
            <!-- freshness -->
            <div x-data="{ freshnessOpen: true }">
                <div @click="freshnessOpen = !freshnessOpen" class='flex items-center text-gray-600 w-full  overflow-hidden mt-32 md:mt-0  mx-auto'>
                    <div class='w-5/6 items-center font-bold text-black py-3'>
                        <button class="hover:underline">Freshness</button>
                    </div>
                    <div class=' text-end transform transition duration-300 ease-in-out' :class="{'rotate-180': freshnessOpen,' -translate-y-0.0': !freshnessOpen }">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>
                <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out " x-cloak x-show="freshnessOpen" x-collapse x-collapse.duration.500ms>
                    <ul class="text-gray-500 text-sm">

                        @foreach($freshnesses as $freshness)
                        <li class="py-1">
                            <input type="checkbox" wire:model="selectedFreshnesses" wire:click="toggleFreshness({{$freshness->id}})" value="{{$freshness->last_day_number}} day" id="freshness_{{ $freshness->id }}">
                            <label class="ml-2" for="freshness_{{ $freshness->id }}">Last {{$freshness->last_day_number}} day</label>
                        </li>
                        @endforeach

                        <!-- <li class="py-1">
                            <input type="checkbox" wire:model="selectedFreshnesses" wire:click="toggleFreshness(1)" value="1 day" id="freshness_1">
                            <label class="ml-2" for="freshness_1">Last 1 day</label>
                        </li>

                        <li class="py-1">
                            <input type="checkbox" wire:model="selectedFreshnesses" wire:click="toggleFreshness(3)" value="3 day" id="freshness_3">
                            <label class="ml-2" for="freshness_3">Last 3 day</label>
                        </li>

                        <li class="py-1">
                            <input type="checkbox" wire:model="selectedFreshnesses" wire:click="toggleFreshness(7)" value="7 day" id="freshness_7">
                            <label class="ml-2" for="freshness_7">Last 7 day</label>
                        </li>
                        <li class="py-1">
                            <input type="checkbox" wire:model="selectedFreshnesses" wire:click="toggleFreshness(15)" value="15 day" id="freshness_15">
                            <label class="ml-2" for="freshness_15">Last 15 day</label>
                        </li>
                        <li class="py-1">
                            <input type="checkbox" wire:model="selectedFreshnesses" wire:click="toggleFreshness(30)" value="30 day" id="freshness_30">
                            <label class="ml-2" for="freshness_30">Last 30 day</label>
                        </li> -->
                    </ul>
                </div>
            </div>

            <hr class="my-3">
        </div>
    </div>
    <div class="w-2/4">
        @if(isset($getPostedjobs) && $getPostedjobs->count() > 0)

        @foreach ($getPostedjobs as $getPostedjob)

        <div class="flex bg-white shadow-lg rounded-xl mb-2 max-w-full ">
            <div class="flex items-start px-4 py-6">
                <a href="/job/{{$getPostedjob->id}}/view" target="_blank">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{$getPostedjob->job_headline}} </h2>
                    </div>
                    <p class="text-gray-700">{{$getPostedjob->company_name}} </p>

                    <div class="mt-4 flex items-center">
                        <div class="flex text-gray-700 text-sm mr-3 border-r pr-3">
                            <svg class="w-4 h-4 mr-1 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                            </svg>
                            <span>{{$getPostedjob->work_experience}} Yrs</span>
                        </div>
                        <div class="flex text-gray-700 text-sm mr-8 border-r pr-3">
                            <span class="text-lg mr-1"> ₹ </span>
                            <span class="pt-1">
                                @if($getPostedjob->salary_hide_status == 1)
                                Not disclosed
                                @else
                                {{$getPostedjob->annual_salary}}
                                @endif
                            </span>
                        </div>
                        <div class="flex text-gray-700 text-sm mr-4">
                            <svg class="w-4 h-4 mr-1 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <span>{{$getPostedjob->location->city_name}}</span>
                        </div>
                    </div>

                    <div class="flex mt-3 text-gray-700">
                        <svg class="w-4 h-4 mr-1 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                        <p class="text-sm mt-1"> {{$getPostedjob->education->education_name}} </p>
                    </div>

                    <div class="flex mt-3 text-gray-700">
                        <svg class="w-6 h-6 mr-1 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                        </svg>
                        <p class="text-sm">
                            {{$getPostedjob->job_description}}
                        </p>
                    </div>
                    <p class="mt-1 text-gray-700 text-sm">
                        {{$getPostedjob->key_skill}}
                    </p>
                    <p class="mt-3 text-gray-500 text-xs">
                        @php
                        $date = Carbon\Carbon::parse($getPostedjob->created_at);
                        $now = Carbon\Carbon::now();
                        $diff = $date->diffInDays($now);
                        @endphp

                        @if($diff >= 30)
                        30+
                        @else
                        {{$diff}}
                        @endif
                        Days Ago
                    </p>
                    <div class="flex mt-5">
                        <p class="mt-2">
                            <a href="/job/{{$getPostedjob->id}}/view" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2.5 px-4 border border-blue-500 hover:border-transparent rounded" target="_blank"> View&nbsp;Detail
                            </a>
                        </p>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        <p>{{ $getPostedjobs->links() }}</p>
        @else

        <div class="flex items-center justify-center bg-white shadow-lg rounded-xl mb-2 max-w-full ">
            <div class="py-20">
                <p class="px-auto py-auto font-bold text-2xl">No Job Found!!!</p>
            </div>
        </div>

        @endif

    </div>
</div>