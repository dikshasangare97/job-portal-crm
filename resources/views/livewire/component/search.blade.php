<div class="container mx-auto">
    <form class="rounded-lg bg-white p-10 shadow-lg" wire:submit="searchResult">
        <div class="mb-4 flex items-center">
            <div class="relative w-96">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" wire:model="search_input" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search book here..." required>
            </div>
            <!-- <input type="text" class="w-full rounded-lg border border-gray-400 p-2" placeholder="Search ..." /> -->
            <button type="submit" class="ml-2 rounded-lg bg-blue-500 p-2 text-white hover:bg-blue-600">Search</button>
        </div>
    </form>
</div>