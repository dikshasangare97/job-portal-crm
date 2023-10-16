<div>
    <div class="m-3 p-5 bg-white rounded-b-lg shadow-xl border-t-4 border-blue-400">
        <div class="flex">
            <div class="w-4/6">
                <h1 class="font-semibold text-2xl">Job application status</h1>
                <p class="text-sm text-slate-400 font-normal mt-2">Not getting views on your CV? Highlight your application to get recruiter's attention</p>
            </div>
            <div class="w-2/6">
                <div class="flex">
                    <div class="w-1/2 border-r-4 border-gray-200 flex justify-end pr-3">
                        <span class="text-5xl font-medium">24</span>
                        <span class="text-md text-slate-500 font-semibold px-2 py-1">Total <br> applies</span>
                    </div>
                    <div class="w-1/2 flex">
                        <span class="text-5xl font-medium ml-3">14</span>
                        <span class="text-md text-slate-500 font-semibold py-1 px-2">Application <br> updates</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex m-4 bg-white">
        <div class="flex flex-col justify-center ">
            <section class="py-5 mx-auto space-y-8 sm:py-5">
                <div class="container flex flex-row items-stretch  w-full space-x-12" x-data="{tab: 1}">
                    <div class="flex flex-col justify-start w-2/6 space-y-4 border-r pr-2 ">

                        <h1 class="font-semibold text-lg mx-auto my-5">Application status</h1>

                        @foreach($application_details as $application_detail)
                        <div class="p-4 font-semibold cursor-pointer" :class="{'z-20 border-r-2 bg-blue-100 transform translate-x-2 border-blue-500': tab === {{$application_detail->id}}, ' transform -translate-x-2': tab !== {{$application_detail->id}}}" @click.prevent="tab = {{$application_detail->id}}">
                            <p class="font-md">{{strlen($application_detail->job->job_headline) > 30 ? substr($application_detail->job->job_headline, 0, 30) . '...' : $application_detail->job->job_headline ?? '-'}}</p>
                            <p class="font-sm text-slate-500">{{strlen($application_detail->job->company_name) > 20 ? substr($application_detail->job->company_name, 0, 20) . '...' : $application_detail->job->company_name ?? '-'}}</p>
                        </div>
                        @endforeach
                    </div>
                    <div class="w-4/6">

                        @foreach($application_details as $application_detail)
                        <div x-show="tab === {{$application_detail->id}}" class="w-[900px]">

                            {{$application_detail->id}}
                            <h3 class="text-xl font-bold leading-tight pt-10" x-show="tab === {{$application_detail->id}}">
                                {{$application_detail->job->job_headline ?? '-'}}
                            </h3>
                            <p class="text-base text-slate-500 mt-2" x-show="tab === {{$application_detail->id}}">
                                {{$application_detail->job->company_name ?? '-'}}
                            </p>
                            <div class="border my-5"></div>


                            <div class="text-xl" x-show="tab === {{$application_detail->id}}">
                                <ol class="flex items-center w-full mb-4 sm:mb-5">
                                    @foreach($application_log_details as $application_log_detail)

                                    {{$application_log_detail->job_id}}

                                    <li class="flex w-full items-center text-gray-300  after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-300 after:border-4 after:inline-block  @if($application_log_detail->status == 7) after:border-red-600 @endif @if($application_log_detail->status <= $application_detail->application_status) text-green-600 after:border-green-600 @endif @if($application_log_detail->status == 8) after:border-white @endif" wire:click="setJobId({{ $application_log_detail->id }})">
                                        <div class="flex items-center justify-center w-6 h-6 bg-gray-300 rounded-full lg:h-6 lg:w-6 shrink-0 @if($application_log_detail->status == 7) bg-red-600 @endif @if($application_log_detail->status <= $application_detail->application_status) bg-green-600 @endif @if($application_log_detail->status == 8) bg-gray-200 @endif">
                                            @if($application_log_detail->status <= $application_detail->application_status)
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-white font-bold lg:w-4 lg:h-4">
                                                    <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z" clip-rule="evenodd" />
                                                </svg>
                                                @elseif($application_log_detail->status == 7)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white font-bold lg:w-4 lg:h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                @elseif($application_log_detail->status == 8)
                                                <p class="w-2 h-2 border-4 border-gray-300 bg-white rounded-full lg:w-6 lg:h-6 "></p>
                                                @else
                                                <p class="w-2 h-2 border-4 border-green-600 bg-white rounded-full lg:w-6 lg:h-6 "></p>
                                                @endif
                                        </div>
                                    </li>
                                    @endforeach
                                </ol>
                                <ol class="flex">
                                    @foreach($application_log_details as $application_log_detail)
                                    <li class="flex w-full items-center text-gray-300  after:content-[''] after:w-full after:h-1 after:inline-block ">
                                        <div class="flex items-center justify-center rounded-full lg:h-6 lg:w-6 shrink-0 ">
                                            <p class="mb-4 text-sm font-medium leading-none text-gray-900">
                                                <span>
                                                    {{ $application_log_detail->applicationJobStatus->application_status_name }}
                                                </span> <br>
                                                <span>
                                                    {{ date('d M y', strtotime($application_log_detail->created_at)) }}
                                                </span>
                                            </p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </section>
        </div>

    </div>
</div>