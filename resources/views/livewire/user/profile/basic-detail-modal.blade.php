<div>
    <form wire:submit="saveBasicDetail">
        <div class="px-5 pb-2">
            <h1 class=" items-center font-semibold tracking-wide text-gray-900 leading-8 text-xl pb-2">Basic details</h1>

            <div class="my-3 flex">
                <div class="w-full mr-2">
                    <label for="name" class="font-semibold text-sm text-gray-700">
                        Name <span class="text-sm text-red-600">*</span>
                    </label>
                    <br>
                    <input type="text" wire:model="name" id="name" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Name" value="{{ Auth::user()->name }}" />
                    <div class="text-xs text-red-600 font-semibold pt-1">@error('name') {{ $message }} @enderror</div>
                </div>
            </div>

            <div class="my-5 flex">
                <div class="w-full mr-2">
                    <h4 class="text-sm font-bold  text-slate-600"><span class="capitalize">{{ $userEmployment->designation_name ?? '-' }}</span> at <span class="capitalize">{{ $userEmployment->company_name ?? '-' }}</span></h4>
                    <p class="text-sm text-slate-500 mt-2">To edit go to Employment section.</p>
                    <p class="text-sm text-slate-500">Please remove your current employment if you want to mark yourself as fresher</p>
                </div>
            </div>

            <div class="my-3">
                <label class="font-semibold text-sm text-gray-700">Total experience <span class="text-sm text-red-600">*</span></label>
                <br>
                <div class="flex">
                    <div class="w-1/2 mr-2">
                        <select class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" wire:model="total_experience_year">
                            <option value="">Years</option>
                            <option value="0 Year">0 Year</option>
                            <option value="1 Year">1 Year</option>
                            <option value="2 Year">2 Year</option>
                            <option value="3 Year">3 Year</option>
                            <option value="4 Year">4 Year</option>
                            <option value="5 Year">5 Year</option>
                            <option value="6 Year">6 Year</option>
                            <option value="7 Year">7 Year</option>
                            <option value="8 Year">8 Year</option>
                            <option value="9 Year">9 Year</option>
                            <option value="10 Year">10 Year</option>
                            <option value="11 Year">11 Year</option>
                            <option value="12 Year">12 Year</option>
                            <option value="13 Year">13 Year</option>
                            <option value="14 Year">14 Year</option>
                            <option value="15 Year">15 Year</option>
                            <option value="16 Year">16 Year</option>
                            <option value="17 Year">17 Year</option>
                            <option value="18 Year">18 Year</option>
                            <option value="19 Year">19 Year</option>
                            <option value="20 Year">20 Year</option>
                            <option value="21 Year">21 Year</option>
                            <option value="22 Year">22 Year</option>
                            <option value="23 Year">23 Year</option>
                            <option value="24 Year">24 Year</option>
                            <option value="25 Year">25 Year</option>
                            <option value="26 Year">26 Year</option>
                            <option value="27 Year">27 Year</option>
                            <option value="28 Year">28 Year</option>
                            <option value="29 Year">29 Year</option>
                            <option value="30 Year">30 Year</option>
                            <option value="30+ Year">30+ Year</option>
                        </select>
                        <div class="text-xs text-red-600 font-semibold pt-1">@error('total_experience_year') {{ $message }} @enderror</div>
                    </div>
                    <div class="w-1/2">
                        <select class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" wire:model="total_experience_month">
                            <option value="">Months</option>
                            <option value="0 Months">0 Months</option>
                            <option value="1 Months">1 Months</option>
                            <option value="2 Months">2 Months</option>
                            <option value="3 Months">3 Months</option>
                            <option value="4 Months">4 Months</option>
                            <option value="5 Months">5 Months</option>
                            <option value="6 Months">6 Months</option>
                            <option value="7 Months">7 Months</option>
                            <option value="8 Months">8 Months</option>
                            <option value="9 Months">9 Months</option>
                            <option value="10 Months">10 Months</option>
                            <option value="11 Months">11 Months</option>
                        </select>
                        <div class="text-xs text-red-600 font-semibold pt-1">@error('total_experience_month') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>

            <div class="my-3">
                <label for="salary" class="font-semibold text-sm text-gray-700">
                    Current salary
                </label>
                <br>
                <input type="text" wire:model="salary" id="salary" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " wire:keydown.debounce.500ms="validateAndFormatSalary" wire:blur="formatSalary" placeholder="Eg. 15,000" />
                <div class="text-xs text-red-600 font-semibold pt-1">@error('salary') {{ $message }} @enderror</div>
            </div>

            <div class="my-3">
                <label for="current_location_name" class="font-semibold text-sm text-gray-700">
                    Current Location
                </label>
                <br>
                <input type="hidden" wire:model="current_location_name" readonly value="India">
                <input type="text" wire:model="current_location_name" id="current_location_name" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Current location" />
                <div class="text-xs text-red-600 font-semibold pt-1">@error('current_location_name') {{ $message }} @enderror</div>
            </div>

            <div class="my-3">
                <label for="contact_number" class="font-semibold text-sm text-gray-700">
                    Mobile number
                </label>
                <br>
                <input type="tel" wire:model="contact_number" id="contact_number" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Mobile number" value="{{ Auth::user()->contact_number }}" minlength="10" maxlength="10" onkeypress="return isNumber(event)" />
                <div class="text-xs text-red-600 font-semibold pt-1">@error('contact_number') {{ $message }} @enderror</div>
            </div>

            <div class="my-3 flex">
                <div class="w-full mr-2">
                    <label for="email" class="font-semibold text-sm text-gray-700">
                        Email address
                    </label>
                    <p class="text-sm text-slate-500">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <div class="my-5">
                <label for="notice_period" class="font-semibold text-sm text-gray-700">Notice period</label>
                <div class="grid w-[34rem] grid-cols-4 gap-2 mt-2">
                    <div>
                        <input type="radio" wire:model="notice_period" id="15_days" value="15 Days or less" class="peer hidden" checked />
                        <label for="15_days" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">15 Days or less</label>
                    </div>
                    <div>
                        <input type="radio" wire:model="notice_period" id="1_month" value="1 Month" class="peer hidden" />
                        <label for="1_month" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">1 Month</label>
                    </div>
                    <div>
                        <input type="radio" wire:model="notice_period" id="2_month" value="2 Months" class="peer hidden" />
                        <label for="2_month" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">2 Months</label>
                    </div>
                    <div>
                        <input type="radio" wire:model="notice_period" id="3_month" value="3 Months" class="peer hidden" />
                        <label for="3_month" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">3 Months</label>
                    </div>
                    <div>
                        <input type="radio" wire:model="notice_period" id="more_then_3_month" value="More than 3 Months" class="peer hidden" />
                        <label for="more_then_3_month" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">More than 3 Months</label>
                    </div>
                    <div>
                        <input type="radio" wire:model="notice_period" id="serving_notice_period" value="Serving Notice Period" class="peer hidden" />
                        <label for="serving_notice_period" class="block cursor-pointer border border-gray-400 select-none text-xs rounded-full px-1 py-2 text-center peer-checked:bg-gray-200 peer-checked:font-semibold peer-checked:text-black">Serving Notice Period</label>
                    </div>
                </div>
                <div class="text-xs text-red-600 font-semibold pt-1">@error('notice_period') {{ $message }} @enderror</div>
            </div>
        </div>
        <div class="flex justify-end p-6 space-x-2">
            <button data-modal-toggle="basic-detail-modal" type="button" class="bg-red-500 ml-3 rounded-lg text-white hover:bg-red-400  border  text-sm font-medium px-2 py-2 ">Cancel</button>
            <button type="submit" class="px-2 py-2 bg-blue-500 ml-3 rounded-lg text-white hover:bg-blue-400">Save</button>
        </div>
    </form>
</div>