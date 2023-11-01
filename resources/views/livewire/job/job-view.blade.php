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
    <div class="flex bg-white shadow-lg rounded-xl mb-2 w-full">
        <div class="w-full">
            <div class="flex items-center justify-between px-6 pt-6 pb-1">
                <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{$job->job_headline}} </h2>
            </div>
            <p class="text-gray-700 px-6 pb-3">{{$job->company_name}} </p>

            <div class="mt-1 flex items-center px-6">
                <div class="flex text-gray-700 text-sm mr-3 border-r pr-3">
                    <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                    </svg>
                    <span>{{$job->work_experience}} Yrs</span>
                </div>
                <div class="flex text-gray-700 text-sm mr-8 pr-3">
                    <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 8.25H9m6 3H9m3 6l-3-3h1.5a3 3 0 100-6M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>
                        @if($job->salary_hide_status == 1)
                        Not disclosed
                        @else
                        {{$job->annual_salary}}
                        @endif
                    </span>
                </div>

            </div>
            <div class="flex text-gray-700 text-sm mr-4 py-3 px-6">
                <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>
                <span>{{$job->location->city_name}}</span>
            </div>

            <hr class="max-w-full ">

            <div class="flex py-3 px-6">
                <div class="w-1/2">
                    <div class="flex">
                        <h4 class="text-sm font-semibold text-gray-900">Posted :</h4>
                        <div class="text-gray-500 text-sm ml-2">
                            @php
                            $date = Carbon\Carbon::parse($job->created_at);
                            $now = Carbon\Carbon::now();
                            $diff = $date->diffInDays($now);
                            @endphp

                            @if($diff >= 30)
                            30+
                            @else
                            {{$diff}}
                            @endif
                            Days Ago
                        </div>
                    </div>
                </div>
                <div class="w-1/2">
                    @php
                    $jobId = $job->id;
                    @endphp

                    <livewire:job.job-apply :jobId="$jobId" />
                </div>

            </div>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-xl mb-2 max-w-full">
        <div class="pt-8 px-6">
            <div class="bg-gray-100 rounded-xl">
                <div class="px-6 py-6">
                    <h2 class="text-lg font-semibold text-gray-900 ">Job highlights </h2>
                    <div class="text-sm mt-2">
                        {{ $job->job_highlights }}
                    </div>
                </div>

                <div class="px-6 pb-6">
                    <h2 class="text-lg font-semibold text-gray-900 ">Job match score</h2>
                    <div class="text-sm mt-2">


                        <div class="mt-1 flex items-center ">
                            <div class="flex text-gray-700 text-sm mr-3 pr-3">
                                @foreach($user_keyskills as $key)
                                {{ $key->key_skill_id }}
                                @endforeach
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Keyskills</span>
                            </div>
                            <div class="flex text-gray-700 text-sm mr-8 pr-3">
                                <div class="bg-green-600 rounded-full w-4 h-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-white font-bold lg:w-4 lg:h-4">
                                        <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z" clip-rule="evenodd" />
                                    </svg>
                                </div>

                                <span class="px-2">
                                    Location
                                </span>
                            </div>

                            <div class="flex text-gray-700 text-sm mr-8 pr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>
                                    Work Experience
                                </span>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="px-6 py-6">
            <h2 class="text-lg font-semibold text-gray-900 -mt-1">Job Description </h2>
            <div class="text-sm mt-5">
                {!! $job->job_description !!}
            </div>
        </div>

        <div class="flex px-6 py-2">
            <h4 class="text-md font-semibold text-gray-900">Role:</h4>
            <div class="text-sm ml-2 mt-1">
                {{ $job->role->role_name }}
            </div>
        </div>
        <div class="flex px-6 py-2">
            <h4 class="text-md font-semibold text-gray-900">Industry Type:</h4>
            <div class="text-sm ml-2 mt-1">
                {{ $job->industry->industry_name }}
            </div>
        </div>
        <div class="flex px-6 py-2">
            <h4 class="text-md font-semibold text-gray-900">Employment Type:</h4>
            <div class="text-sm ml-2 mt-1">
                {{ $job->employment_type }}
            </div>
        </div>

        <div class="flex px-6 py-2">
            <h4 class="text-md font-semibold text-gray-900">Education:</h4>
            <div class="text-sm ml-2 mt-1">
                {{ $job->education->education_name }}
            </div>
        </div>

        <div class="flex px-6 pt-2 pb-5">
            <h4 class="text-md font-semibold text-gray-900">Key Skill:</h4>
            <div class="text-sm ml-2 mt-1">
                {{ $job->key_skill }}
            </div>
        </div>
    </div>

    <div class="flex bg-white shadow-lg rounded-xl mb-2 max-w-full">
        <div class="px-6 py-6">
            <h2 class="text-lg font-semibold text-gray-900 -mt-1">About Company </h2>
            <div class="text-sm mt-5">
                {!! $job->company_detail !!}
            </div>
        </div>
    </div>

</div>