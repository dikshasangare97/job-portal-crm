<div class="mt-0">
    <div class="px-4 py-5 bg-white rounded-lg border">
        <nav class="flex mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/admin" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Workmode</span>
                    </div>
                </li>
            </ol>
        </nav>
        <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900">Workmode</h2>

        <div class="border my-5"></div>

        <div class="m-2">
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
        <div class="flex">
            <div class="w-full">
                <div class="flex m-2">
                    <div class="w-5/6">
                        <form class="flex items-center mt-3" wire:submit="search">
                            <div class="relative w-96">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" wire:model="search_input" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 " placeholder="Search book here..." required>
                            </div>
                            <button type="submit" class="ml-2 p-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                Search
                            </button>
                        </form>
                    </div>
                    <div class="w-1/6">
                        <div class="mt-5">
                            <a href="/admin/workmode/create" class="mt-3 p-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                Add Workmode
                            </a>
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="rounded my-6">
                        <table class="min-w-max w-full table-auto border">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Name</th>
                                    <th class="py-3 px-6 text-center">Status</th>
                                    <th class="py-3 px-6 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @if($workmodes)
                                @foreach($workmodes as $workmode)
                                <tr class="border-b border-gray-200 hover:bg-gray-100 font-normal" wire:key="{{$workmode->id}}">
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span>{{$workmode->work_mode_name}}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        @if($workmode->status == 1)
                                        <span class="bg-green-200 text-green-600 py-1 font-medium px-3 rounded-full text-xs">Active</span>
                                        @else
                                        <span class="bg-red-200 text-red-600 py-1 px-3 font-medium rounded-full text-xs">In&nbsp;Active</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <!-- <button wire:click="show({{$workmode->id}})" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button> -->
                                            <button wire:click="edit({{$workmode->id}})" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </button>
                                            <button onclick="return confirm('Are you sure you want to delete this item?') || event.stopImmediatePropagation()" wire:click="delete({{$workmode->id}})" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td>No company type found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="p-3">
                            {{$workmodes->links()}}
                        </div>
                    </div>
                </div>


                @if($isOpen)

                <div class="fixed inset-0 flex items-center justify-center z-50">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="relative p-3 bg-white rounded shadow-lg w-1/2">
                        <div class="flex">
                            <div class="w-2/3">
                                <h1 class="p-5 items-center font-semibold tracking-wide text-gray-900 leading-8 text-xl">Edit Work Mode Detail</h1>
                            </div>
                            <div class="w-1/3">
                                <div class="p-5">
                                    <svg wire:click.prevent="$set('isOpen', false)" class="ml-auto w-6 h-6 text-gray-900 cursor-pointer fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <form wire:submit="update">
                            <div class=" relative">
                                <div class="p-6 space-y-6">
                                    <div class="mb-4">
                                        <label for="work_mode_name" class="block text-gray-700 font-bold mb-2">Work Mode Name:</label>
                                        <input type="text" wire:model="work_mode_name" id="work_mode_name" class="w-full border border-gray-300 px-4 py-2 rounded">
                                        <div class="text-xs text-red-600 font-semibold pt-1">@error('work_mode_name') {{ $message }} @enderror</div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="status" class="block text-gray-700 font-bold mb-2">Status:</label>
                                        <select wire:model="status" id="status" class="w-full border border-gray-300 px-4 py-2 rounded">
                                            <option value="1">Active</option>
                                            <option value="0">Not Active</option>
                                        </select>
                                        <div class="text-xs text-red-600 font-semibold pt-1">@error('status') {{ $message }} @enderror</div>
                                    </div>
                                </div>
                            </div>
                            <div class="border my-2"></div>
                            <div class="flex justify-end p-3 space-x-2">
                                <button wire:click="closeModal" type="button" class="bg-red-500 ml-3 rounded-lg text-white hover:bg-red-400  border  text-sm font-medium px-2 py-2 ">Cancel</button>
                                <button type="submit" class="px-2 py-2 bg-blue-500 ml-3 rounded-lg text-white hover:bg-blue-400">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>