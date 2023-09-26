<div class="container mx-auto">
    <h1 class="text-5xl font-bold text-center py-2">Find your dream job now</h1>
    <h4 class="text-xl text-center font-medium py-2 mb-4">5 lakh+ jobs for you to explore</h4>
    <form class="rounded-full bg-white shadow-lg" wire:submit="searchResult">
        <div class="mb-4 flex items-center">
            <div class="relative w-auto my-4 mx-5 ">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" wire:model="search_input" id="simple-search" class="bg-gray-50 border-b text-gray-900 text-sm block w-full rounded-full pl-10 p-2.5" placeholder="Search book here..." required>
            </div>
            <button type="submit" class="ml-2 rounded-full bg-blue-500 p-2 text-white hover:bg-blue-600">Search</button>
        </div>
    </form>
</div>