<div>
    <div class="text-end">
        <a href="/recruiter/job-posting" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Post a Job</a>
    </div>
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
        <div class="w-2/4">
            @if(isset($jobs) && $jobs->count() > 0)

            @foreach ($jobs as $job)
            <div class="flex bg-white shadow-lg rounded-xl mb-2 max-w-full">
                <div class=" items-start px-4 py-6 w-11/12">
                    <div>
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
                    </div>
                </div>
                <div class="1/12 text-end">
                    <ul class="py-10">
                        <li class="my-2">
                            <a href="/job/{{$job->id}}/view" target="_blank" class="inline-flex items-center px-3 py-1 border border-emerald-700 rounded-full text-emerald-700 hover:text-white hover:bg-emerald-700 text-sm">
                                <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                        </li>
                        <li class="my-2">
                            <a href="/recruiter/job/{{$job->id}}/edit" class="inline-flex items-center px-3 py-1 border border-blue-700 rounded-full text-blue-700 hover:text-white hover:bg-blue-700 text-sm">
                                <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                        </li>
                        <li class="my-2">
                            <button wire:click="deleteJobId({{ $job->id }})" class="inline-flex items-center px-3 py-1 border border-red-700 rounded-full text-red-700 hover:text-white hover:bg-red-700 text-sm" data-modal-toggle="delete-modal">
                                <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </li>
                    </ul>

                </div>
            </div>
            @endforeach

            <p>{{$jobs->links()}}</p>
            @else
            <div class="flex bg-white shadow-lg rounded-xl mb-2 max-w-full ">
                <div class="flex items-center px-6 py-6">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900 -mt-1">No job found </h2>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- delete modal -->
    <div wire:ignore.self id="delete-modal" data-modal-show="false" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                <div class="p-6 space-y-6">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-red-500 w-14 h-14 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg text-center font-normal text-gray-700 ">Are you sure you want to delete this job detail?</h3>
                </div>
                <div class="flex justify-end p-6 space-x-2">
                    <button data-modal-toggle="delete-modal" type="button" class="bg-red-500 ml-3 rounded-lg text-white hover:bg-red-400  border  text-sm font-medium px-2 py-2 ">Decline</button>
                    <button wire:click="delete()" class="px-2 py-2 bg-teal-500 ml-3 rounded-lg text-white hover:bg-teal-400">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal end -->
</div>