<div class="bg-white p-5 shadow-sm rounded-xl">

    <div>
        @if (session()->has('projectmessage'))
        <div class="flex items-center p-4 mb-4 text-sm border-b border-lime-400" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5 text-lime-400">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-lime-400">Success</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('projectmessage') }}</span>
            </div>
        </div>
        @endif
        @if (session()->has('projecterror'))
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-b border-red-700" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-gray-800">Error</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('projecterror') }}</span>
            </div>
        </div>
        @endif
    </div>

    <div class="flex">
        <h1 class=" w-5/6 items-center font-semibold text-gray-900 leading-8 text-xl">
            <span class="tracking-wide">Projects</span>
        </h1>
        <div class="text-end">
            <button class="inline-flex items-center px-2 py-2 mr-5 font-bold text-blue-500 text-sm" data-modal-toggle="project-modal">Add&nbsp;project</button>
        </div>
    </div>

    <div class="flex mb-5">
        <div class="w-2/3">
            @foreach($project_details as $project_detail)
            <p class="font-semibold flex text-md text-gray-700 mt-5">
                {{ $project_detail->project_title ?? '-' }}
                <!-- <button wire:click="getProjectId({{$project_detail->id}})" class="text-blue-500 rounded-full" data-modal-toggle="project-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>
                </button> -->
                <button wire:click="getProjectId({{$project_detail->id}})" data-modal-toggle="delete-project-modal" class="text-red-500 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>
            </p>
            <p class="font-normal text-sm text-gray-700">{{ $project_detail->project_client_name ?? '-' }} (@if($project_detail->project_location)
                {{ $project_detail->location->city_name ?? '' }}
                :
                @endif
                @if($project_detail->project_client_name == 0)
                Offsite
                @else
                Onsite
                @endif)
            </p>
            <p class="font-normal text-sm text-gray-500">
                @php
                $months = ['Jan' => 1, 'Feb' => 2, 'Mar' => 3, 'Apr' => 4, 'May' => 5, 'Jun' => 6, 'Jul' => 7, 'Aug' => 8, 'Sep' => 9, 'Oct' => 10, 'Nov' => 11, 'Dec' => 12,];
                $joining = \Carbon\Carbon::create($project_detail->worked_from_year, $months[$project_detail->worked_from_month] ?? 1);
                $workedTill = \Carbon\Carbon::create($project_detail->worked_till_year ?? now()->year, $months[$project_detail->worked_till_month] ?? 1);
                $diff = $joining->diff($workedTill);

                @endphp
                <span>{{ $joining->format('M Y') }} to</span>
                @if($project_detail->worked_till_year)
                <span>
                    {{ $workedTill->format('M Y') }} (@if($project_detail->nature_of_employment == 0)
                    Full time
                    @elseif($project_detail->nature_of_employment == 1)
                    Part time
                    @elseif($project_detail->nature_of_employment == 2)
                    Contractual
                    @endif)
                </span>
                @else
                <span>
                    Present (@if($project_detail->nature_of_employment == 0)
                    Full time
                    @elseif($project_detail->nature_of_employment == 1)
                    Part time
                    @elseif($project_detail->nature_of_employment == 2)
                    Contractual
                    @endif)
                </span>
                @endif
            </p>
            @if($project_detail->project_detail)
            <p class="font-normal text-sm text-gray-700">{{ $project_detail->project_detail ?? '' }}</p>
            @endif

            @endforeach
        </div>
    </div>

    <!-- project modal -->
    <div wire:ignore.self id="project-modal" data-modal-show="false" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="text-end pt-5 pr-5">
                    <button data-modal-toggle="project-modal" class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </button>
                </div>
                <form wire:submit="saveProjectDetail">
                    <div class="px-5 pb-2">
                        <h1 class=" items-center font-semibold tracking-wide text-gray-900 leading-8 text-xl pb-2">Add project</h1>

                        <div class="my-3 flex">
                            <div class="w-full mr-2">
                                <label for="project_title" class="font-semibold text-sm text-gray-700">
                                    Project title <span class="text-sm text-red-600">*</span>
                                </label>
                                <br>
                                <input type="text" wire:model="project_title" id="project_title" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Enter project title" />
                                <div class="text-xs text-red-600 font-semibold pt-1">@error('project_title') {{ $message }} @enderror</div>
                            </div>
                        </div>

                        <div class="my-3 flex">
                            <div class="w-full mr-2">
                                <label for="project_employment_name" class="font-semibold text-sm text-gray-700">Tag this project with your employment/education </label>
                                <br>
                                <select wire:model="project_employment_name" id="project_employment_name" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 ">
                                    <option value="null">Select employment/education</option>
                                    @foreach($userEmploymentDetails as $userEmploymentDetail)
                                    <option value="{{ $userEmploymentDetail->designation_name }} - {{ $userEmploymentDetail->company_name }}">{{ $userEmploymentDetail->designation_name }} - {{ $userEmploymentDetail->company_name }} </option>
                                    @endforeach

                                    @foreach($userEducationDetails as $userEducationDetail)
                                    <option value="@if($userEducationDetail->education_name == '10th')
                                        Class X
                                        @elseif($userEducationDetail->education_name == '12th')
                                        Class XII
                                        @else
                                        {{ $userEducationDetail->education_name ?? '-' }}
                                        @endif">
                                        @if($userEducationDetail->education_name == '10th')
                                        Class X
                                        @elseif($userEducationDetail->education_name == '12th')
                                        Class XII
                                        @else
                                        {{ $userEducationDetail->education_name ?? '-' }}
                                        @endif
                                    </option>
                                    @endforeach
                                </select>
                                <div class="text-xs text-red-600 font-semibold pt-1">@error('project_employment_name') {{ $message }} @enderror</div>
                            </div>
                        </div>

                        <div class="my-3 flex">
                            <div class="w-full mr-2">
                                <label for="project_client_name" class="font-semibold text-sm text-gray-700">
                                    Client <span class="text-sm text-red-600">*</span>
                                </label>
                                <br>
                                <input type="text" wire:model="project_client_name" id="project_client_name" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Enter client name" />
                                <div class="text-xs text-red-600 font-semibold pt-1">@error('project_client_name') {{ $message }} @enderror</div>
                            </div>
                        </div>

                        <div class="my-3">
                            <label class="font-semibold text-sm text-gray-700">Project status</label>
                            <br>
                            <div class="flex my-4">
                                <div>
                                    <input id="project_status_inprogress" wire:model="project_status" wire:click="showProject_status" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="0">
                                    <label for="project_status_inprogress" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">In progress</label>
                                </div>
                                <div class="ml-10">
                                    <input id="project_status_finished" wire:model="project_status" type="radio" wire:click="showProject_status" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="1">
                                    <label for="project_status_finished" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Finished</label>
                                </div>
                            </div>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('project_status') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3">
                            <label class="font-semibold text-sm text-gray-700">
                                Working from
                                <span class="text-sm text-red-600">*</span>
                            </label>
                            <br>
                            <div class="flex">
                                <div class="w-1/2 mr-2">
                                    <select id="worked_from_year" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" wire:model="worked_from_year">
                                        <option value="Null" selected>Select Year</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="1994">1994</option>
                                        <option value="1993">1993</option>
                                        <option value="1992">1992</option>
                                        <option value="1991">1991</option>
                                        <option value="1990">1990</option>
                                        <option value="1989">1989</option>
                                        <option value="1988">1988</option>
                                        <option value="1987">1987</option>
                                        <option value="1986">1986</option>
                                        <option value="1985">1985</option>
                                        <option value="1984">1984</option>
                                        <option value="1983">1983</option>
                                        <option value="1982">1982</option>
                                        <option value="1981">1981</option>
                                        <option value="1980">1980</option>
                                        <option value="1979">1979</option>
                                        <option value="1978">1978</option>
                                        <option value="1977">1977</option>
                                        <option value="1976">1976</option>
                                        <option value="1975">1975</option>
                                        <option value="1974">1974</option>
                                        <option value="1973">1973</option>
                                        <option value="1972">1972</option>
                                        <option value="1971">1971</option>
                                        <option value="1970">1970</option>
                                    </select>
                                    <div class="text-xs text-red-600 font-semibold pt-1">@error('worked_from_year') {{ $message }} @enderror</div>
                                </div>
                                <div class="w-1/2">
                                    <select id="worked_from_month" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" wire:model="worked_from_month">
                                        <option value="Null" selected>Select Month</option>
                                        <option value="Jan">Jan</option>
                                        <option value="Feb">Feb</option>
                                        <option value="Mar">Mar</option>
                                        <option value="Apr">Apr</option>
                                        <option value="May">May</option>
                                        <option value="Jun">Jun</option>
                                        <option value="Jul">Jul</option>
                                        <option value="Aug">Aug</option>
                                        <option value="Sep">Sep</option>
                                        <option value="Oct">Oct</option>
                                        <option value="Nov">Nov</option>
                                        <option value="Dec">Dec</option>
                                    </select>
                                    <div class="text-xs text-red-600 font-semibold pt-1">@error('worked_from_month') {{ $message }} @enderror</div>
                                </div>
                            </div>
                        </div>

                        @if($project_status == 1)
                        <div class="my-3">
                            <label class="font-semibold text-sm text-gray-700">Worked till </label>
                            <br>
                            <div class="flex">
                                <div class="w-1/2 mr-2">
                                    <select id="worked_till_year" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" wire:model="worked_till_year">
                                        <option value="Null" selected>Select Year</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="1994">1994</option>
                                        <option value="1993">1993</option>
                                        <option value="1992">1992</option>
                                        <option value="1991">1991</option>
                                        <option value="1990">1990</option>
                                        <option value="1989">1989</option>
                                        <option value="1988">1988</option>
                                        <option value="1987">1987</option>
                                        <option value="1986">1986</option>
                                        <option value="1985">1985</option>
                                        <option value="1984">1984</option>
                                        <option value="1983">1983</option>
                                        <option value="1982">1982</option>
                                        <option value="1981">1981</option>
                                        <option value="1980">1980</option>
                                        <option value="1979">1979</option>
                                        <option value="1978">1978</option>
                                        <option value="1977">1977</option>
                                        <option value="1976">1976</option>
                                        <option value="1975">1975</option>
                                        <option value="1974">1974</option>
                                        <option value="1973">1973</option>
                                        <option value="1972">1972</option>
                                        <option value="1971">1971</option>
                                        <option value="1970">1970</option>
                                    </select>
                                    <div class="text-xs text-red-600 font-semibold pt-1">@error('worked_till_year') {{ $message }} @enderror</div>
                                </div>
                                <div class="w-1/2">
                                    <select id="worked_till_month" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" wire:model="worked_till_month">
                                        <option value="Null" selected>Select Month</option>
                                        <option value="Jan">Jan</option>
                                        <option value="Feb">Feb</option>
                                        <option value="Mar">Mar</option>
                                        <option value="Apr">Apr</option>
                                        <option value="May">May</option>
                                        <option value="Jun">Jun</option>
                                        <option value="Jul">Jul</option>
                                        <option value="Aug">Aug</option>
                                        <option value="Sep">Sep</option>
                                        <option value="Oct">Oct</option>
                                        <option value="Nov">Nov</option>
                                        <option value="Dec">Dec</option>
                                    </select>
                                    <div class="text-xs text-red-600 font-semibold pt-1">@error('worked_till_month') {{ $message }} @enderror</div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="my-3">
                            <label for="project_detail" class="font-semibold text-sm text-gray-700">Details of project <span class="text-sm text-red-600">*</span></label>
                            <br>
                            <textarea type="text" wire:model="project_detail" id="project_detail" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Type here..."></textarea>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('project_detail') {{ $message }} @enderror</div>
                        </div>


                        <div class="my-3 flex">
                            <div class="w-full mr-2">
                                <label for="project_location" class="font-semibold text-sm text-gray-700">Project location</label>
                                <br>
                                <select wire:model="project_location" id="project_location" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 ">
                                    <option value="">Select location</option>
                                    @foreach($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->city_name }}</option>
                                    @endforeach
                                </select>
                                <div class="text-xs text-red-600 font-semibold pt-1">@error('project_location') {{ $message }} @enderror</div>
                            </div>
                        </div>

                        <div class="my-3">
                            <label class="font-semibold text-sm text-gray-700">Project site</label>
                            <br>
                            <div class="flex my-4">
                                <div>
                                    <input id="project_site_offsite" wire:model="project_site" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="0">
                                    <label for="project_site_offsite" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Offsite</label>
                                </div>
                                <div class="ml-10">
                                    <input id="project_site_onsite" wire:model="project_site" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="1">
                                    <label for="project_site_onsite" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Onsite</label>
                                </div>
                            </div>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('project_site') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3">
                            <label class="font-semibold text-sm text-gray-700">Nature of employment</label>
                            <br>
                            <div class="flex my-4">
                                <div>
                                    <input id="nature_of_employment_fulltime" wire:model="nature_of_employment" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="0">
                                    <label for="nature_of_employment_fulltime" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Full time</label>
                                </div>
                                <div class="ml-10">
                                    <input id="nature_of_employment_parttime" wire:model="nature_of_employment" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="1">
                                    <label for="nature_of_employment_parttime" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Part time</label>
                                </div>
                                <div class="ml-10">
                                    <input id="nature_of_employment_contractual" wire:model="nature_of_employment" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="2">
                                    <label for="nature_of_employment_contractual" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Contractual</label>
                                </div>
                            </div>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('nature_of_employment') {{ $message }} @enderror</div>
                        </div>

                        <div class="flex">
                            <div class="w-full mr-2">
                                <label class="font-semibold text-sm text-gray-700">Team size</label>
                                <select class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" wire:model="team_size">
                                    <option value="">Select team size</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                </select>
                                <div class="text-xs text-red-600 font-semibold pt-1">@error('team_size') {{ $message }} @enderror</div>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="w-full mr-2">
                                <label class="font-semibold text-sm text-gray-700">Role</label>
                                <select class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" wire:model="role">
                                    <option value="">Select role</option>
                                    <option value="Domain Expert">Domain Expert</option>
                                    <option value="Sr. Project Leader">Sr. Project Leader</option>
                                    <option value="Solution Architect">Solution Architect</option>
                                    <option value="Quality Analyst">Quality Analyst</option>
                                    <option value="Database Architect / DBA">Database Architect / DBA</option>
                                    <option value="Network / System Administrator">Network / System Administrator</option>
                                    <option value="Project Leader">Project Leader</option>
                                    <option value="Module Leader">Module Leader</option>
                                    <option value="Sr. Programmer">Sr. Programmer</option>
                                    <option value="Programmer">Programmer</option>
                                    <option value="Test Engineer">Test Engineer</option>
                                    <option value="Other">Other</option>
                                </select>
                                <div class="text-xs text-red-600 font-semibold pt-1">@error('role') {{ $message }} @enderror</div>
                            </div>
                        </div>

                        <div class="my-3">
                            <label for="role_descripion" class="font-semibold text-sm text-gray-700">Role description</label>
                            <br>
                            <textarea type="text" wire:model="role_descripion" id="role_descripion" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Type here..."></textarea>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('role_descripion') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3">
                            <label for="skill_used" class="font-semibold text-sm text-gray-700">Skills used </label>
                            <br>
                            <select multiple wire:model="skill_used" id="skill_used" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 ">
                                <option value="">Select skills</option>
                                @foreach($key_skills as $key_skill)
                                <option value="{{ $key_skill->id }}">{{ $key_skill->key_skill_name }}</option>
                                @endforeach
                            </select>
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('skill_used') {{ $message }} @enderror</div>
                        </div>

                        <div class="flex justify-end p-6 space-x-2">
                            <button data-modal-toggle="project-modal" type="button" class="bg-red-500 ml-3 rounded-lg text-white hover:bg-red-400  border  text-sm font-medium px-2 py-2 ">Cancel</button>
                            <button type="submit" class="px-2 py-2 bg-blue-500 ml-3 rounded-lg text-white hover:bg-blue-400">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- project modal end -->

    <!-- delete project modal -->
    <div wire:ignore.self id="delete-project-modal" data-modal-show="false" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="p-6 space-y-6">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-red-500 w-14 h-14 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg text-center font-normal text-gray-700 ">Are you sure you want to delete the project detail?</h3>
                </div>
                <div class="flex justify-end p-6 space-x-2">
                    <button data-modal-toggle="delete-project-modal" type="button" class="bg-red-500 ml-3 rounded-lg text-white hover:bg-red-400  border  text-sm font-medium px-2 py-2 ">Decline</button>
                    <button wire:click="deleteProject()" class="px-2 py-2 bg-blue-500 ml-3 rounded-lg text-white hover:bg-blue-400">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal end -->
</div>