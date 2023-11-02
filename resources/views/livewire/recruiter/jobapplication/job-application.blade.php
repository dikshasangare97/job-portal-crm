<div>

    <div class="mt-2 mb-4">
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


    <div class="flex">
        <div class="w-full shadow-md rounded-lg bg-white ">
            <h1 class="font-semibold text-2xl px-5 pt-5">Job applicant list</h1>

            <div class="border my-5"></div>

            <div>
                <table class="w-full p-5 table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Applicant Name</th>
                            <th class="py-3 px-6 text-left">Applicant Email</th>
                            <th class="py-3 px-6 text-left">Applicant Contact No.</th>
                            <th class="py-3 px-6 text-left">Work Experience</th>
                            <th class="py-3 px-6 text-left">Key Skill</th>
                            <th class="py-3 px-6 text-left">Location</th>
                            <th class="py-3 px-6 text-left">Application Status</th>
                            <th class="py-3 px-6 text-center"></th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 bg-white text-sm font-light">
                        @if($jobapplications)
                        @foreach($jobapplications as $jobapplication)
                        <tr class="border-b border-gray-200 hover:bg-gray-100" wire:key="{{$jobapplication->id}}">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium">{{$jobapplication->user->name}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>{{$jobapplication->user->email ?? '-'}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>{{$jobapplication->user->contact_number ?? '-'}}</span>
                                </div>
                            </td>

                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    @php
                                    $isMatched = false;
                                    foreach($jobapplication->user->userPersonalDetail as $userLocation){
                                    if ($jobapplication->job->work_experience === $userLocation->total_experience_year) {
                                    $isMatched = true;
                                    }
                                    }

                                    @endphp
                                    @if ($isMatched)
                                    <div class="bg-green-600 rounded-full w-4 h-4 mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-white font-bold lg:w-4 lg:h-4">
                                            <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    @else
                                    <div class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    @endif
                                </div>
                            </td>

                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    @php
                                    $isMatched = false;
                                    foreach ($jobkeyskills as $job_key) {
                                    foreach ($jobapplication->user->userKeySkill as $userKeySkill) {
                                    if ($userKeySkill->key_skill_id === $job_key->key_skill_id) {
                                    $isMatched = true;
                                    break 2;
                                    }
                                    }
                                    }
                                    @endphp

                                    @if ($isMatched)
                                    <div class="bg-green-600 rounded-full w-4 h-4 mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-white font-bold lg:w-4 lg:h-4">
                                            <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    @else
                                    <div class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    @endif
                                </div>
                            </td>

                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    @php
                                    $isMatched = false;
                                    foreach($jobapplication->user->userPersonalDetail as $userLocation){

                                    if ($jobapplication->job->location->city_name === $userLocation->current_location_name) {
                                    $isMatched = true;
                                    }
                                    }

                                    @endphp
                                    @if ($isMatched)
                                    <div class="bg-green-600 rounded-full w-4 h-4 mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-white font-bold lg:w-4 lg:h-4">
                                            <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    @else
                                    <div class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    @endif
                                </div>
                            </td>


                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center text-sm font-medium">
                                    <span>{{$jobapplication->applicationStatus->application_status_name ?? '-'}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <a wire:click="viewButtonClicked({{ $jobapplication->user_id }})" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 viewBtn cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>No book found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="p-3">
                {{$jobapplications->links()}}
            </div>

        </div>
    </div>
</div>