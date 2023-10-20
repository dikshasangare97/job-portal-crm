<div class="min-h-screen flex flex-col items-center justify-center">
    <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md">
        <div class="font-medium self-center text-xl sm:text-2xl uppercase text-gray-800">Create Your Account</div>
        <div class="mt-2">
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
        <div class="mt-5">
            <form wire:submit="store">
                <!-- self details -->
                <div>
                    <p class="font-bold">You want to register</p>
                    <div class="flex items-center mb-2 mt-3">
                        <input type="radio" value="company" wire:model="register_for" class="radioBtn w-4 h-4 text-blue-600 bg-gray-100" id="companyRadio">
                        <label for="companyRadio" class="ml-2 text-sm text-gray-900">on behalf of your company/business</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" value="individual" wire:model="register_for" class="radioBtn w-4 h-4 text-blue-600 bg-gray-100" id="individualRadio">
                        <label for="individualRadio" class="ml-2 text-sm text-gray-900">as an individual/proprietor</label>
                    </div>


                    <div class="flex flex-col mb-6 mt-5">
                        <label for="name" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Your Name <span id="nameSpan" class="hidden"> (as per AADHAAR card)</span> :</label>
                        <div class="relative">
                            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                            </div>
                            <input id="name" type="text" wire:model="name" class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" />
                            <div class="text-xs text-red-600 font-bold">@error('name') {{ $message }} @enderror</div>

                        </div>
                    </div>
                    <div class="flex flex-col mb-6">
                        <label for="email" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Your Official Email:</label>
                        <div class="relative">
                            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input id="email" type="email" wire:model="email" class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" />
                            <div class="text-xs text-red-600 font-bold">@error('email') {{ $message }} @enderror</div>

                        </div>
                    </div>
                    <div class="flex flex-col mb-6">
                        <label for="password" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Password:</label>
                        <div class="relative">
                            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                <span>
                                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </span>
                            </div>

                            <input id="password" type="password" wire:model="password" class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Password" />
                            <div class="text-xs text-red-600 font-bold">@error('password') {{ $message }} @enderror</div>

                        </div>
                    </div>
                    <div class="flex flex-col mb-6">
                        <label for="contact_number" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Your Mobile Number:</label>
                        <div class="relative">
                            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-black font-semibold">
                                +91
                            </div>
                            <input id="contact_number" type="tel" wire:model="contact_number" class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" minlength="10" maxlength="10" onkeypress="return isNumber(event)" />
                            <div class="text-xs text-red-600 font-bold">@error('contact_number') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>

                <!-- company details -->
                <p class="font-bold">My company is here</p>
                <div class="flex items-center mb-2 mt-3">
                    <input type="radio" value="hiring_needs" wire:model="company_info_for" class="company_info_btn w-4 h-4 text-blue-600 bg-gray-100" id="hiringRadio">
                    <label for="hiringRadio" class="ml-2 text-sm text-gray-900">to fulfill own hiring needs</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" value="recruitment_consultant" wire:model="company_info_for" class="company_info_btn w-4 h-4 text-blue-600 bg-gray-100" id="recruitmentRadio">
                    <label for="recruitmentRadio" class="ml-2 text-sm text-gray-900">as a recruitment consultant</label>
                </div>

                <div id="companyInfoDiv" class="hidden">
                    <div class="flex flex-col mb-6 mt-5">
                        <label for="company_name" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Company name (as per KYC documents) :</label>
                        <input id="company_name" type="text" wire:model="company_name" class="text-sm sm:text-base placeholder-gray-500 pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" />
                        <div class="text-xs text-red-600 font-bold">@error('company_name') {{ $message }} @enderror</div>
                    </div>
                    <div class="flex flex-col mb-6">
                        <label for="designation" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Your designation:</label>
                        <input id="designation" type="text" wire:model="designation" class="text-sm sm:text-base placeholder-gray-500 pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" />
                        <div class="text-xs text-red-600 font-bold">@error('designation') {{ $message }} @enderror</div>
                    </div>
                    <div class="flex flex-col mb-6">
                        <label for="pin_code" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Pin code:</label>
                        <input id="pin_code" type="text" wire:model="pin_code" class="text-sm sm:text-base placeholder-gray-500 pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" minlength="6" maxlength="6" onkeypress="return isNumber(event)" />
                        <div class="text-xs text-red-600 font-bold">@error('pin_code') {{ $message }} @enderror</div>
                    </div>
                    <div class="flex flex-col mb-6">
                        <label for="street_address" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Street address:</label>
                        <textarea wire:model="street_address" class="text-sm sm:text-base placeholder-gray-500 rounded-lg border border-gray-400 w-full focus:outline-none focus:border-blue-400 p-1" id="" cols="10" rows="4"></textarea>
                        <div class="text-xs text-red-600 font-bold">@error('street_address') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="flex w-full mt-5">
                    <button type="submit" class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-blue-600 hover:bg-blue-700 rounded py-2 w-full transition duration-150 ease-in">
                        <span class="mr-2 uppercase">Register Now</span>
                        <span>
                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                    </button>
                </div>
            </form>
        </div>
        <div class="flex justify-center items-center mt-6">
            <a href="/recruiter-login" class="inline-flex items-center font-bold text-blue-500 hover:text-blue-700 text-xs text-center">
                <span>
                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </span>
                <span class="ml-2">Already have an account?</span>
            </a>
        </div>
    </div>
</div>
<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    $(document).ready(function() {
        // for user
        $(".radioBtn").change(function() {
            if ($("#companyRadio").is(":checked")) {
                $("#nameSpan").hide();
            } else if ($("#individualRadio").is(":checked")) {
                $("#nameSpan").show();
            }
        });
        // for company
        $(".company_info_btn").change(function() {
            if ($("#hiringRadio").is(":checked")) {
                $("#companyInfoDiv").show();
            } else if ($("#recruitmentRadio").is(":checked")) {
                $("#companyInfoDiv").show();
            }
        });
    });
</script>