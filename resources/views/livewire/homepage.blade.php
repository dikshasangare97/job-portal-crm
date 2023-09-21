<div>
    <livewire:component.search />

    <div class="container mx-auto my-10">
        <h1 class="text-5xl font-bold text-center py-2 mt-10">Featured Jobs</h1>
        <h4 class="text-xl text-center font-medium py-2 mb-4">Jobs you may be interested in</h4>

        <div class="md:grid grid-cols-3 gap-4 min-w-7xl">
            @foreach($jobs as $job)
            <div class="bg-white shadow-xl rounded-b-lg px-4 py-4 border-b border-gray-500 mb-3">
                <a href="/job/{{$job->id}}/view" class="cursor-pointer">
                    <div class="flex flex-col justify-start">
                        <div class="flex justify-between items-center w-96">
                            <div class="text-lg font-semibold text-bookmark-blue flex space-x-1 items-center mb-2">
                                <svg class="w-10 h-10 text-gray-700 border rounded-lg" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fillRule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clipRule="evenodd" />
                                    <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                                </svg>
                            </div>
                            <p class="text-gray-500 text-xs">
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
                            <!-- <span class="bg-green-500 rounded-full uppercase text-white text-xs px-2 py-1 font-normal shadow-xl"> {{$job->workMode->work_mode_name}} </span> -->
                        </div>
                        <span class="text-md font-semibold"> {{$job->job_headline}}</span>
                        <span class="text-xs text-gray-500"> {{$job->company_name}}</span>

                        <div class="flex justify-between items-center w-96 mt-3">
                            <div class="text-xs flex space-x-1 items-center text-gray-500">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                <span>{{$job->location->city_name}}</span>
                            </div>
                            <div class="text-xs flex space-x-1 items-center text-gray-500">
                                <svg class="w-4 h-4 mr-1 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                                </svg>
                                <span>{{$job->work_experience}} Yrs</span>
                            </div>
                        </div>
                        <div>
                            @auth
                            <div class="mt-5">
                                <button class="mr-2 my-1 uppercase tracking-wider px-2 text-indigo-600 border-indigo-600 hover:bg-indigo-600 hover:text-white border text-sm font-semibold rounded py-1 transition transform duration-500 cursor-pointer">Apply</button>
                            </div>
                            @endauth
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="flex items-center justify-center py-6">
            <a href="/jobs" class="flex justify-center mt-4 bg-gradient-to-tr from-blue-500 to-indigo-500 text-indigo-100 py-3 w-48 rounded-md text-sm tracking-wide">View All Jobs</a>
        </div>
    </div>

</div>