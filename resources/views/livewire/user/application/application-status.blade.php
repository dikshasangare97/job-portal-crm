<div>
    <style>
        #job-apply-scroll::-webkit-scrollbar {
            width: 4px;
            cursor: pointer;
        }

        #job-apply-scroll::-webkit-scrollbar-track {
            background-color: rgba(229, 231, 235, var(--bg-opacity));
            cursor: pointer;
        }

        #job-apply-scroll::-webkit-scrollbar-thumb {
            cursor: pointer;
            background-color: #cbd5e1;
        }

        #apply-status-scroll::-webkit-scrollbar {
            height: 4px;
            cursor: pointer;
        }

        #apply-status-scroll::-webkit-scrollbar-track {
            background-color: rgba(229, 231, 235, var(--bg-opacity));
            cursor: pointer;
        }

        #apply-status-scroll::-webkit-scrollbar-thumb {
            cursor: pointer;
            background-color: #cbd5e1;
        }

        .break-text {
            display: block;
        }

        .break-text::after {
            content: '\A';
            white-space: pre;
            display: block;
        }
    </style>

    <div class="m-3 p-5 bg-white rounded-b-lg shadow-xl border-t-4 border-blue-400">
        <div class="flex">
            <div class="w-4/6">
                <h1 class="font-semibold text-2xl">Job application status</h1>
                <p class="text-sm text-slate-400 font-normal mt-2">Not getting views on your CV? Highlight your application to get recruiter's attention</p>
            </div>
            <div class="w-2/6">
                <div class="flex">
                    <!-- border-r-4 border-gray-200 -->
                    <div class="w-full flex justify-end pr-3">
                        <span class="text-5xl font-medium pr-2">{{ $application_details->count() }}</span>
                        <span class="text-md text-slate-500 font-semibold px-2 py-1">Total <br> applies</span>
                    </div>
                    <!-- <div class="w-1/2 flex">
                        <span class="text-5xl font-medium ml-3">14</span>
                        <span class="text-md text-slate-500 font-semibold py-1 px-2">Application <br> updates</span>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="flex m-4 bg-white">
        <div class="flex flex-col justify-center ">
            <section class="py-5 mx-auto space-y-8 sm:py-5">
                <div class="container flex flex-row items-stretch  w-full space-x-12" x-data="{tab: {{ $get_first_job_apply->id }} }">
                    <div class="flex flex-col justify-start w-2/6 space-y-4 border-r">
                        <h1 class="font-semibold text-lg mx-auto my-5">Job Applies</h1>
                        <div class="h-96 overflow-x-hidden overflow-y-auto mr-0" id="job-apply-scroll">
                            @foreach($application_details as $application_detail)
                            <div class="p-4 font-semibold cursor-pointer" :class="{'z-20 border-r-8 bg-blue-50 transform translate-x-2 border-blue-500': tab === {{$application_detail->id}}, ' transform -translate-x-2': tab !== {{$application_detail->id}}}" @click.prevent="tab = {{$application_detail->id}}">
                                <div>
                                    <p class="font-md">{{strlen($application_detail->job->job_headline) > 30 ? substr($application_detail->job->job_headline, 0, 30) . '...' : $application_detail->job->job_headline ?? '-'}}</p>
                                    <p class="font-sm text-slate-500">{{strlen($application_detail->job->company_name) > 20 ? substr($application_detail->job->company_name, 0, 20) . '...' : $application_detail->job->company_name ?? '-'}}</p>
                                </div>

                                <div class="flex mt-3">
                                    <div class="w-full bg-white px-2 py-2 rounded-full border mr-16">
                                        <div class="flex">
                                            <div class="w-4 h-4 ">
                                                @if($application_detail->applicationStatus->application_status_name == 'Not Shortlisted')
                                                <div class="bg-red-600 rounded-full">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white font-bold lg:w-4 lg:h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </div>
                                                @else
                                                <div class="bg-green-600 rounded-full">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-white font-bold lg:w-4 lg:h-4">
                                                        <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="text-xs text-gray-500 px-2">
                                                {{$application_detail->applicationStatus->application_status_name}}
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                {{$application_detail->updated_at->diffForHumans()}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="w-4/6">

                        @foreach($application_details as $application_detail)
                        <div x-show="tab === {{$application_detail->id}}" class="w-[900px]">
                            <h3 class="text-xl font-bold leading-tight pt-10" x-show="tab === {{$application_detail->id}}">
                                {{$application_detail->job->job_headline ?? '-'}}
                            </h3>
                            <p class="text-base text-slate-500 mt-2" x-show="tab === {{$application_detail->id}}">
                                {{$application_detail->job->company_name ?? '-'}}
                            </p>
                            <div class="border my-5"></div>

                            <h3 class="text-xl font-bold leading-tight my-5" x-show="tab === {{$application_detail->id}}">Application Status</h3>

                            <div class="text-xl w-[800px] overflow-x-scroll" x-show="tab === {{$application_detail->id}}" id="apply-status-scroll">
                                <ol class="flex items-center mb-4 sm:mb-5">
                                    @foreach($application_log_details as $application_log_detail)

                                    @if($application_log_detail->job_apply_id == $application_detail->id)

                                    <li class="flex w-full items-center text-gray-300  after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-300 after:border-4 after:inline-block  @if($application_log_detail->status == 7) after:border-white @endif @if($application_log_detail->status <= $application_detail->application_status) text-green-600 after:border-green-600 @endif @if($application_log_detail->status == 8) after:border-white @endif">
                                        <div class=" flex items-center justify-center w-6 h-6 bg-gray-300 rounded-full lg:h-6 lg:w-6 shrink-0 @if($application_log_detail->status == 7) bg-red-600  @endif @if($application_log_detail->status <= $application_detail->application_status) bg-green-600 @endif @if($application_log_detail->status == 8) bg-gray-200 @endif">


                                            @if($application_log_detail->status == 7)
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white font-bold lg:w-4 lg:h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>

                                            @else

                                            @if($application_log_detail->status <= $application_detail->application_status)
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-white font-bold lg:w-4 lg:h-4">
                                                    <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z" clip-rule="evenodd" />
                                                </svg>
                                                @elseif($application_log_detail->status == 8)
                                                <p class="w-2 h-2 border-4 border-gray-300 bg-white rounded-full lg:w-6 lg:h-6 "></p>
                                                @else
                                                <p class="w-2 h-2 border-4 border-green-600 bg-white rounded-full lg:w-6 lg:h-6 "></p>
                                                @endif


                                                @endif

                                        </div>
                                    </li>

                                    @endif

                                    @endforeach
                                </ol>
                                <ol class="flex">
                                    @foreach($application_log_details as $application_log_detail)
                                    @if($application_log_detail->job_apply_id == $application_detail->id)

                                    <li class="flex w-full items-start text-gray-300  ">
                                        <div class=" items-start justify-start rounded-full shrink-0 ">
                                            <p class="mb-2 text-sm font-semibold leading-none text-gray-900 ">
                                                <span class="break-status-text">
                                                    @if($application_log_detail->applicationJobStatus->application_status_name == 'Awaiting Recruiter Action')
                                                    Awaiting Recruiter <br> Action
                                                    @else
                                                    {{ $application_log_detail->applicationJobStatus->application_status_name }}
                                                    @endif
                                                </span>
                                            </p>
                                            @if($application_log_detail->status == 8)

                                            @if($application_detail->application_status == 8)
                                            <p class="mb-4 text-sm text-slate-500 font-medium leading-none">
                                                {{ date('d M y', strtotime($application_log_detail->created_at)) }}
                                            </p>
                                            @endif

                                            @else
                                            <p class="mb-4 text-sm text-slate-500 font-medium leading-none">
                                                {{ date('d M y', strtotime($application_log_detail->created_at)) }}
                                            </p>
                                            @endif

                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ol>
                            </div>

                            <div class="border my-5"></div>

                            <h3 class="text-xl font-bold leading-tight my-5" x-show="tab === {{$application_detail->id}}">Activity on this job</h3>

                            @php
                            $getJobCount = 0;
                            foreach($get_all_job_apply as $getJob) {
                            if ($getJob->job_id == $application_detail->job_id) {
                            $getJobCount++;
                            }
                            }

                            $getJobUpdateCount = 0;
                            foreach($get_update_job_apply as $getJobUpdate) {
                            if ($getJobUpdate->job_id == $application_detail->job_id) {
                            $getJobUpdateCount++;
                            }
                            }
                            @endphp
                            <div class="flex">
                                <div class="w-1/2">
                                    <div class="flex border py-4 rounded-lg">
                                        <div class="w-1/2 border-r-2 border-gray-200 justify-end pr-3">
                                            <div class="flex px-7">
                                                <div class="text-4xl my-auto font-medium pr-2">
                                                    {{ $getJobCount }}
                                                </div>
                                                <div class="text-md text-slate-500 font-normal px-2 py-1">Total <br> applications</div>
                                            </div>
                                        </div>
                                        <div class="w-1/2 ">
                                            <div class="flex px-5">
                                                <div class="text-4xl my-auto font-medium  pr-2">{{ $getJobUpdateCount }}</div>
                                                <div class="text-md text-slate-500 font-normal py-1 px-2">Applications <br>viewed by recruiter</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </section>
        </div>

    </div>
</div>