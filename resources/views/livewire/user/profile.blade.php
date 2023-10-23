<div>
    <!-- session message start -->
    <div>
        @if (session()->has('basicdetailmessage'))
        <div class="flex items-center p-4 mb-4 text-sm border-b border-lime-400" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5 text-lime-400">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-lime-400">Success</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('basicdetailmessage') }}</span>
            </div>
        </div>
        @endif
        @if (session()->has('basicdetailerror'))
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-b border-red-700" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-gray-800">Error</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('basicdetailerror') }}</span>
            </div>
        </div>
        @endif
    </div>
    <!-- session message end -->
    <!-- resume upload modal -->
    @if(optional($userPersonalDetail)->resume == null)
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-100 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="flex items-start justify-between p-4 border-b rounded-t ">
                        <h3 class="text-xl font-semibold text-gray-900">Basic Details</h3>
                    </div>

                    <form wire:submit="updateBasicDetail">
                        <div class="px-5 pb-2">
                            <div class="my-3">
                                <label class="font-semibold text-sm text-gray-700">Is this your current employment?</label>
                                <br>
                                <div class="flex my-4">
                                    <div>
                                        <input id="current_employment_yes" wire:model="current_employment" wire:click="showCurrentEmployment" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="0">
                                        <label for="current_employment_yes" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Yes</label>
                                    </div>
                                    <div class="ml-10">
                                        <input id="current_employment_no" wire:model="current_employment" type="radio" wire:click="showCurrentEmployment" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="1">
                                        <label for="current_employment_no" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">No</label>
                                    </div>
                                </div>
                                <div class="text-xs text-red-600 font-bold">@error('current_employment') {{ $message }} @enderror</div>
                            </div>

                            @if($current_employment == 0)
                            <div class="my-3">
                                <label class="font-semibold text-sm text-gray-700">Total experience</label>
                                <br>
                                <div class="flex">
                                    <div class="w-1/2 mr-2">
                                        <select class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" wire:model="total_experience_year">
                                            <option value="">Years</option>
                                            <option value="0 Year">0 Year</option>
                                            <option value="1 Year">1 Year</option>
                                            <option value="2 Year">2 Year</option>
                                            <option value="3 Year">3 Year</option>
                                            <option value="4 Year">4 Year</option>
                                            <option value="5 Year">5 Year</option>
                                            <option value="6 Year">6 Year</option>
                                            <option value="7 Year">7 Year</option>
                                            <option value="8 Year">8 Year</option>
                                            <option value="9 Year">9 Year</option>
                                            <option value="10 Year">10 Year</option>
                                            <option value="11 Year">11 Year</option>
                                            <option value="12 Year">12 Year</option>
                                            <option value="13 Year">13 Year</option>
                                            <option value="14 Year">14 Year</option>
                                            <option value="15 Year">15 Year</option>
                                            <option value="16 Year">16 Year</option>
                                            <option value="17 Year">17 Year</option>
                                            <option value="18 Year">18 Year</option>
                                            <option value="19 Year">19 Year</option>
                                            <option value="20 Year">20 Year</option>
                                            <option value="21 Year">21 Year</option>
                                            <option value="22 Year">22 Year</option>
                                            <option value="23 Year">23 Year</option>
                                            <option value="24 Year">24 Year</option>
                                            <option value="25 Year">25 Year</option>
                                            <option value="26 Year">26 Year</option>
                                            <option value="27 Year">27 Year</option>
                                            <option value="28 Year">28 Year</option>
                                            <option value="29 Year">29 Year</option>
                                            <option value="30 Year">30 Year</option>
                                            <option value="30+ Year">30+ Year</option>
                                        </select>
                                        <div class="text-xs text-red-600 font-bold">@error('total_experience_year') {{ $message }} @enderror</div>
                                    </div>

                                    <div class="w-1/2">
                                        <select class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" wire:model="total_experience_month">
                                            <option value="">Months</option>
                                            <option value="0 Months">0 Months</option>
                                            <option value="1 Months">1 Months</option>
                                            <option value="2 Months">2 Months</option>
                                            <option value="3 Months">3 Months</option>
                                            <option value="4 Months">4 Months</option>
                                            <option value="5 Months">5 Months</option>
                                            <option value="6 Months">6 Months</option>
                                            <option value="7 Months">7 Months</option>
                                            <option value="8 Months">8 Months</option>
                                            <option value="9 Months">9 Months</option>
                                            <option value="10 Months">10 Months</option>
                                            <option value="11 Months">11 Months</option>
                                        </select>
                                        <div class="text-xs text-red-600 font-bold">@error('total_experience_month') {{ $message }} @enderror</div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="my-3 flex">
                                <div class="w-full mr-2">
                                    <label for="company_name" class="font-semibold text-sm text-gray-700">
                                        @if($current_employment == 0)
                                        Current company name
                                        @else
                                        Previous company name
                                        @endif
                                        <span class="text-sm text-red-600">*</span>
                                    </label>
                                    <br>
                                    <input type="text" wire:model="company_name" id="company_name" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Type your organization" />
                                    <div class="text-xs text-red-600 font-bold">@error('company_name') {{ $message }} @enderror</div>
                                </div>
                            </div>

                            <div class="my-3 flex">
                                <div class="w-full mr-2">
                                    <label for="location" class="font-semibold text-sm text-gray-700">Location <span class="text-sm text-red-600">*</span></label>
                                    <br>
                                    <select wire:model="current_location_name" id="location" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 ">
                                        <option value="">Select location</option>
                                        @foreach($locations as $location)
                                        <option value="{{ $location->city_name }}">{{ $location->city_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="text-xs text-red-600 font-bold">@error('current_location_name') {{ $message }} @enderror</div>
                                </div>
                            </div>

                            <div class="my-3 flex">
                                <div class="w-full mr-2">
                                    <label for="designation_name" class="font-semibold text-sm text-gray-700">
                                        @if($current_employment == 0)
                                        Current designation
                                        @else
                                        Previous designation
                                        @endif
                                        <span class="text-sm text-red-600">*</span>
                                    </label>
                                    <br>
                                    <input type="text" wire:model="designation_name" id="designation_name" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Type your designation" />
                                    <div class="text-xs text-red-600 font-bold">@error('designation_name') {{ $message }} @enderror</div>
                                </div>
                            </div>

                            <div class="my-3">
                                <label for="salary" class="font-semibold text-sm text-gray-700">
                                    Current salary
                                </label>
                                <br>
                                <input type="text" wire:model="salary" id="salary" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " wire:keydown.debounce.500ms="validateAndFormatSalary" wire:blur="formatSalary" placeholder="Eg. 15,000" />
                                <div class="text-xs text-red-600 font-bold">@error('salary') {{ $message }} @enderror</div>
                            </div>

                            @if($current_employment == 0)
                            <div class="my-3">
                                <label for="notice_period" class="font-semibold text-sm text-gray-700">Notice period</label>
                                <br>
                                <select wire:model="notice_period" id="notice_period" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 ">
                                    <option value="">Select notice period</option>
                                    <option value="15 Days or less">15 Days or less </option>
                                    <option value="1 Month">1 Month </option>
                                    <option value="2 Months">2 Months </option>
                                    <option value="3 Months">3 Months </option>
                                    <option value="More than 3 Months">More than 3 Months </option>
                                    <option value="Serving Notice Period">Serving Notice Period </option>
                                </select>
                                <div class="text-xs text-red-600 font-bold">@error('notice_period') {{ $message }} @enderror</div>
                            </div>
                            @endif

                            <div class="my-3">
                                <label for="resume" class="font-semibold text-sm text-gray-700">Upload Resume</label>
                                <p class="text-sm text-gray-500">Supported Formats: doc, docx, pdf, upto 2 MB</p>
                                <input id="resume" type="file" wire:model="resume" class="mt-3 text-sm basicDetailResume" />

                                <div class="text-xs text-red-600 font-bold">@error('resume') {{ $message }} @enderror</div>
                            </div>
                        </div>

                        <div class="flex items-end justify-end p-4 border-t rounded-t ">
                            <button type="submit" class="px-2 py-2 bg-blue-500 ml-3 text-sm rounded-lg text-white hover:bg-blue-400" id="submitBasicDetails" id="submitBasicDetails">Submit Details</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- end modal -->
    <div class="bg-gray-100">
        <div class="container mx-auto my-5 p-5">
            <div class="w-full text-black bg-white shadow-lg rounded-xl">
                <div class="flex flex-col md:flex-row">
                    <div class="w-full md:w-1/6 p-6 my-auto">
                        <livewire:user.profile.user-profile-image />
                    </div>
                    <div class="w-full md:w-3/6 p-10">
                        <div class="flex justify-between items-center">
                            <h3 class="text-2xl font-bold capitalize">{{ Auth::user()->name ?? '-' }}</h3>
                            <div>
                                <button class="inline-flex items-center px-2 py-2 mr-5 text-gray-600 ml-3" data-modal-toggle="basic-detail-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h4 class="text-sm font-bold capitalize text-slate-600">{{ $userEmployment->designation_name ?? '-' }}</h4>
                        <p class="text-sm  text-slate-500">at <span class="font-semibold capitalize">{{ $userEmployment->company_name ?? '-' }}</span></p>
                        <div class="border-b my-5"></div>
                        <div class="flex">
                            <div class="w-full md:w-1/2 border-r">
                                <div class="flex text-sm  text-slate-500 font-normal py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                    <p>{{ $userPersonalDetail->current_location_name  ?? '-' }}
                                        @if(optional($userPersonalDetail)->current_location != null)
                                        , {{ $userPersonalDetail->current_location ?? '' }}
                                        @endif
                                    </p>
                                </div>

                                <div class="flex text-sm  text-slate-500 font-normal py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                                    </svg>
                                    <p>{{ $userPersonalDetail->total_experience_year  ?? '-' }}
                                        {{ $userPersonalDetail->total_experience_month ?? '' }}
                                    </p>
                                </div>

                                <div class="flex text-sm  text-slate-500 font-normal py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" />
                                    </svg>

                                    <p><span class="font-semibold">₹</span> {{ $userPersonalDetail->current_salary ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 pl-3">
                                <div class="flex text-sm  text-slate-500 font-normal py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                    </svg>
                                    <p>{{ Auth::user()->contact_number ?? '-' }}</p>
                                </div>

                                <div class="flex text-sm  text-slate-500 font-normal py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                    <p>{{ Auth::user()->email ?? '-' }}</p>
                                </div>

                                <div class="flex text-sm  text-slate-500 font-normal py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    </svg>
                                    <p>{{ $notice_period ?? '-' }} notice period</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:flex no-wrap md:-mx-2 mt-10">
                <div class="w-full md:w-3/12 md:mx-2">
                    <div class="bg-white p-3 border-t-4 border-blue-400">
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">Quick Links</h1>
                        <ul>
                            <li class="hover:bg-gray-100 rounded-full text-md mt-5 pl-5 py-2 font-medium">
                                <a href="#resume-upload">Resume</a>
                            </li>
                            <li class="hover:bg-gray-100 rounded-full text-md mt-3 pl-5 py-2 font-medium">
                                <a href="#resume-headline">Resume headline</a>
                            </li>
                            <li class="hover:bg-gray-100 rounded-full text-md mt-3 pl-5 py-2 font-medium">
                                <a href="#key-skills">Key skills</a>
                            </li>
                            <li class="hover:bg-gray-100 rounded-full text-md mt-3 pl-5 py-2 font-medium">
                                <a href="#employment-details">Employment</a>
                            </li>
                            <li class="hover:bg-gray-100 rounded-full text-md mt-3 pl-5 py-2 font-medium">
                                <a href="#education-details">Education</a>
                            </li>
                            <li class="hover:bg-gray-100 rounded-full text-md mt-3 pl-5 py-2 font-medium">
                                <a href="#itskill-details">IT skills</a>
                            </li>
                            <li class="hover:bg-gray-100 rounded-full text-md mt-3 pl-5 py-2 font-medium">
                                <a href="#project-detail">Projects</a>
                            </li>
                            <li class="hover:bg-gray-100 rounded-full text-md mt-3 pl-5 py-2 font-medium">
                                <a href="#profile-summary">Profile summary</a>
                            </li>
                            <li class="hover:bg-gray-100 rounded-full text-md mt-3 pl-5 py-2 font-medium">
                                <a href="#career-profile">Career profile</a>
                            </li>
                            <li class="hover:bg-gray-100 rounded-full text-md mt-3 pl-5 py-2 font-medium">
                                <a href="#personal-details">Personal details</a>
                            </li>
                            <li class="hover:bg-gray-100 rounded-full text-md mt-3 mb-5 pl-5 py-2 font-medium">
                                <a href="#language-details">Language details</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="w-full md:w-9/12 mx-2">
                    @if($userPersonalDetail != null)

                    <div id="resume-upload" class="mb-4" wire:ignore>
                        <livewire:user.profile.resume-upload />
                    </div>

                    <div id="resume-headline" class="my-4" wire:ignore>
                        <livewire:user.profile.resume-headline />
                    </div>

                    <div id="key-skills" class="my-4" wire:ignore>
                        <livewire:user.profile.key-skills />
                    </div>

                    <div id="employment-details" class="my-4" wire:ignore>
                        <livewire:user.profile.employment-details />
                    </div>

                    <div id="education-details" class="my-4" wire:ignore>
                        <livewire:user.profile.education-details />
                    </div>

                    <div id="itskill-details" class="my-4" wire:ignore>
                        <livewire:user.profile.itskill-details />
                    </div>

                    <div id="project-detail" class="my-4" wire:ignore>
                        <livewire:user.profile.project-details />
                    </div>

                    <div id="profile-summary" class="my-4" wire:ignore>
                        <livewire:user.profile.profile-summary />
                    </div>

                    <div id="career-profile" class="my-4" wire:ignore>
                        <livewire:user.profile.career-profile />
                    </div>

                    <div id="personal-details" class="my-4" wire:ignore>
                        <livewire:user.profile.personal-details />
                    </div>

                    <div id="language-details" class="my-4" wire:ignore>
                        <livewire:user.profile.language-details />
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- basic detail modal -->
    <div wire:ignore.self id="basic-detail-modal" data-modal-show="false" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="text-end pt-5 pr-5">
                    <button data-modal-toggle="basic-detail-modal" class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </button>
                </div>
                <livewire:user.profile.basic-detail-modal />
            </div>
        </div>
    </div>
    <!-- basic detail modal end -->

    @push('script')
    <script>
        $(document).ready(function() {
            $('a').on('click', function(e) {
                e.preventDefault();
                var targetId = $(this).attr('href').substring(1);
                if (targetId) {
                    $('html, body').animate({
                        scrollTop: $('#' + targetId).offset().top
                    }, 500);
                }
            });
        });
    </script>
    @endpush

</div>