<div class="flex">
    <div class="bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full">
        <div class="font-medium self-center text-xl sm:text-2xl uppercase text-gray-800">Edit a job details</div>
        <div class="border-b-2 my-3"></div>
        <div class="mt-2">
            @if (session()->has('message'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                <p class="font-bold text-xs">{{ session('message') }}</p>
            </div>
            @endif
            @if (session()->has('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                <p class="font-bold text-xs">{{ session('error') }}</p>
            </div>
            @endif
        </div>
        <div class="mt-5">
            <form wire:submit="update">
                <div class="flex">
                    <div class="w-1/2 mb-6 mr-2">
                        <label for="job_headline" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Job posting headline:</label>
                        <input id="job_headline" type="text" wire:model="job_headline" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Job posting headline" value="{{ $job_detail->job_headline }}" />
                        <div class="text-xs text-red-600 font-bold">@error('job_headline') {{ $message }} @enderror</div>
                    </div>
                    <div class="w-1/2 mb-6 ml-2">
                        <label for="employment_type" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Employment type:</label>
                        <select wire:model="employment_type" id="employment_type" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                            <option value="null">Select employment type</option>
                            <option value="Full-Time Employment">Full-Time Employment</option>
                            <option value="Part-Time Employment">Part-Time Employment</option>
                            <option value="Casual Employment">Casual Employment</option>
                            <option value="Contract Employment">Contract Employment</option>
                            <option value="Apprenticeship">Apprenticeship</option>
                            <option value="Traineeship">Traineeship</option>
                        </select>
                        <div class="text-xs text-red-600 font-bold">@error('employment_type') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="flex">
                    <div class="w-full mb-6 ml-2">
                        <label for="job_description" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Job description:</label>
                        <textarea wire:model="job_description" id="job_description" cols="30" rows="10" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"></textarea>
                        <div class="text-xs text-red-600 font-bold">@error('job_description') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="flex">
                    <div class="w-full mb-6 ml-2">
                        <label for="key_skill" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Key skills:</label>
                        <br>
                        <input type="text" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-96 py-2 focus:outline-none focus:border-blue-400" wire:model="key_skill" id="key_skill" placeholder="Type key skills">
                        <div class="text-xs text-red-600 font-bold">@error('key_skill') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="flex">
                    <div class="w-full mb-6 ml-2">
                        <label for="work_experience" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Work experience(Years):</label>
                        <br>
                        <select wire:model="work_experience" id="work_experience" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-96 py-2 focus:outline-none focus:border-blue-400">
                            <option value="null">Select experience </option>
                            @foreach($experiences as $experience)
                            <option value="{{ $experience->id }}">{{ $experience->experience }}</option>
                            @endforeach
                        </select>
                        <div class="text-xs text-red-600 font-bold">@error('work_experience') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="flex">
                    <div class="w-full mb-6 ml-2">
                        <label for="annual_salary" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Annual salary:</label>
                        <br>
                        <input type="text" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-96 py-2 focus:outline-none focus:border-blue-400" wire:model="annual_salary" id="annual_salary" placeholder="Type Annual salary">
                        <div class="text-xs text-red-600 font-bold">@error('annual_salary') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="flex">
                    <div class="w-full mb-6 ml-2">
                        <input type="checkbox" class="text-sm sm:text-base placeholder-gray-500 mt-2  rounded-lg border border-gray-400 focus:outline-none focus:border-blue-400" wire:model="salary_hide_status" {{ $job_detail->salary_hide_status == 1 ? 'checked' : '' }} id="salary_hide_status">
                        <label for="salary_hide_status" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Hide salary details from candidates</label>
                        <div class="text-xs text-red-600 font-bold">@error('salary_hide_status') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="flex">
                    <div class="w-1/3 mb-6 ml-2">
                        <label for="location" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Location:</label>
                        <br>
                        <select wire:model="location" id="location" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-96 py-2 focus:outline-none focus:border-blue-400">
                            <option value="null">Select location</option>
                            @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->city_name }}</option>
                            @endforeach
                        </select>
                        <div class="text-xs text-red-600 font-bold">@error('location') {{ $message }} @enderror</div>
                    </div>
                    <div class="w-1/3 mb-6 ml-2">
                        <label for="locality" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Locality:</label>
                        <br>
                        <input type="text" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-96 py-2 focus:outline-none focus:border-blue-400" wire:model="locality" id="locality">
                        <div class="text-xs text-red-600 font-bold">@error('locality') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="flex">
                    <div class="w-full mb-6 ml-2">
                        <label for="industry" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Industry:</label>
                        <br>
                        <select wire:model="industry" id="industry" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-96 py-2 focus:outline-none focus:border-blue-400">
                            <option value="null">Select industry</option>
                            @foreach($industries as $industry)
                            <option value="{{ $industry->id }}">{{ $industry->industry_name }}</option>
                            @endforeach
                        </select>
                        <div class="text-xs text-red-600 font-bold">@error('industry') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="flex">
                    <div class="w-1/3 mb-6 ml-2">
                        <label for="functional_area" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Functional area:</label>
                        <br>
                        <input type="text" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-96 py-2 focus:outline-none focus:border-blue-400" wire:model="functional_area" id="functional_area">
                        <div class="text-xs text-red-600 font-bold">@error('functional_area') {{ $message }} @enderror</div>
                    </div>
                    <div class="w-1/3 mb-6 ml-2">
                        <label for="role" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Role:</label>
                        <br>
                        <select wire:model="role" id="role" class="text-sm sm:text-base placeholder-gray-500 mt-2 w-96 pl-3 pr-4 rounded-lg border border-gray-400 py-2 focus:outline-none focus:border-blue-400">
                            <option value="null">Select role</option>
                            @foreach($roles as $roles)
                            <option value="{{ $roles->id }}">{{ $roles->role_name }}</option>
                            @endforeach
                        </select>
                        <div class="text-xs text-red-600 font-bold">@error('role') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="flex">
                    <div class="w-1/3 mb-6 ml-2">
                        <label for="reference_code" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Reference code:</label>
                        <br>
                        <input type="text" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-96 py-2 focus:outline-none focus:border-blue-400" wire:model="reference_code" id="reference_code">
                        <div class="text-xs text-red-600 font-bold">@error('reference_code') {{ $message }} @enderror</div>
                    </div>
                    <div class="w-1/3 mb-6 ml-2">
                        <label for="vacancy" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Vacancy:</label>
                        <br>
                        <input type="text" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-96 py-2 focus:outline-none focus:border-blue-400" wire:model="vacancy" id="vacancy">
                        <div class="text-xs text-red-600 font-bold">@error('vacancy') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="flex">
                    <div class="w-1/3 mb-6 ml-2">
                        <label for="education_qualification" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Educational qualification:</label>
                        <select wire:model="education_qualification" id="education_qualification" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                            <option value="null">Select education</option>
                            @foreach($educations as $education)
                            <option value="{{ $education->id }}">{{ $education->education_name }}</option>
                            @endforeach
                        </select>
                        <div class="text-xs text-red-600 font-bold">@error('education_qualification') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="flex">
                    <div class="w-1/3 mb-6 ml-2">
                        <label for="work_mode" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Work Mode:</label>
                        <br>
                        <select wire:model="work_mode" id="work_mode" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                            <option value="null">Select work mode </option>
                            @foreach($work_modes as $work_mode)
                            <option value="{{ $work_mode->id }}">{{ $work_mode->work_mode_name }}</option>
                            @endforeach
                        </select>
                        <div class="text-xs text-red-600 font-bold">@error('work_mode') {{ $message }} @enderror</div>
                    </div>
                    <div class="w-1/3 mb-6 ml-2">
                        <label for="department" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Department:</label>
                        <br>
                        <select wire:model="department" id="department" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                            <option value="null">Select department</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                        <div class="text-xs text-red-600 font-bold">@error('department') {{ $message }} @enderror</div>
                    </div>
                </div>


                <div class="border-b-2 my-3"></div>

                <h5 class="font-medium self-center uppercase text-gray-800">Company Information</h5>

                <div class="flex">
                    <div class="w-1/2 mb-6 ml-2">
                        <label for="company_name" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Company name:</label>
                        <br>
                        <input type="text" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-96 py-2 focus:outline-none focus:border-blue-400" wire:model="company_name" id="company_name">
                        <div class="text-xs text-red-600 font-bold">@error('company_name') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="flex">
                    <div class="w-1/2 mb-6 ml-2">
                        <label for="company_type_id" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Company type:</label>
                        <br>
                        <select wire:model="company_type_id" id="company_type_id" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                            <option value="null">Select company type</option>
                            @foreach($company_types as $company_type)
                            <option value="{{ $company_type->id }}">{{ $company_type->company_type_name }}</option>
                            @endforeach
                        </select>
                        <div class="text-xs text-red-600 font-bold">@error('company_type_id') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="flex">
                    <div class="w-1/2 mb-6 ml-2">
                        <label for="company_detail" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Company details:</label>
                        <textarea wire:model="company_detail" id="company_detail" cols="30" rows="10" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"></textarea>
                        <div class="text-xs text-red-600 font-bold">@error('company_detail') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="flex">
                    <div class="w-1/2 mb-6 ml-2">
                        <label for="posted_by" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Job posted by:</label>
                        <br>
                        <select wire:model="posted_by" id="posted_by" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                            <option value="null">Select</option>
                            @foreach($posted_bies as $posted_by)
                            <option value="{{ $posted_by->id }}">{{ $posted_by->posted_by_name }}</option>
                            @endforeach
                        </select>
                        <div class="text-xs text-red-600 font-bold">@error('posted_by') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="flex">
                    <div class="w-1/2 mb-6 ml-2">
                        <label for="status" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Job status:</label>
                        <br>
                        <select wire:model="status" id="status" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                            <option value="null">Select</option>
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select>
                        <div class="text-xs text-red-600 font-bold">@error('status') {{ $message }} @enderror</div>
                    </div>
                </div>


                <div class="flex flex-col mt-5">
                    <button type="submit" class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-blue-600 hover:bg-blue-700 rounded py-2 w-40 transition duration-150 ease-in">
                        <span class="mr-2 uppercase">Edit a job</span>
                        <span>
                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>