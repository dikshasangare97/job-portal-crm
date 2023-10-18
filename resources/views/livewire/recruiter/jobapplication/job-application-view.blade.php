<div class="bg-gray-100 p-4">

    <div>
        @if (session()->has('jobApplyStatusMess'))
        <div class="flex items-center p-4 mb-4 text-sm border-b border-lime-400" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5 text-lime-400">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-lime-400">Success</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('jobApplyStatusMess') }}</span>
            </div>
        </div>
        @endif
        @if (session()->has('jobApplyStatusError'))
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-b border-red-700" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-gray-800">Error</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('jobApplyStatusError') }}</span>
            </div>
        </div>
        @endif
    </div>

    <div class="flex items-end justify-end">
        <div class="mb-5">
            <button wire:click="downloadResume({{ $userPersonalDetail->id }})" class="inline-flex items-center px-2 py-2 mr-3 border border-blue-500 rounded-full text-blue-700 text-xs font-bold bg-transparent hover:bg-blue-500 hover:text-white hover:border-transparent">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                &nbsp; Download Resume
            </button>
        </div>
        <div class="mb-5">
            @php
            $jobApplyStatusId = $jobApplyStatus->application_status;
            $jobApplyStatusName = $jobApplyStatus->applicationStatus->application_status_name;
            @endphp

            @if($jobApplyStatusId == 5)
            <p class="font-poppins text-green-500 font-semibold text-heading  text-xl">
                {{$jobApplyStatusName}}
            </p>
            @elseif($jobApplyStatusId == 6)
            <p class="font-poppins text-gray-500 font-semibold text-heading  text-xl">
                {{$jobApplyStatusName}}
            </p>
            @elseif($jobApplyStatusId == 7)
            <p class="font-poppins text-red-500 font-semibold text-heading  text-xl">
                {{$jobApplyStatusName}}
            </p>
            @else
            <button wire:click="saveUserApplyStatus(5)" class="inline-flex items-center px-2 py-2 mr-3 border border-green-500 rounded-full text-green-700 text-xs font-bold bg-transparent hover:bg-green-500 hover:text-white hover:border-transparent">
                Shortlisted
            </button>
            <button wire:click="saveUserApplyStatus(6)" class="inline-flex items-center px-2 py-2 mr-3 border border-gray-500 rounded-full text-gray-700 text-xs font-bold bg-transparent hover:bg-gray-500 hover:text-white hover:border-transparent">
                Contact By Email
            </button>
            <button wire:click="saveUserApplyStatus(7)" class="inline-flex items-center px-2 py-2 mr-3 border border-red-500 rounded-full text-red-700 text-xs font-bold bg-transparent hover:bg-red-500 hover:text-white hover:border-transparent">
                Not Shortlisted
            </button>
            @endif
        </div>
    </div>

    <div class="border-1 shadow-lg shadow-gray-700 rounded-lg">
        <!-- top content -->
        <div class="flex rounded-t-lg bg-indigo-400 sm:px-2 w-full ">
            <div class=" overflow-hidden sm:rounded-full sm:relative sm:p-0 top-10 left-5 p-3">
                @if($user->profile_img)
                <img class="h-40 w-40 shadow-lg" src="{{ Storage::url('profileimage/' . $user->profile_img) }}" alt="{{ $user->profile_img }}" />
                @else
                <img class="h-40 w-40 shadow-lg" src="https://static.naukimg.com/s/5/105/i/displayProfilePlaceholder.png" />
                @endif
            </div>

            <div class="w-2/3 sm:text-center pl-5 mt-10 text-start">
                <p class="font-poppins font-bold text-heading sm:text-4xl text-2xl">
                    {{$user->name}}
                </p>
                <p class="text-heading">{{ $getUserDesignation->designation_name ?? '-' }}</p>
            </div>
        </div>

        <!-- main content -->
        <div class="p-5">
            <div class="flex flex-col sm:flex-row sm:mt-10">
                <div class="flex flex-col sm:w-1/3">
                    <!-- My contact -->
                    <div class="py-3 sm:order-none order-3">
                        <h2 class="text-lg font-poppins font-bold text-top-color">Contact Detail</h2>
                        <div class="border-2 w-20 border-top-color my-3"></div>

                        <div>
                            <div class="flex items-center my-1">
                                <a class="w-6 text-gray-700 hover:text-orange-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                </a>
                                <div class="ml-2 truncate">{{$user->email ?? '-'}}</div>
                            </div>
                            <div class="flex items-center my-1">
                                <a class="w-6 text-gray-700 hover:text-orange-600" aria-label="Visit TrendyMinds YouTube" href="" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                    </svg>
                                </a>
                                <div class="ml-2">{{$user->contact_number ?? '-'}}</div>
                            </div>

                        </div>
                    </div>
                    <!-- Skills -->
                    <div class="py-3 sm:order-none order-2">
                        <h2 class="text-lg font-poppins font-bold text-top-color">Key Skills</h2>
                        <div class="border-2 w-20 border-top-color my-3"></div>
                        @if($userKeySkills->count() != 0)
                        <div class="flex items-start my-1">
                            <div class="w-full ">
                                <ul class="list-disc ml-5">
                                    @foreach($userKeySkills as $userKeySkill)
                                    <li>
                                        <p>{{ $userKeySkill->keySkill->key_skill_name ?? '-' }}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @else
                        <p class="ml-2">No skill found!</p>
                        @endif

                    </div>
                    <!-- Education Background -->
                    <div class="py-3 sm:order-none order-1">
                        <h2 class="text-lg font-poppins font-bold text-top-color">Education Background</h2>
                        <div class="border-2 w-20 border-top-color my-3"></div>
                        @if($userEducationDetails->count() != 0)
                        <div class="flex flex-col space-y-1">
                            @foreach($userEducationDetails as $userEducationDetail)
                            <div class="flex flex-col">
                                <p class="font-semibold text-xs text-gray-700">
                                    {{ $userEducationDetail->course_duration_to ?? '-' }}
                                    @if($userEducationDetail->course_duration_from)
                                    - {{ $userEducationDetail->course_duration_from ?? '-' }}
                                    @endif
                                    | {{ $userEducationDetail->course_type ?? '-' }}
                                </p>
                                <p class="text-sm font-medium">
                                    <span class="text-green-700">
                                        @if($userEducationDetail->education_name == '10th')
                                        Class X
                                        @elseif($userEducationDetail->education_name == '12th')
                                        Class XII
                                        @else
                                        {{ $userEducationDetail->education_name ?? '-' }}
                                        @if($userEducationDetail->course_name)
                                        ({{ $userEducationDetail->course_name }})
                                        @endif
                                        @endif
                                    </span>, {{ $userEducationDetail->university_name ?? '' }}.
                                </p>
                                <p class="font-bold text-xs text-gray-700 mb-2">Percentage: {{ $userEducationDetail->marks ?? '' }}</p>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <p class="ml-2">No education detail found!</p>
                        @endif
                    </div>

                </div>


                <div class="flex flex-col sm:w-2/3 order-first sm:order-none sm:-mt-10">

                    <!-- About me -->
                    <div class="py-3">
                        <h2 class="text-lg font-poppins font-bold text-top-color">About {{$user->name}}</h2>
                        <div class="border-2 w-20 border-top-color my-3"></div>
                        <p>
                            @if($userPersonalDetail->profile_summary)
                            {!! $userPersonalDetail->profile_summary !!}
                            @else
                            {!! $userPersonalDetail->resume_headline ?? 'No detail found!' !!}
                            @endif
                        </p>
                    </div>

                    <!-- Professional Experience -->
                    <div class="py-3">
                        <h2 class="text-lg font-poppins font-bold text-top-color">Professional Experience</h2>
                        <div class="border-2 w-20 border-top-color my-3"></div>
                        @if($userEmploymentDetails->count() != 0)
                        <div class="flex flex-col">
                            @foreach($userEmploymentDetails as $userEmploymentDetail)
                            <div class="flex flex-col mb-3">
                                <p class="text-lg font-bold text-gray-700">{{ $userEmploymentDetail->company_name }} | {{ $userEmploymentDetail->designation_name }}</p>
                                <p class="font-semibold text-sm text-gray-700">
                                    <!-- 2021 - Present -->
                                    @php
                                    $months = ['Jan' => 1, 'Feb' => 2, 'Mar' => 3, 'Apr' => 4, 'May' => 5, 'Jun' => 6, 'Jul' => 7, 'Aug' => 8, 'Sep' => 9, 'Oct' => 10, 'Nov' => 11, 'Dec' => 12,];

                                    $joining = \Carbon\Carbon::create($userEmploymentDetail->joining_date_year, $months[$userEmploymentDetail->joining_date_month] ?? 1);
                                    $workedTill = \Carbon\Carbon::create($userEmploymentDetail->worked_till_year ?? now()->year, $months[$userEmploymentDetail->worked_till_month] ?? 1);

                                    $diff = $joining->diff($workedTill);
                                    @endphp
                                    <span>{{ $joining->format('M Y') }} to</span>
                                    @if($userEmploymentDetail->worked_till_year)
                                    <span>
                                        {{ $workedTill->format('M Y') }}
                                    </span>
                                    @else
                                    <span>
                                        Present
                                    </span>
                                    @endif
                                </p>
                                @if($userEmploymentDetail->current_employment == 0 )
                                @if($userEmploymentDetail->skill_used)
                                <p class="font-semibold text-sm text-gray-700 mt-2 mb-1">Key Responsibilities</p>
                                <p class="text-sm list-disc pl-1 space-y-1">{{ $this->getSkillNames($userEmploymentDetail->skill_used) }}</p>
                                @endif
                                @endif
                            </div>
                            @endforeach
                        </div>
                        @else
                        <p class="ml-2">No experience found!</p>
                        @endif
                    </div>

                    <!-- Projects -->
                    <div class="py-3">
                        <h2 class="text-lg font-poppins font-bold text-top-color">Projects</h2>
                        <div class="border-2 w-20 border-top-color my-3"></div>
                        @if($userProjectDetails->count() != 0)
                        <div class="flex flex-col">
                            @foreach($userProjectDetails as $userProjectDetail)
                            <div class="flex flex-col mb-5">
                                <p class="text-lg font-semibold text-gray-700">{{ $userProjectDetail->project_title }}</p>
                                <p class="font-normal text-sm text-gray-700 mb-1 pl-2">{!! $userProjectDetail->project_detail !!}</p>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <p class="ml-2">No project found!</p>
                        @endif
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>