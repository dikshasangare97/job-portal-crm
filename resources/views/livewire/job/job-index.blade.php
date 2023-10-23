<div class="flex">
    <div class="w-2/4">
        @if(isset($jobs) && $jobs->count() > 0)

        @foreach ($jobs as $job)
        <div class="flex bg-white shadow-lg rounded-xl mb-2 max-w-full ">
            <div class="flex items-start px-4 py-6">
                <a href="/job/{{$job->id}}/view" target="_blank">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{$job->job_headline}} </h2>
                    </div>
                    <p class="text-gray-700">{{$job->company_name}} </p>

                    <div class="mt-4 flex items-center">
                        <div class="flex text-gray-700 text-sm mr-3 border-r pr-3">
                            <svg class="w-4 h-4 mr-1 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                            </svg>
                            <span>{{$job->work_experience}} Yrs</span>
                        </div>
                        <div class="flex text-gray-700 text-sm mr-8 border-r pr-3">
                            <span class="text-lg mr-1"> ₹ </span>
                            <span class="">
                                @if($job->salary_hide_status == 1)
                                Not disclosed
                                @else
                                {{$job->annual_salary}}
                                @endif
                            </span>
                        </div>
                        <div class="flex text-gray-700 text-sm mr-4">
                            <svg class="w-4 h-4 mr-1 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <span>{{$job->location->city_name}}</span>
                        </div>
                    </div>

                    <div class="flex mt-3 text-gray-700">
                        <svg class="w-4 h-4 mr-1 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                        <p class="text-sm mt-1"> {{$job->education->education_name}} </p>
                    </div>

                    <div class="flex mt-3 text-gray-700">
                        <svg class="w-4 h-4 mr-1 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                        </svg>
                        <p class="text-sm">
                            {{$job->job_description}}
                        </p>
                    </div>
                    <p class="mt-1 text-gray-700 text-sm">
                        {{$job->key_skill}}
                    </p>
                    <p class="mt-3 text-gray-500 text-xs">
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
                    </p>
                    <div class="mt-5">
                        @auth
                        @if(auth()->user()->register_for == 'user')
                        <div>
                            @php
                            $jobId = $job->id;
                            @endphp

                            @php
                            $alreadyApplied = false;
                            @endphp

                            @foreach($job_applies as $job_apply)
                            @if($job_apply->job_id == $jobId)
                            <p class="text-blue-600 font-bold">Already Apply</p>
                            @php
                            $alreadyApplied = true;
                            @endphp
                            @break
                            @endif
                            @endforeach

                            @if (!$alreadyApplied)
                            <livewire:job.job-apply :jobId="$jobId" />
                            @endif

                        </div>
                        @endif
                        @endauth
                    </div>
                </a>
            </div>
        </div>
        @endforeach

        <p>{{$jobs->links()}}</p>
        @endif

    </div>
</div>