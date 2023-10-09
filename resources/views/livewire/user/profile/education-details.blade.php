<div class="bg-white p-5 shadow-sm rounded-xl">

    <div>
        @if (session()->has('educationmessage'))
        <div class="flex items-center p-4 mb-4 text-sm border-b border-lime-400" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5 text-lime-400">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-lime-400">Success</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('educationmessage') }}</span>
            </div>
        </div>
        @endif
        @if (session()->has('educationerror'))
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-b border-red-700" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-gray-800">Error</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('educationerror') }}</span>
            </div>
        </div>
        @endif
    </div>

    <div class="flex">
        <h1 class=" w-5/6 items-center font-semibold text-gray-900 leading-8 text-xl">
            <span class="tracking-wide">Education</span>
        </h1>
        <div class="text-end">
            <button class="inline-flex items-center px-2 py-2 mr-5 font-bold text-blue-500 text-sm ml-3" data-modal-toggle="career-profile-modal">
                Add Education
            </button>
        </div>
    </div>

    <div class="flex my-5">
        <div class="w-2/3">
            @foreach($userEducationDetails as $userEducationDetail)
            <p class="font-semibold flex text-md text-gray-700 mt-5">
                @if($userEducationDetail->education_name == '10th')
                Class X
                @elseif($userEducationDetail->education_name == '12th')
                Class XII
                @else
                {{ $userEducationDetail->education_name ?? '-' }}
                @endif
                <!-- <button wire:click="getEducationId({{$userEducationDetail->id}})" class="text-blue-500 rounded-full" data-modal-toggle="career-profile-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>
                </button> -->
                <button wire:click="getEducationId({{$userEducationDetail->id}})" data-modal-toggle="delete-education-modal" class="text-red-500 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>
            </p>
            <p class="font-normal text-sm text-gray-700">{{ $userEducationDetail->university_name ?? '-' }}</p>
            <p class="font-normal text-sm text-gray-500">
                {{ $userEducationDetail->course_duration_to ?? '-' }}
                @if($userEducationDetail->course_duration_from)
                - {{ $userEducationDetail->course_duration_from ?? '-' }}
                @endif
                | {{ $userEducationDetail->course_type ?? '-' }}
            </p>
            @endforeach
        </div>
    </div>

    <!-- education modal -->
    <div wire:ignore.self id="career-profile-modal" data-modal-show="false" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="text-end pt-5 pr-5">
                    <button data-modal-toggle="career-profile-modal" class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </button>
                </div>

                <form wire:submit="saveCareerDetail">
                    <div class="px-5 pb-2">
                        <h1 class=" items-center font-semibold tracking-wide text-gray-900 leading-8 text-xl pb-2">Add education</h1>

                        <div class="my-3">
                            <label for="education" class="font-semibold text-sm text-gray-700">Education<span class="text-red-700">*</span></label>
                            <br>
                            <select wire:model="education_name" id="education" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" aria-placeholder="Select education">
                                <option value="">Select education</option>
                                <option value="Doctorate/PhD">Doctorate/PhD</option>
                                <option value="Graduation/Diploma">Graduation/Diploma</option>
                                <option value="Masters/Post-Graduation">Masters/Post-Graduation</option>
                                <option value="12th">12th</option>
                                <option value="10th">10th</option>
                            </select>
                            <div class="text-xs text-red-600 font-bold">@error('education_name') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3">
                            <label for="university_name" class="font-semibold text-sm text-gray-700">University/Institute <span class="text-red-700">*</span></label>
                            <br>
                            <input type="text" wire:model="university_name" id="university_name" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="University/Institute" />
                            <div class="text-xs text-red-600 font-bold">@error('university_name') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3">
                            <label for="course_name" class="font-semibold text-sm text-gray-700">Course <span class="text-red-700">*</span></label>
                            <br>
                            <input type="text" wire:model="course_name" id="course_name" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Course" />
                            <div class="text-xs text-red-600 font-bold">@error('course_name') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3">
                            <label for="specialization_name" class="font-semibold text-sm text-gray-700">Specialization <span class="text-red-700">*</span></label>
                            <br>
                            <input type="text" wire:model="specialization_name" id="specialization_name" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Specialization" />
                            <div class="text-xs text-red-600 font-bold">@error('specialization_name') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3">
                            <label class="font-semibold text-sm text-gray-700">Course type <span class="text-red-700">*</span></label>
                            <br>
                            <div class="flex my-3">
                                <div>
                                    <input id="Full-time" wire:model="course_type" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="Full time">
                                    <label for="Full-time" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Full time</label>
                                </div>
                                <div class="ml-10">
                                    <input id="Part-time" wire:model="course_type" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="Part time">
                                    <label for="Part-time" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Part time</label>
                                </div>
                                <div class="ml-10">
                                    <input id="Correspondence" wire:model="course_type" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="Correspondence/Distance learning">
                                    <label for="Correspondence" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Correspondence/Distance learning</label>
                                </div>
                            </div>
                            <div class="text-xs text-red-600 font-bold">@error('course_type') {{ $message }} @enderror</div>
                        </div>


                        <div class="my-3">
                            <label class="font-semibold text-sm text-gray-700">Course duration <span class="text-red-700">*</span></label>
                            <br>
                            <div class="flex">
                                <div>
                                    <select class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-60 py-2" wire:model="course_duration_to">
                                        <option value="">Starting year</option>
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
                                        <option value="1969">1969</option>
                                        <option value="1968">1968</option>
                                        <option value="1967">1967</option>
                                        <option value="1966">1966</option>
                                        <option value="1965">1965</option>
                                        <option value="1964">1964</option>
                                        <option value="1963">1963</option>
                                        <option value="1962">1962</option>
                                        <option value="1961">1961</option>
                                        <option value="1960">1960</option>
                                        <option value="1959">1959</option>
                                        <option value="1958">1958</option>
                                        <option value="1957">1957</option>
                                        <option value="1956">1956</option>
                                        <option value="1955">1955</option>
                                        <option value="1954">1954</option>
                                        <option value="1953">1953</option>
                                        <option value="1952">1952</option>
                                        <option value="1951">1951</option>
                                        <option value="1950">1950</option>
                                        <option value="1949">1949</option>
                                        <option value="1948">1948</option>
                                        <option value="1947">1947</option>
                                        <option value="1946">1946</option>
                                        <option value="1945">1945</option>
                                        <option value="1944">1944</option>
                                        <option value="1943">1943</option>
                                        <option value="1942">1942</option>
                                        <option value="1941">1941</option>
                                        <option value="1940">1940</option>
                                    </select>
                                    <div class="text-xs text-red-600 font-bold">@error('course_duration_to') {{ $message }} @enderror</div>
                                </div>
                                <div>
                                    <label class="ml-2 mt-2 text-sm font-medium text-gray-900">To</label>
                                </div>
                                <div class="ml-10">
                                    <select class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-60 py-2" wire:model="course_duration_from">
                                        <option value="">Ending year</option>
                                        <option value="2023">2030</option>
                                        <option value="2023">2029</option>
                                        <option value="2023">2028</option>
                                        <option value="2023">2027</option>
                                        <option value="2023">2026</option>
                                        <option value="2023">2025</option>
                                        <option value="2023">2024</option>
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
                                        <option value="1969">1969</option>
                                        <option value="1968">1968</option>
                                        <option value="1967">1967</option>
                                        <option value="1966">1966</option>
                                        <option value="1965">1965</option>
                                        <option value="1964">1964</option>
                                        <option value="1963">1963</option>
                                        <option value="1962">1962</option>
                                        <option value="1961">1961</option>
                                        <option value="1960">1960</option>
                                        <option value="1959">1959</option>
                                        <option value="1958">1958</option>
                                        <option value="1957">1957</option>
                                        <option value="1956">1956</option>
                                        <option value="1955">1955</option>
                                        <option value="1954">1954</option>
                                        <option value="1953">1953</option>
                                        <option value="1952">1952</option>
                                        <option value="1951">1951</option>
                                        <option value="1950">1950</option>
                                        <option value="1949">1949</option>
                                        <option value="1948">1948</option>
                                        <option value="1947">1947</option>
                                        <option value="1946">1946</option>
                                        <option value="1945">1945</option>
                                        <option value="1944">1944</option>
                                        <option value="1943">1943</option>
                                        <option value="1942">1942</option>
                                        <option value="1941">1941</option>
                                        <option value="1940">1940</option>
                                    </select>
                                    <div class="text-xs text-red-600 font-bold">@error('course_duration_from') {{ $message }} @enderror</div>
                                </div>
                            </div>
                        </div>

                        <div class="my-3">
                            <label for="grading_system" class="font-semibold text-sm text-gray-700">Grading system</label>
                            <br>
                            <select class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" wire:model="grading_system">
                                <option value="">Select Grading system</option>
                                <option value="Scale 10 Grading System">Scale 10 Grading System</option>
                                <option value="Scale 4 Grading System">Scale 4 Grading System</option>
                                <option value="% Marks of 100 Maximum">% Marks of 100 Maximum</option>
                                <option value="Course Requires a Pass">Course Requires a Pass</option>
                            </select>
                            <div class="text-xs text-red-600 font-bold">@error('grading_system') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3">
                            <label for="marks" class="font-semibold text-sm text-gray-700">Marks <span class="text-red-700">*</span></label>
                            <br>
                            <input type="text" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" wire:model="marks" />
                            <div class="text-xs text-red-600 font-bold">@error('marks') {{ $message }} @enderror</div>
                        </div>

                    </div>
                    <div class="flex justify-end p-6 space-x-2">
                        <button data-modal-toggle="career-profile-modal" type="button" class="bg-red-500 ml-3 rounded-lg text-white hover:bg-red-400  border  text-sm font-medium px-2 py-2 ">Cancel</button>
                        <button type="submit" class="px-2 py-2 bg-blue-500 ml-3 rounded-lg text-white hover:bg-blue-400">Save</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <!-- education modal end -->

    <!-- delete education modal -->
    <div wire:ignore.self id="delete-education-modal" data-modal-show="false" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="p-6 space-y-6">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-red-500 w-14 h-14 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg text-center font-normal text-gray-700 ">Are you sure you want to delete the education detail?</h3>
                </div>
                <div class="flex justify-end p-6 space-x-2">
                    <button data-modal-toggle="delete-education-modal" type="button" class="bg-red-500 ml-3 rounded-lg text-white hover:bg-red-400  border  text-sm font-medium px-2 py-2 ">Decline</button>
                    <button wire:click="deleteEducation()" class="px-2 py-2 bg-blue-500 ml-3 rounded-lg text-white hover:bg-blue-400">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal end -->

</div>