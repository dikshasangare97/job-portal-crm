<div>
    <div class="px-2">
        <div class="flex">
            <h1 class=" items-center font-semibold text-gray-900 leading-8 text-xl">
                <span class="tracking-wide">Account Details</span>
            </h1>
            <div>
                <button class="inline-flex items-center px-2 py-2 mr-5 text-gray-600 ml-3" data-modal-toggle="recruiter-account-detail-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>
                </button>
            </div>
        </div>
        <div>
            @if (session()->has('recruiteraccountmsg'))
            <div class="flex items-center p-4 mb-4 text-sm  border-b border-lime-400" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5 text-lime-400">
                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                </svg>
                <div>
                    <h1 class="text-xl font-bold leading-6 text-lime-400">Success</h1>
                    <span class="text-gray-600 font-semibold leading-6">{{ session('recruiteraccountmsg') }}</span>
                </div>
            </div>
            @endif
            @if (session()->has('recruiteraccountmsgerror'))
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-b border-red-700" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                </svg>
                <div>
                    <h1 class="text-xl font-bold leading-6 text-gray-800">Error</h1>
                    <span class="text-gray-600 font-semibold leading-6">{{ session('recruiteraccountmsgerror') }}</span>
                </div>
            </div>
            @endif
        </div>

        <div class="py-2">
            <div class="flex py-1">
                <div class="w-1/2 text-end px-3">
                    <label for="" class="text-md">Name: </label>
                </div>
                <div class="w-1/2 text-start px-3">
                    <p class="font-normal text-md text-gray-600"> {{auth()->user()->name ?? '-' }}</p>
                </div>
            </div>
            <div class="flex py-1">
                <div class="w-1/2 text-end px-3">
                    <label for="" class="text-md">Email for communication: </label>
                </div>
                <div class="w-1/2 text-start px-3">
                    <p class="font-normal text-md text-gray-600"> {{auth()->user()->email ?? '-' }}</p>
                </div>
            </div>
            <div class="flex py-1">
                <div class="w-1/2 text-end px-3">
                    <label for="" class="text-md">Role: </label>
                </div>
                <div class="w-1/2 text-start px-3">
                    <p class="font-normal text-md text-gray-600">
                        @if(auth()->user()->register_for == 'company')
                        Recruiter
                        @else
                        User
                        @endif
                    </p>
                </div>
            </div>
            <div class="flex py-1">
                <div class="w-1/2 text-end px-3">
                    <label for="" class="text-md">Designation: </label>
                </div>
                <div class="w-1/2 text-start px-3">
                    <p class="font-normal text-md text-gray-600"> {{auth()->user()->designation ?? '-' }}</p>
                </div>
            </div>
            <div class="flex py-1">
                <div class="w-1/2 text-end px-3">
                    <label for="" class="text-md">Mobile Number: </label>
                </div>
                <div class="w-1/2 text-start px-3">
                    <p class="font-normal text-md text-gray-600"> {{auth()->user()->contact_number ?? '-' }}</p>
                </div>
            </div>
            <div class="flex py-1">
                <div class="w-1/2 text-end px-3">
                    <label for="" class="text-md">Street address: </label>
                </div>
                <div class="w-1/2 text-start px-3">
                    <p class="font-normal text-md text-gray-600"> {{ auth()->user()->street_address ?? '-' }}</p>
                </div>
            </div>
            <div class="flex py-1">
                <div class="w-1/2 text-end px-3">
                    <label for="" class="text-md">Pin code: </label>
                </div>
                <div class="w-1/2 text-start px-3">
                    <p class="font-normal text-md text-gray-600"> {{ auth()->user()->pin_code ?? '-' }}</p>
                </div>
            </div>
        </div>

    </div>

    <!-- account edit modal -->
    <div wire:ignore.self id="recruiter-account-detail-modal" data-modal-show="false" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="text-end pt-5 pr-5">
                    <button data-modal-toggle="recruiter-account-detail-modal" class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </button>
                </div>
                <form wire:submit="updateAccount">
                    <div class="px-5 pb-2">
                        <h1 class=" items-center font-semibold tracking-wide text-gray-900 leading-8 text-xl pb-2">Account details</h1>

                        <div class="my-3 flex">
                            <div class="w-full mr-2">
                                <label for="name" class="font-semibold text-sm text-gray-700">
                                    Name
                                </label>
                                <br>
                                <input type="text" wire:model="name" id="name" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Name" />
                                <div class="text-xs text-red-600 font-bold">@error('name') {{ $message }} @enderror</div>
                            </div>
                        </div>

                        <div class="my-3 flex">
                            <div class="w-full mr-2">
                                <label for="email" class="font-semibold text-sm text-gray-700">
                                    Email-id
                                </label>
                                <br>
                                <input type="text" wire:model="email" id="email" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="email" />
                                <div class="text-xs text-red-600 font-bold">@error('email') {{ $message }} @enderror</div>
                            </div>
                        </div>

                        <div class="my-3 flex">
                            <div class="w-full mr-2">
                                <label for="register_for" class="font-semibold text-sm text-gray-700">
                                    Role
                                </label>
                                <br>
                                <select wire:model="register_for" id="register_for" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 ">
                                    <option value="company">company</option>
                                    <option value="individual">individual</option>
                                </select>
                                <div class="text-xs text-red-600 font-bold">@error('register_for') {{ $message }} @enderror</div>
                            </div>
                        </div>

                        <div class="my-3 flex">
                            <div class="w-full mr-2">
                                <label for="designation" class="font-semibold text-sm text-gray-700">
                                    Designation
                                </label>
                                <br>
                                <input type="text" wire:model="designation" id="designation" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="designation" />
                                <div class="text-xs text-red-600 font-bold">@error('designation') {{ $message }} @enderror</div>
                            </div>
                        </div>

                        <div class="my-3">
                            <label for="contact_number" class="font-semibold text-sm text-gray-700">
                                Mobile number
                            </label>
                            <br>
                            <input type="text" wire:model="contact_number" id="contact_number" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Mobile number" />
                            <div class="text-xs text-red-600 font-bold">@error('contact_number') {{ $message }} @enderror</div>
                        </div>

                        <div class="my-3 flex">
                            <div class="w-full mr-2">
                                <label for="street_address" class="font-semibold text-sm text-gray-700">
                                    Street address
                                </label>
                                <br>
                                <input type="text" wire:model="street_address" id="street_address" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Address" />
                                <div class="text-xs text-red-600 font-bold">@error('street_address') {{ $message }} @enderror</div>
                            </div>
                        </div>

                        <div class="my-3 flex">
                            <div class="w-full mr-2">
                                <label for="pin_code" class="font-semibold text-sm text-gray-700">
                                    Pin code
                                </label>
                                <br>
                                <input type="text" wire:model="pin_code" id="pin_code" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 " placeholder="Pin code" />
                                <div class="text-xs text-red-600 font-bold">@error('pin_code') {{ $message }} @enderror</div>
                            </div>
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
    <!-- account edit modal end -->

</div>