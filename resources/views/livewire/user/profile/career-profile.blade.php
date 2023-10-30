<div class="bg-white p-5 shadow-sm rounded-xl">

    <div>
        @if (session()->has('careerprofilemessage'))
        <div class="flex items-center p-4 mb-4 text-sm border-b border-lime-400" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5 text-lime-400">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-lime-400">Success</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('careerprofilemessage') }}</span>
            </div>
        </div>
        @endif
        @if (session()->has('error'))
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-b border-red-700" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-gray-800">Error</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('error') }}</span>
            </div>
        </div>
        @endif
    </div>

    <div class="flex">
        <h1 class=" items-center font-semibold text-gray-900 leading-8 text-xl">
            <span class="tracking-wide">Career profile</span>
        </h1>
        <div>
            <button class="inline-flex items-center px-2 py-2 mr-5 text-gray-600 ml-3" data-modal-toggle="career-profile-modal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                </svg>
            </button>

        </div>
    </div>

    <div class="flex my-5">
        <div class="w-1/2">
            <p class="font-normal text-sm text-gray-400">Current industry</p>
            <p class="font-semibold text-md text-gray-700">{{ $userPersonalDetail->industry->industry_name ?? '-' }}</p>
        </div>
        <div class="w-1/2">
            <p class="font-normal text-sm text-gray-400">Department</p>
            <p class="font-semibold text-md text-gray-700">{{ $userPersonalDetail->department->department_name ?? '-' }}</p>
        </div>
    </div>

    <div class="flex my-5">
        <div class="w-1/2">
            <p class="font-normal text-sm text-gray-400">Role category</p>
            <p class="font-semibold text-md text-gray-700">{{ $userPersonalDetail->roleCategory->role_name ?? '-' }}</p>
        </div>
        <div class="w-1/2">
            <p class="font-normal text-sm text-gray-400">Job role</p>
            <p class="font-semibold text-md text-gray-700">{{ $userPersonalDetail->jobRole->job_role_name ?? '-' }}</p>
        </div>
    </div>

    <div class="flex my-5">
        <div class="w-1/2">
            <p class="font-normal text-sm text-gray-400">Desired job type</p>
            <p class="font-semibold text-md text-gray-700">{{ $userPersonalDetail->desired_job_type ?? '-' }}</p>
        </div>
        <div class="w-1/2">
            <p class="font-normal text-sm text-gray-400">Desired employment type</p>
            <p class="font-semibold text-md text-gray-700">{{ $userPersonalDetail->desired_employment_type ?? '-' }}</p>
        </div>
    </div>

    <div class="flex my-5">
        <div class="w-1/2">
            <p class="font-normal text-sm text-gray-400">Preferred shift</p>
            <p class="font-semibold text-md text-gray-700">{{ $userPersonalDetail->preferred_shift ?? '-' }}</p>
        </div>
        <div class="w-1/2">
            <p class="font-normal text-sm text-gray-400">Preferred work location</p>
            <p class="font-semibold text-md text-gray-700">{{ $userPersonalDetail->location->city_name ?? '-' }}</p>
        </div>
    </div>

    <div class="flex my-5">
        <div class="w-1/2">
            <p class="font-normal text-sm text-gray-400">Expected salary</p>
            <p class="font-semibold text-md text-gray-700">
                @if($userPersonalDetail->expected_salary)
                ₹ {{$userPersonalDetail->expected_salary}}
                @else
                -
                @endif
            </p>
        </div>
    </div>


    <!-- headline modal -->
    <div wire:ignore.self id="career-profile-modal" data-modal-show="false" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="text-end pt-5 pr-5">
                    <button data-modal-toggle="career-profile-modal" class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </button>
                </div>
                <form wire:submit="saveCareerDetail">
                    <div class="px-5 pb-2">
                        <h1 class=" items-center font-semibold tracking-wide text-gray-900 leading-8 text-xl pb-2">Career profile</h1>
                        <p class="text-sm text-gray-500 pb-2">This information will help the recruiters know about your current job profile and also your desired job criteria. This will also help us personalize your job recommendations.</p>

                        <div class="my-3">
                            <label for="industry" class="font-semibold text-sm text-gray-700">Current industry <span class="text-red-700">*</span></label>
                            <br>
                            <select wire:model="industry" id="industry" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 ">
                                <option value="">Select industry</option>
                                @foreach($industries as $industry)
                                <option value="{{ $industry->id }}">{{ $industry->industry_name }}</option>
                                @endforeach
                            </select>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('industry') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3">
                            <label for="department" class="font-semibold text-sm text-gray-700">Department <span class="text-red-700">*</span></label>
                            <br>
                            <select wire:model="department" id="department" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 ">
                                <option value="">Select department</option>
                                @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                @endforeach
                            </select>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('department') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3">
                            <label for="role_category" class="font-semibold text-sm text-gray-700">Role category <span class="text-red-700">*</span></label>
                            <br>
                            <select wire:model="role_category" id="role_category" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 ">
                                <option value="">Select role category</option>
                                @foreach($role_categories as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('role_category') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3">
                            <label for="job_role" class="font-semibold text-sm text-gray-700">Job role <span class="text-red-700">*</span></label>
                            <br>
                            <select wire:model="job_role" id="job_role" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 ">
                                <option value="">Select job role</option>
                                @foreach($job_roles as $job_role)
                                <option value="{{ $job_role->id }}">{{ $job_role->job_role_name }}</option>
                                @endforeach
                            </select>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('job_role') {{ $message }} @enderror</div>
                        </div>


                        <div class="my-3">
                            <label class="font-semibold text-sm text-gray-700">Desired job type</label>
                            <br>
                            <div class="flex my-4">
                                <div>
                                    <input id="Permanent" wire:model="desired_job_type" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="Permanent">
                                    <label for="Permanent" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Permanent</label>
                                </div>
                                <div class="ml-10">
                                    <input id="Contractual" wire:model="desired_job_type" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="Contractual">
                                    <label for="Contractual" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Contractual</label>
                                </div>
                            </div>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('desired_job_type') {{ $message }} @enderror</div>
                        </div>


                        <div class="my-3">
                            <label class="font-semibold text-sm text-gray-700">Desired employment type</label>
                            <br>
                            <div class="flex my-4">
                                <div>
                                    <input id="Full-time" wire:model="desired_employment_type" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="Full time">
                                    <label for="Full-time" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Full time</label>
                                </div>
                                <div class="ml-10">
                                    <input id="Part-time" wire:model="desired_employment_type" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="Part time">
                                    <label for="Part-time" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Part time</label>
                                </div>
                            </div>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('desired_employment_type') {{ $message }} @enderror</div>
                        </div>


                        <div class="my-3">
                            <label class="font-semibold text-sm text-gray-700">Preferred shift</label>
                            <br>
                            <div class="flex my-4">
                                <div>
                                    <input id="day" wire:model="preferred_shift" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="Day">
                                    <label for="day" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Day</label>
                                </div>
                                <div class="ml-10">
                                    <input id="night" wire:model="preferred_shift" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="Night">
                                    <label for="night" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Night</label>
                                </div>
                                <div class="ml-10">
                                    <input id="flexible" wire:model="preferred_shift" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="Flexible">
                                    <label for="flexible" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Flexible</label>
                                </div>
                            </div>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('preferred_shift') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3">
                            <label for="preferred_work_location" class="font-semibold text-sm text-gray-700">Preferred work location</label>
                            <br>
                            <select wire:model="preferred_work_location" id="preferred_work_location" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 ">
                                <option value="">Select location</option>
                                @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->city_name }}</option>
                                @endforeach
                            </select>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('preferred_work_location') {{ $message }} @enderror</div>
                        </div>


                        <div class="my-3">
                            <label for="expected_salary" class="font-semibold text-sm text-gray-700">Expected salary</label>
                            <br>
                            <input type="text" wire:model="expected_salary" id="expected_salary" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " wire:keydown.debounce.500ms="validateAndFormatSalary" wire:blur="formatSalary" />
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('expected_salary') {{ $message }} @enderror</div>
                        </div>

                    </div>
                    <div class="flex justify-end p-6 space-x-2">
                        <button data-modal-toggle="career-profile-modal" type="button" class="bg-red-500 ml-3 rounded-lg text-white hover:bg-red-400  border  text-sm font-medium px-2 py-2 ">Cancel</button>
                        <button type="submit" class="px-2 py-2 bg-blue-500 ml-3 rounded-lg text-white hover:bg-blue-400">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- headline modal end -->
</div>