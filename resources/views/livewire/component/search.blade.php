<div class="container mx-auto">
    <h1 class="text-5xl font-bold text-center py-2">Find your dream job now</h1>
    <h4 class="text-xl text-center font-medium py-2 mb-4">5 lakh+ jobs for you to explore</h4>
    <form class="mt-10" wire:submit="searchResult">
        <div class="flex">
            <div class="w-full sm:w-full md:w-1/6 lg:w-1/6"></div>
            <div class="mb-4 w-full sm:w-full md:w-4/6 lg:w-4/6 rounded-full bg-white shadow-lg ">
                <div class="flex">
                    <div class="relative w-full my-5 mx-8">
                        <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                            <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" wire:model="search_input" id="simple-search" class="text-gray-900 text-sm block w-full rounded-full pl-10 p-2.5 placeholder:text-lg  focus:outline-none" placeholder="Search job here..." required>
                    </div>
                    <div class=" mx-0 md:mx-5 lg:mx-5 my-auto">
                        <button type="submit" class="rounded-full bg-blue-700 px-2 py-2 md:px-7 md:py-3 lg:px-7 lg:py-3 font-semibold text-white hover:bg-blue-500">Search</button>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-full md:w-1/6 lg:w-1/6"></div>
        </div>
    </form>
</div>