<div class="flex">
    <div class="bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full">
        <div class="font-medium self-center text-xl sm:text-2xl uppercase text-gray-800">Create a new industry</div>
        <div class="border-b-2 my-3"></div>
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
                <div class="flex">
                    <div class="w-full mb-6 mr-2">
                        <label for="industry_name" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Industry Name</label>
                        <input id="industry_name" type="text" wire:model="industry_name" class="text-sm sm:text-base placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Industry Name" />
                        <div class="text-xs text-red-600 font-bold">@error('industry_name') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="flex flex-col mt-5">
                    <button type="submit" class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-blue-600 hover:bg-blue-700 rounded py-2 w-40 transition duration-150 ease-in">
                        <span class="mr-2 uppercase">Submit</span>
                        <span>
                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>