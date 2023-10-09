<div class="bg-white p-5 shadow-sm rounded-xl">

    <div>
        @if (session()->has('personaldetailmessage'))
        <div class="flex items-center p-4 mb-4 text-sm border-b border-lime-400" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5 text-lime-400">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-lime-400">Success</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('personaldetailmessage') }}</span>
            </div>
        </div>
        @endif
        @if (session()->has('error'))
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-b border-red-700" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-gray-800">Error</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('error') }}</span>
            </div>
        </div>
        @endif
    </div>

    <div class="flex">
        <h1 class=" items-center font-semibold text-gray-900 leading-8 text-xl">
            <span class="tracking-wide">Personal details</span>
        </h1>
        <div>
            <button class="inline-flex items-center px-2 py-2 mr-5 text-gray-600 ml-3" data-modal-toggle="personal-detail-modal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                </svg>
            </button>

        </div>
    </div>

    <div class="flex my-5">
        <div class="w-1/2">
            <p class="font-normal text-sm text-gray-400">Personal</p>
            <p class="font-semibold text-md text-gray-700">{{ $userPersonalDetail->gender ?? '-' }}
                @if($userPersonalDetail->marital_status)
                ,{{ $userPersonalDetail->marital_status ?? '' }}
                @endif
            </p>
        </div>
        <div class="w-1/2">
            <p class="font-normal text-sm text-gray-400">Career break</p>
            <p class="font-semibold text-md text-gray-700">
                @if($userPersonalDetail->career_break == 0)
                No
                @else
                Yes
                @endif
            </p>
        </div>
    </div>

    <div class="flex my-5">
        <div class="w-1/2">
            <p class="font-normal text-sm text-gray-400">Date of birth</p>
            <p class="font-semibold text-md text-gray-700">
                @if($userPersonalDetail->date_of_birth)
                {{date('d M Y',strtotime($userPersonalDetail->date_of_birth))}}
                @else
                -
                @endif
            </p>
        </div>
        <div class="w-1/2">
            <p class="font-normal text-sm text-gray-400">Work permit</p>
            <p class="font-semibold text-md text-gray-700">{{ $userPersonalDetail->work_permit_country ?? '-' }}</p>
        </div>
    </div>

    <div class="flex my-5">
        <div class="w-1/2">
            <p class="font-normal text-sm text-gray-400">Category</p>
            <p class="font-semibold text-md text-gray-700">{{ $userPersonalDetail->category ?? '-' }}</p>
        </div>
        <div class="w-1/2">
            <p class="font-normal text-sm text-gray-400">Address</p>
            <p class="font-semibold text-md text-gray-700">
                {{ $userPersonalDetail->permanent_address ?? '-' }}
                @if($userPersonalDetail->hometown)
                , {{ $userPersonalDetail->hometown ?? '' }}
                @endif
                @if($userPersonalDetail->pincode)
                , {{ $userPersonalDetail->pincode ?? '' }}
                @endif
            </p>
        </div>
    </div>

    <div class="flex my-5">
        <div class="w-1/2">
            <p class="font-normal text-sm text-gray-400">Differently abled</p>
            <p class="font-semibold text-md text-gray-700">
                @if($userPersonalDetail->differently_abled == 0)
                No
                @else
                Yes
                @endif
            </p>
        </div>
    </div>

    <!-- personal details modal -->
    <div wire:ignore.self id="personal-detail-modal" data-modal-show="false" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="text-end pt-5 pr-5">
                    <button data-modal-toggle="personal-detail-modal" class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </button>
                </div>
                <form wire:submit="savePersonalDetail">
                    <div class="px-5 pb-2">
                        <h1 class=" items-center font-semibold tracking-wide text-gray-900 leading-8 text-xl pb-2">Personal details</h1>

                        <div class="my-5">
                            <label for="gender" class="font-semibold text-sm text-gray-700">Gender</label>
                            <div class="grid w-[30rem] grid-cols-4 gap-2 mt-2">
                                <div>
                                    <input type="radio" wire:model="gender" id="Male" value="Male" class="peer hidden" checked />
                                    <label for="Male" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">Male</label>
                                </div>
                                <div>
                                    <input type="radio" wire:model="gender" id="Female" value="Female" class="peer hidden" />
                                    <label for="Female" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">Female</label>
                                </div>
                                <div>
                                    <input type="radio" wire:model="gender" id="Transgender" value="Transgender" class="peer hidden" />
                                    <label for="Transgender" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">Transgender</label>
                                </div>
                            </div>
                            <div class="text-xs text-red-600 font-bold">@error('gender') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-5">
                            <label for="marital_status" class="font-semibold text-sm text-gray-700">Marital status</label>
                            <div class="grid w-[34rem] grid-cols-4 gap-2 mt-2">
                                <div>
                                    <input type="radio" wire:model="marital_status" id="Single" value="Single/unmarried" class="peer hidden" checked />
                                    <label for="Single" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">Single/unmarried</label>
                                </div>
                                <div>
                                    <input type="radio" wire:model="marital_status" id="Married" value="Married" class="peer hidden" />
                                    <label for="Married" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">Married</label>
                                </div>
                                <div>
                                    <input type="radio" wire:model="marital_status" id="Widowed" value="Widowed" class="peer hidden" />
                                    <label for="Widowed" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">Widowed</label>
                                </div>
                                <div>
                                    <input type="radio" wire:model="marital_status" id="Divorced" value="Divorced" class="peer hidden" />
                                    <label for="Divorced" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">Divorced</label>
                                </div>
                                <div>
                                    <input type="radio" wire:model="marital_status" id="Separated" value="Separated" class="peer hidden" />
                                    <label for="Separated" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">Separated</label>
                                </div>
                                <div>
                                    <input type="radio" wire:model="marital_status" id="Other" value="Other" class="peer hidden" />
                                    <label for="Other" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">Other</label>
                                </div>
                            </div>
                            <div class="text-xs text-red-600 font-bold">@error('marital_status') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-5">
                            <label for="date_of_birth" class="font-semibold text-sm text-gray-700">Date of birth</label>
                            <div class="relative mb-3" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                <input type="date" wire:model="date_of_birth" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" placeholder="Select a date" onfocus="this.showPicker()" />
                            </div>
                            <div class="text-xs text-red-600 font-bold">@error('date_of_birth') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-5">
                            <label for="category" class="font-semibold text-sm text-gray-700">Category</label>
                            <p class="text-sm text-gray-500 pb-2">Companies welcome people from various categories to bring equality among all citizens</p>
                            <div class="grid w-[38rem] grid-cols-4 gap-2 mt-2">
                                <div>
                                    <input type="radio" wire:model="category" id="General" value="General" class="peer hidden" checked />
                                    <label for="General" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">General</label>
                                </div>
                                <div>
                                    <input type="radio" wire:model="category" id="Scheduled_Caste" value="Scheduled Caste (SC)" class="peer hidden" />
                                    <label for="Scheduled_Caste" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">Scheduled Caste (SC)</label>
                                </div>
                                <div>
                                    <input type="radio" wire:model="category" id="Scheduled_Tribe" value="Scheduled Tribe (ST)" class="peer hidden" />
                                    <label for="Scheduled_Tribe" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">Scheduled Tribe (ST)</label>
                                </div>
                                <div>
                                    <input type="radio" wire:model="category" id="Creamy" value="OBC - Creamy" class="peer hidden" />
                                    <label for="Creamy" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">OBC - Creamy</label>
                                </div>
                                <div>
                                    <input type="radio" wire:model="category" id="OBC_Non_creamy" value="OBC - Non creamy" class="peer hidden" />
                                    <label for="OBC_Non_creamy" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">OBC - Non creamy</label>
                                </div>
                                <div>
                                    <input type="radio" wire:model="category" id="Other" value="Other" class="peer hidden" />
                                    <label for="Other" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">Other</label>
                                </div>
                            </div>
                            <div class="text-xs text-red-600 font-bold">@error('category') {{ $message }} @enderror</div>
                        </div>


                        <div class="my-5">
                            <label for="differently_abled" class="font-semibold text-sm text-gray-700">Are you differently abled?</label>
                            <br>
                            <div class="flex my-4">
                                <div>
                                    <input id="Yes" wire:model="differently_abled" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="1">
                                    <label for="Yes" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Yes</label>
                                </div>
                                <div class="ml-10">
                                    <input id="No" wire:model="differently_abled" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="0">
                                    <label for="No" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">No</label>
                                </div>
                            </div>
                            <div class="text-xs text-red-600 font-bold">@error('differently_abled') {{ $message }} @enderror</div>
                        </div>


                        <div class="my-5">
                            <label for="career_break" class="font-semibold text-sm text-gray-700">Have you taken a career break?</label>
                            <br>
                            <div class="flex my-4">
                                <div>
                                    <input id="Yes" wire:model="career_break" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="1">
                                    <label for="Yes" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">yes</label>
                                </div>
                                <div class="ml-10">
                                    <input id="No" wire:model="career_break" type="radio" class="w-3 h-3 text-blue-600 bg-gray-100 border-gray-300" value="0">
                                    <label for="No" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">No</label>
                                </div>
                            </div>
                            <div class="text-xs text-red-600 font-bold">@error('career_break') {{ $message }} @enderror</div>
                        </div>


                        <div class="my-5">
                            <label for="work_permit_usa" class="font-semibold text-sm text-gray-700">Work permit for USA</label>
                            <br>
                            <select wire:model="work_permit_usa" id="work_permit_usa" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 ">
                                <option value="">Select work permit</option>
                                <option value="Have US H1 Visa">Have US H1 Visa</option>
                                <option value="Need US H1 Visa">Need US H1 Visa</option>
                                <option value="US TN Permit Holder">US TN Permit Holder</option>
                                <option value="US Green Card Holder">US Green Card Holder</option>
                                <option value="US Citizen">US Citizen</option>
                                <option value="Authorized to work in US">Authorized to work in US</option>
                            </select>
                            <div class="text-xs text-red-600 font-bold">@error('work_permit_usa') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-5">
                            <label for="work_permit_country" class="font-semibold text-sm text-gray-700">Work permit for other countries</label>
                            <br>
                            <select wire:model="work_permit_country" id="work_permit_country" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 ">
                                <option selected value="India">India</option>
                                <option value="Australia">Australia</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Canada">Canada</option>
                                <option value="China">China</option>
                                <option value="Dubai">Dubai</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Italy">Italy</option>
                                <option value="Japan">Japan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Libya">Libya</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Russia">Russia</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Singapore">Singapore</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Thailand">Thailand</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                            <div class="text-xs text-red-600 font-bold">@error('work_permit_country') {{ $message }} @enderror</div>
                        </div>


                        <div class="my-5">
                            <label for="permanent_address" class="font-semibold text-sm text-gray-700">Permanent address</label>
                            <br>
                            <input type="text" wire:model="permanent_address" id="permanent_address" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" placeholder="Permanent address">
                            <div class="text-xs text-red-600 font-bold">@error('permanent_address') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-5">
                            <label for="hometown" class="font-semibold text-sm text-gray-700">Hometown</label>
                            <br>
                            <input type="text" id="hometown" wire:model="hometown" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" placeholder="Hometown">
                            <div class="text-xs text-red-600 font-bold">@error('hometown') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-5">
                            <label for="pincode" class="font-semibold text-sm text-gray-700">Pincode</label>
                            <br>
                            <input type="text" id="pincode" wire:model="pincode" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" minlength="6" maxlength="6" placeholder="Pincode">
                            <div class="text-xs text-red-600 font-bold">@error('pincode') {{ $message }} @enderror</div>
                        </div>



                    </div>
                    <div class="flex justify-end p-6 space-x-2">
                        <button data-modal-toggle="personal-detail-modal" type="button" class="bg-red-500 ml-3 rounded-lg text-white hover:bg-red-400  border  text-sm font-medium px-2 py-2 ">Cancel</button>
                        <button type="submit" class="px-2 py-2 bg-blue-500 ml-3 rounded-lg text-white hover:bg-blue-400">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- personal details modal end -->
</div>