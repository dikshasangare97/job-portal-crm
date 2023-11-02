<div>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        #autocomplete-results {
            max-height: 200px;
            overflow-y: auto;
        }

        #autocomplete-results::-webkit-scrollbar {
            width: 4px;
            cursor: pointer;
        }

        #autocomplete-results::-webkit-scrollbar-track {
            background-color: rgba(229, 231, 235, var(--bg-opacity));
            cursor: pointer;
        }

        #autocomplete-results::-webkit-scrollbar-thumb {
            cursor: pointer;
            background-color: #cbd5e1;
        }
    </style>
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
                            <label for="job_headline" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Job posting headline <span class="text-red-600 font-bold text-md">*</span></label>
                            <input id="job_headline" type="text" wire:model="job_headline" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Job posting headline" />
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('job_headline') {{ $message }} @enderror</div>
                        </div>
                        <div class="w-1/2 mb-6">
                            <label for="employment_type" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Employment type <span class="text-red-600 font-bold text-md">*</span></label>
                            <select wire:model="employment_type" id="employment_type" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                                <option value="null">Select employment type</option>
                                <option value="Full-Time Employment">Full-Time Employment</option>
                                <option value="Part-Time Employment">Part-Time Employment</option>
                                <option value="Casual Employment">Casual Employment</option>
                                <option value="Contract Employment">Contract Employment</option>
                                <option value="Apprenticeship">Apprenticeship</option>
                                <option value="Traineeship">Traineeship</option>
                            </select>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('employment_type') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-full mb-6">
                            <label for="job_description" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Job description <span class="text-red-600 font-bold text-md">*</span></label>
                            <div wire:ignore class="mt-3">
                                <textarea id="job_description" wire:model.defer="job_description">{{ $job_description }}</textarea>
                            </div>

                            <div class="text-xs text-red-600 font-semibold pt-1">@error('job_description') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-full mb-6">
                            <label for="job_highlights" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Job highlights <span class="text-red-600 font-bold text-md">*</span></label>
                            <textarea id="job_highlights" wire:model="job_highlights" cols="30" rows="2" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Job posting highlight"></textarea>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('job_highlights') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-full mb-6">
                            <label for="key_skill" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Key skills <span class="text-red-600 font-bold text-md">*</span></label>
                            <br>
                            @if($getkeyskills)
                            <div class="mt-3">
                                @foreach($getkeyskills as $skill)
                                <div class="inline-flex max-w-96 mt-1">
                                    <span class="font-bold text-xs rounded-full border border-gray-500 px-3 py-2 text-gray-600 bg-gray-200">{{ $skill->keyskill->key_skill_name }}
                                        <button type="button" wire:click="deleteKeySkillId({{$skill->id}})" data-modal-toggle="delete-jobkey-skill-modal" class="text-red-500">
                                            &#10005;
                                        </button>
                                    </span>
                                </div>
                                @endforeach
                            </div>
                            @endif
                            <div id="selected-values" class="my-3 w-full"></div>
                            <div class="flex">
                                <div class="w-1/3">
                                    <input type="text" id="key_skill" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Search key skills" autocomplete="off">
                                    <div id="autocomplete-results" class="mt-2 overflow-y-auto max-h-40"></div>
                                    <input type="hidden" id="selected-ids" wire:model="key_skill" value="{{ $key_skill }}">
                                </div>
                            </div>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('key_skill') {{ $message }} @enderror</div>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-1/3 mb-6">
                            <label for="work_experience" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Work experience(Years) <span class="text-red-600 font-bold text-md">*</span></label>
                            <br>
                            <select wire:model="work_experience" id="work_experience" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                                <option value="null">Select experience </option>
                                @foreach($experiences as $experience)
                                <option value="{{ $experience->id }}">{{ $experience->experience }}</option>
                                @endforeach
                            </select>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('work_experience') {{ $message }} @enderror</div>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-1/3 mb-6">
                            <label for="annual_salary" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Annual salary</label>
                            <br>
                            <input type="text" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" wire:model="annual_salary" id="annual_salary" placeholder="Type Annual salary" wire:keydown.debounce.500ms="validateAndFormatSalary" wire:blur="formatSalary">
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('annual_salary') {{ $message }} @enderror</div>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-full mb-6">
                            <input type="checkbox" class="text-sm sm:text-base placeholder-gray-500 mt-2  rounded-lg border border-gray-400 focus:outline-none focus:border-blue-400" wire:model="salary_hide_status" {{ $job_detail->salary_hide_status == 1 ? 'checked' : '' }} id="salary_hide_status">
                            <label for="salary_hide_status" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Hide salary details from candidates</label>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('salary_hide_status') {{ $message }} @enderror</div>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-1/3 mb-6 mr-1">
                            <label for="location" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Location <span class="text-red-600 font-bold text-md">*</span></label>
                            <br>
                            <select wire:model="location" id="location" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                                <option value="null">Select location</option>
                                @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->city_name }}</option>
                                @endforeach
                            </select>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('location') {{ $message }} @enderror</div>
                        </div>
                        <div class="w-1/3 mb-6 ml-1">
                            <label for="locality" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Locality</label>
                            <br>
                            <input type="text" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" wire:model="locality" id="locality">
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('locality') {{ $message }} @enderror</div>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-1/3 mb-6">
                            <label for="industry" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Industry <span class="text-red-600 font-bold text-md">*</span></label>
                            <br>
                            <select wire:model="industry" id="industry" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                                <option value="null">Select industry</option>
                                @foreach($industries as $industry)
                                <option value="{{ $industry->id }}">{{ $industry->industry_name }}</option>
                                @endforeach
                            </select>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('industry') {{ $message }} @enderror</div>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-1/3 mb-6 mr-1">
                            <label for="functional_area" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Functional area</label>
                            <br>
                            <input type="text" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" wire:model="functional_area" id="functional_area">
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('functional_area') {{ $message }} @enderror</div>
                        </div>
                        <div class="w-1/3 mb-6 ml-1">
                            <label for="role" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Role <span class="text-red-600 font-bold text-md">*</span></label>
                            <br>
                            <select wire:model="role" id="role" class="text-sm sm:text-base placeholder-gray-500 mt-2 w-full pl-3 pr-4 rounded-lg border border-gray-400 py-2 focus:outline-none focus:border-blue-400">
                                <option value="null">Select role</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('role') {{ $message }} @enderror</div>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-1/3 mb-6 mr-1">
                            <label for="reference_code" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Reference code</label>
                            <br>
                            <input type="text" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" wire:model="reference_code" id="reference_code">
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('reference_code') {{ $message }} @enderror</div>
                        </div>
                        <div class="w-1/3 mb-6 ml-1">
                            <label for="vacancy" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">No. of vacancy <span class="text-red-600 font-bold text-md">*</span></label>
                            <br>
                            <input type="number" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" wire:model="vacancy" id="vacancy">
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('vacancy') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-1/3 mb-6">
                            <label for="education_qualification" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Educational qualification <span class="text-red-600 font-bold text-md">*</span></label>
                            <select wire:model="education_qualification" id="education_qualification" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                                <option value="null">Select education</option>
                                @foreach($educations as $education)
                                <option value="{{ $education->id }}">{{ $education->education_name }}</option>
                                @endforeach
                            </select>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('education_qualification') {{ $message }} @enderror</div>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-1/3 mb-6 mr-1">
                            <label for="work_mode" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Work Mode <span class="text-red-600 font-bold text-md">*</span></label>
                            <br>
                            <select wire:model="work_mode" id="work_mode" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                                <option value="null">Select work mode </option>
                                @foreach($work_modes as $work_mode)
                                <option value="{{ $work_mode->id }}">{{ $work_mode->work_mode_name }}</option>
                                @endforeach
                            </select>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('work_mode') {{ $message }} @enderror</div>
                        </div>
                        <div class="w-1/3 mb-6 ml-1">
                            <label for="department" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Department <span class="text-red-600 font-bold text-md">*</span></label>
                            <br>
                            <select wire:model="department" id="department" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                                <option value="null">Select department</option>
                                @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                @endforeach
                            </select>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('department') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="border-b-2 my-3"></div>
                    <h5 class="font-medium self-center uppercase text-gray-800">Company Information</h5>

                    <div class="flex mt-5">
                        <div class="w-1/3 mb-6">
                            <label for="company_name" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Company name <span class="text-red-600 font-bold text-md">*</span></label>
                            <br>
                            <input type="text" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" wire:model="company_name" id="company_name">
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('company_name') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-1/2 mb-6">
                            <label for="company_type_id" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Company type <span class="text-red-600 font-bold text-md">*</span></label>
                            <br>
                            <select wire:model="company_type_id" id="company_type_id" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                                <option value="null">Select company type</option>
                                @foreach($company_types as $company_type)
                                <option value="{{ $company_type->id }}">{{ $company_type->company_type_name }}</option>
                                @endforeach
                            </select>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('company_type_id') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-1/2 mb-6">
                            <label for="company_detail" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Company details <span class="text-red-600 font-bold text-md">*</span></label>
                            <textarea wire:model="company_detail" id="company_detail" cols="30" rows="10" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"></textarea>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('company_detail') {{ $message }} @enderror</div>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-1/2 mb-6">
                            <label for="posted_by" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Job posted by <span class="text-red-600 font-bold text-md">*</span></label>
                            <br>
                            <select wire:model="posted_by" id="posted_by" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                                <option value="null">Select</option>
                                @foreach($posted_bies as $posted_by)
                                <option value="{{ $posted_by->id }}">{{ $posted_by->posted_by_name }}</option>
                                @endforeach
                            </select>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('posted_by') {{ $message }} @enderror</div>
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
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('status') {{ $message }} @enderror</div>
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

    <!-- delete key-skill modal -->
    <div wire:ignore.self id="delete-jobkey-skill-modal" data-modal-show="false" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="p-6 space-y-6">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-red-500 w-14 h-14 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg text-center font-normal text-gray-700 ">Are you sure you want to delete the job key skill?</h3>
                </div>
                <div class="flex justify-end p-6 space-x-2">
                    <button data-modal-toggle="delete-jobkey-skill-modal" type="button" class="bg-red-500 ml-3 rounded-lg text-white hover:bg-red-400  border  text-sm font-medium px-2 py-2 ">Decline</button>
                    <button wire:click="deleteKeySkill()" class="px-2 py-2 bg-blue-500 ml-3 rounded-lg text-white hover:bg-blue-400">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal end -->
    <script>
        ClassicEditor
            .create(document.querySelector(`#job_description`))
            .then(editor => {
                editor.model.document.on('change:data', (e) => {
                    @this.set("job_description", editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        const searchInput = document.getElementById('key_skill');
        const selectedValues = document.getElementById('selected-values');
        const autocompleteResults = document.getElementById('autocomplete-results');
        const keySkills = @json($key_skills);
        const selectedItems = [];
        searchInput.addEventListener('input', debounce(search, 300));
        searchInput.addEventListener('focus', updateSelectedValues);

        function debounce(func, wait) {
            let timeout;
            return function() {
                const context = this;
                const args = arguments;
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    func.apply(context, args);
                }, wait);
            };
        }

        function search() {
            const query = searchInput.value;
            if (query.length >= 1) {
                const results = keySkills.filter(skill => skill.key_skill_name.toLowerCase().includes(query.toLowerCase()));
                displayResults(results);
            } else {
                autocompleteResults.innerHTML = '';
            }
        }

        function displayResults(results) {
            autocompleteResults.innerHTML = '';
            if (results.length === 0) {
                autocompleteResults.innerHTML = '<div class="bg-gray-100 text-center rounded-lg"><p class="text-gray-800 py-2">No results found</p></div>';
                return;
            }
            const resultsList = document.createElement('ul');
            resultsList.className = 'mt-2 bg-gray-100 text-sm shadow-md border rounded-lg';
            results.forEach((result) => {
                const listItem = document.createElement('li');
                listItem.className = 'cursor-pointer hover:bg-gray-200 hover:rounded-lg p-2';

                const suggestion = result.key_skill_name;
                const startIndex = suggestion.toLowerCase().indexOf(searchInput.value.toLowerCase());
                const endIndex = startIndex + searchInput.value.length;

                const boldText = document.createElement('span');
                boldText.className = 'font-bold';
                boldText.textContent = suggestion.slice(startIndex, endIndex);

                const regularText = document.createElement('span');
                regularText.textContent = suggestion.slice(endIndex);

                listItem.innerHTML = suggestion.slice(0, startIndex);
                listItem.appendChild(boldText);
                listItem.appendChild(regularText);

                if (selectedItems.includes(result.key_skill_name)) {
                    listItem.classList.add('text-gray-400', 'cursor-not-allowed');
                } else {
                    listItem.addEventListener('click', () => {
                        searchInput.value = '';
                        selectedItems.push(result.key_skill_name);
                        updateSelectedValues();
                        updateHiddenInput();
                        autocompleteResults.innerHTML = '';
                    });
                }
                resultsList.appendChild(listItem);
            });
            autocompleteResults.appendChild(resultsList);
        }

        function updateHiddenInput() {
            const hiddenInput = document.getElementById('selected-ids');

            if (selectedItems.length == 0) {
                hiddenInput.value = '';
                hiddenInput.dispatchEvent(new Event('input'));

            } else {
                // const selectedIds = selectedItems.map(item => getItemIdByName(item));
                hiddenInput.value = selectedItems.map(item => getItemIdByName(item)).join(',');
                // hiddenInput.value = JSON.stringify(selectedIds);
                hiddenInput.dispatchEvent(new Event('input'));
            }
        }

        function getItemIdByName(name) {
            const matches = keySkills.filter(skill => skill.key_skill_name === name);
            return matches.map(match => match.id);
        }

        function updateSelectedValues() {
            const selectedValuesContainer = document.getElementById('selected-values');
            selectedValuesContainer.innerHTML = '';
            selectedValues.innerHTML = '';
            if (selectedItems.length > 0) {
                selectedItems.forEach((item) => {
                    const selectedValueContainer = document.createElement('div');
                    selectedValueContainer.className = 'inline-flex max-w-96 mt-1 mx-1';

                    const selectedValue = document.createElement('span');
                    selectedValue.className = 'font-bold text-xs rounded-full border border-blue-500 px-3 py-2 text-blue-600 bg-blue-200';
                    selectedValue.textContent = item;

                    const cancelIcon = document.createElement('span');
                    cancelIcon.className = 'text-red-500 pl-1 cursor-pointer';
                    cancelIcon.innerHTML = '&#10005;';

                    cancelIcon.addEventListener('click', () => {
                        removeSelectedItem(item);
                    });

                    selectedValue.appendChild(cancelIcon);
                    selectedValueContainer.appendChild(selectedValue);
                    selectedValuesContainer.appendChild(selectedValueContainer);
                });
                updateHiddenInput();

            } else {
                selectedValues.innerHTML = '';
                updateHiddenInput();
            }
        }

        function removeSelectedItem(item) {
            const index = selectedItems.indexOf(item);
            if (index !== -1) {
                selectedItems.splice(index, 1);
                updateSelectedValues();
                updateHiddenInput();
            }
        }
    </script>
</div>