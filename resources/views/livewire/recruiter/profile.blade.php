<div>
    <div class="bg-gray-100">
        <div class="container m-auto">
            <div class="flex flex-wrap sm:flex-nowrap md:flex-nowrap lg:flex-nowrap">
                <div class="w-full md:w-1/3 lg:w-1/3 sm:mr-1 md:mr-1 lg:mr-1">
                    <div class=" text-black bg-white shadow-lg rounded-xl">
                        <div class="flex">
                            <div class="w-full  p-6 my-auto">
                                <livewire:user.profile.user-profile-image />
                            </div>
                        </div>
                        <div class="flex">
                            <div class="w-full  p-10">
                                <h3 class="text-2xl font-bold capitalize">{{ Auth::user()->name ?? '-' }}</h3>
                                <h4 class="text-sm font-bold capitalize text-slate-600">{{ Auth::user()->designation ?? '-' }}</h4>
                                <p class="text-sm  text-slate-500">at <span class="font-semibold capitalize">{{ Auth::user()->company_name ?? '-' }}</span></p>
                                <div class="border-b my-5"></div>
                                <div class="flex">
                                    <div class="w-full">
                                        <div class="flex text-sm  text-slate-500 font-normal py-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2 mt-0.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                            </svg>
                                            <p>{{ Auth::user()->contact_number ?? '-' }}</p>
                                        </div>

                                        <div class="flex text-sm  text-slate-500 font-normal py-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2 mt-0.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                            </svg>
                                            <p>{{ Auth::user()->street_address  ?? '-' }}
                                                @if(Auth::user()->pin_code != null)
                                                , {{ Auth::user()->pin_code ?? '-' }}
                                                @endif
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="w-full">
                                        <div class="flex text-sm  text-slate-500 font-normal py-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2 mt-1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                            </svg>
                                            <p>{{ Auth::user()->email ?? '-' }}</p>
                                        </div>

                                        <div class="flex text-sm  text-slate-500 font-normal py-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2 mt-0.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                                            </svg>

                                            <p>{{ Auth::user()->designation ?? '-' }}</p>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-2/3 lg:w-2/3 mt-5 sm:mt-0 md:mt-0 lg:mt-0 sm:ml-1 md:ml-1 lg:ml-1 ">
                    <div class="w-full  text-black bg-white shadow-lg rounded-b-xl">
                        <div class="flex flex-col md:flex-row">
                            <div class="w-full border-t-4 border-blue-400  p-6 my-auto">
                                <p class=" items-center font-semibold text-gray-900 text-md">Company Profile</p>
                                <h1 class=" items-center font-semibold text-gray-900 leading-8 text-2xl">{{ auth()->user()->company_name ?? '-' }}</h1>

                                <div class="border my-5"></div>
                                <livewire:recruiter.profile.account-detail />

                                <div class="border my-5"></div>
                                <livewire:recruiter.profile.company-detail />

                                <div class="border my-5"></div>
                                <div class="px-2">
                                    <div class="flex">
                                        <h1 class=" items-center font-semibold text-gray-900 leading-8 text-xl">
                                            <span class="tracking-wide">Other Details</span>
                                        </h1>
                                        <div>
                                            <button class="inline-flex items-center px-2 py-2 mr-5 text-gray-600 ml-3" data-modal-toggle="recruiter-other-detail-modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div>
                                        @if (session()->has('recruiterothermsg'))
                                        <div class="flex items-center p-4 mb-4 text-sm  border-b border-lime-400" role="alert">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5 text-lime-400">
                                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                            </svg>
                                            <div>
                                                <h1 class="text-xl font-bold leading-6 text-lime-400">Success</h1>
                                                <span class="text-gray-600 font-semibold leading-6">{{ session('recruiterothermsg') }}</span>
                                            </div>
                                        </div>
                                        @endif
                                        @if (session()->has('recruiterothermsgerror'))
                                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-b border-red-700" role="alert">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5">
                                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                                            </svg>
                                            <div>
                                                <h1 class="text-xl font-bold leading-6 text-gray-800">Error</h1>
                                                <span class="text-gray-600 font-semibold leading-6">{{ session('recruiterothermsgerror') }}</span>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="py-2">
                                        <div class="flex py-1">
                                            <div class="w-1/2 text-end px-3">
                                                <label for="" class="text-md">Pan number: </label>
                                            </div>
                                            <div class="w-1/2 text-start px-3">
                                                <p class="font-normal text-md text-gray-600"> {{ $other_detail->pan_number ?? '-' }}</p>
                                            </div>
                                        </div>
                                        <div class="flex py-1">
                                            <div class="w-1/2 text-end px-3">
                                                <label for="" class="text-md">Name on pan number: </label>
                                            </div>
                                            <div class="w-1/2 text-start px-3">
                                                <p class="font-normal text-md text-gray-600"> {{ $other_detail->pan_number_name ?? '-' }}</p>
                                            </div>
                                        </div>
                                        <div class="flex py-1">
                                            <div class="w-1/2 text-end px-3">
                                                <label for="" class="text-md">Address label: </label>
                                            </div>
                                            <div class="w-1/2 text-start px-3">
                                                <p class="font-normal text-md text-gray-600">
                                                    {{ $other_detail->address_label ?? '-' }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex py-1">
                                            <div class="w-1/2 text-end px-3">
                                                <label for="" class="text-md">Company address: </label>
                                            </div>
                                            <div class="w-1/2 text-start px-3">
                                                <p class="font-normal text-md text-gray-600">{{ $other_detail->company_address ?? '-' }}</p>
                                            </div>
                                        </div>
                                        <div class="flex py-1">
                                            <div class="w-1/2 text-end px-3">
                                                <label for="" class="text-md">Country: </label>
                                            </div>
                                            <div class="w-1/2 text-start px-3">
                                                <p class="font-normal text-md text-gray-600">{{ $other_detail->country ?? '-' }}</p>
                                            </div>
                                        </div>
                                        <div class="flex py-1">
                                            <div class="w-1/2 text-end px-3">
                                                <label for="" class="text-md">State: </label>
                                            </div>
                                            <div class="w-1/2 text-start px-3">
                                                <p class="font-normal text-md text-gray-600"> {{ $other_detail->state ?? '-' }}</p>
                                            </div>
                                        </div>
                                        <div class="flex py-1">
                                            <div class="w-1/2 text-end px-3">
                                                <label for="" class="text-md">City: </label>
                                            </div>
                                            <div class="w-1/2 text-start px-3">
                                                <p class="font-normal text-md text-gray-600"> {{ $other_detail->city ?? '-' }}</p>
                                            </div>
                                        </div>
                                        <div class="flex py-1">
                                            <div class="w-1/2 text-end px-3">
                                                <label for="" class="text-md">Pin code: </label>
                                            </div>
                                            <div class="w-1/2 text-start px-3">
                                                <p class="font-normal text-md text-gray-600"> {{ $other_detail->company_pincode ?? '-' }}</p>
                                            </div>
                                        </div>
                                        <div class="flex py-1">
                                            <div class="w-1/2 text-end px-3">
                                                <label for="" class="text-md">GSTIN number: </label>
                                            </div>
                                            <div class="w-1/2 text-start px-3">
                                                <p class="font-normal text-md text-gray-600"> {{ $other_detail->gstin_number ?? '-' }}</p>
                                            </div>
                                        </div>

                                    </div>

                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- other edit modal -->
    <div wire:ignore.self id="recruiter-other-detail-modal" data-modal-show="false" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="text-end pt-5 pr-5">
                    <button data-modal-toggle="recruiter-other-detail-modal" class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </button>
                </div>
                <form wire:submit="updateOtherDetail">
                    <div class="px-5 pb-2">
                        <h1 class=" items-center font-semibold tracking-wide text-gray-900 leading-8 text-xl pb-2">Other details</h1>


                        <div class="my-3 flex">
                            <div class="w-full mr-2">
                                <label for="pan_number" class="font-semibold text-sm text-gray-700">
                                    Pan number <span class="text-sm text-red-600">*</span>
                                </label>
                                <br>
                                <input type="text" wire:model="pan_number" id="pan_number" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Pan number" />
                                <div class="text-xs text-red-600 font-semibold pt-1">@error('pan_number') {{ $message }} @enderror</div>
                            </div>
                        </div>

                        <div class="my-3 flex">
                            <div class="w-full mr-2">
                                <label for="pan_number_name" class="font-semibold text-sm text-gray-700">
                                    Name on pan <span class="text-sm text-red-600">*</span>
                                </label>
                                <br>
                                <input type="text" wire:model="pan_number_name" id="pan_number_name" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Name on pan" />
                                <div class="text-xs text-red-600 font-semibold pt-1">@error('pan_number_name') {{ $message }} @enderror</div>
                            </div>
                        </div>

                        <div class="my-3 flex">
                            <div class="w-full mr-2">
                                <label for="address_label" class="font-semibold text-sm text-gray-700">
                                    Address label 
                                </label>
                                <br>
                                <select wire:model="address_label" id="address_label" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 ">
                                    <option value="">Select address label</option>
                                    <option value="Permanent">Permanent</option>
                                    <option value="Temporary">Temporary</option>
                                </select>
                                <div class="text-xs text-red-600 font-semibold pt-1">@error('address_label') {{ $message }} @enderror</div>
                            </div>
                        </div>

                        <div class="my-3">
                            <label for="company_address" class="font-semibold text-sm text-gray-700">
                                Company address <span class="text-sm text-red-600">*</span>
                            </label>
                            <br>
                            <input type="text" wire:model="company_address" id="company_address" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Company address" />
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('company_address') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3">
                            <label for="country" class="font-semibold text-sm text-gray-700">
                                Country <span class="text-sm text-red-600">*</span>
                            </label>
                            <br>
                            <input type="text" wire:model="country" id="country" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Country" />
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('country') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3">
                            <label for="state" class="font-semibold text-sm text-gray-700">
                                State <span class="text-sm text-red-600">*</span>
                            </label>
                            <br>
                            <input type="text" wire:model="state" id="state" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="state" />
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('state') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3">
                            <label for="city" class="font-semibold text-sm text-gray-700">
                                City <span class="text-sm text-red-600">*</span>
                            </label>
                            <br>
                            <input type="text" wire:model="city" id="city" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="city" />
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('city') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3">
                            <label for="company_pincode" class="font-semibold text-sm text-gray-700">
                                Pin code <span class="text-sm text-red-600">*</span>
                            </label>
                            <br>
                            <input type="text" wire:model="company_pincode" id="company_pincode" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="pin code" minlength="6" maxlength="6" onkeypress="return isNumber(event)" />
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('company_pincode') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3">
                            <label for="gstin_number" class="font-semibold text-sm text-gray-700">
                                GSTIN number 
                            </label>
                            <br>
                            <input type="text" wire:model="gstin_number" id="gstin_number" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="gstin number" />
                            <div class="text-xs text-red-600 font-semibold pt-1">@error('gstin_number') {{ $message }} @enderror</div>
                        </div>


                    </div>
                    <div class="flex justify-end p-6 space-x-2">
                        <button data-modal-toggle="basic-detail-modal" type="button" class="bg-red-500 ml-3 rounded-lg text-white hover:bg-red-400  border  text-sm font-medium px-2 py-2 ">Cancel</button>
                        <button type="submit" class="px-2 py-2 bg-blue-500 ml-3 rounded-lg text-white hover:bg-blue-400">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- other edit modal end -->
    <script>
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>
</div>