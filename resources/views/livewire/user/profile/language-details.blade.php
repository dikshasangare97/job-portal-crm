<div class="bg-white p-5 shadow-sm rounded-xl">

    <div>
        @if (session()->has('languagemessage'))
        <div class="flex items-center p-4 mb-4 text-sm border-b border-lime-400" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5 text-lime-400">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-lime-400">Success</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('languagemessage') }}</span>
            </div>
        </div>
        @endif
        @if (session()->has('languageerror'))
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-b border-red-700" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-gray-800">Error</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('languageerror') }}</span>
            </div>
        </div>
        @endif
    </div>

    <div class="flex">
        <h1 class=" w-5/6 items-center font-semibold text-gray-900 leading-8 text-xl">
            <span class="tracking-wide">Languages</span>
        </h1>
        <div class="text-end">
            <button class="inline-flex items-center px-2 py-2 mr-5 font-bold text-blue-500 text-sm" data-modal-toggle="language-modal">Add&nbsp;Languages</button>
        </div>
    </div>



    <div class="flex my-5">
        <div class="w-full">
            @if($userLanguageDetails->count() != 0)
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead class="border-b">
                        <tr>
                            <th class="text-left text-slate-400 p-2 text-md font-normal">Languages</th>
                            <th class="text-left text-slate-400 p-2 text-md font-normal">Proficiency</th>
                            <th class="text-left text-slate-400 p-2 text-md font-normal">Read</th>
                            <th class="text-left text-slate-400 p-2 text-md font-normal">Write</th>
                            <th class="text-left text-slate-400 p-2 text-md font-normal">Speak</th>
                            <th class="text-left text-slate-400 p-2 text-md font-normal"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userLanguageDetails as $userLanguageDetail)
                        <tr>
                            <td class="p-2">
                                <p class="text-sm font-bold text-slate-600">
                                    {{ $userLanguageDetail->language_name ?? '-' }}
                                </p>
                            </td>
                            <td class="p-2">
                                <p class="text-sm font-bold text-slate-600">
                                    {{ $userLanguageDetail->proficiency ?? '-' }}
                                </p>
                            </td>
                            <td class="p-2">
                                <p class="text-sm font-bold text-slate-600">
                                    @if($userLanguageDetail->read == 1)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    @endif
                                </p>
                            </td>
                            <td class="p-2">
                                <p class="text-sm font-bold text-slate-600">
                                    @if($userLanguageDetail->write == 1)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    @endif
                                </p>
                            </td>
                            <td class="p-2">
                                <p class="text-sm font-bold text-slate-600">
                                    @if($userLanguageDetail->speak == 1)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    @endif
                                </p>
                            </td>
                            <td class="p-2">
                                <button wire:click="getItLanguageId({{$userLanguageDetail->id}})" data-modal-toggle="delete-language-modal" class="text-red-500 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>


    <!-- languages modal -->
    <div wire:ignore.self id="language-modal" data-modal-show="false" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="text-end pt-5 pr-5">
                    <button data-modal-toggle="language-modal" class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </button>
                </div>
                <form wire:submit="saveLanguageDetail">
                    <div class="px-5 pb-2">
                        <h1 class=" items-center font-semibold tracking-wide text-gray-900 leading-8 text-xl pb-2">Language</h1>

                        <div id="languageDiv">
                            <div class="flex">
                                <div class="w-1/2 my-5 mr-2">
                                    <label for="language_name" class="font-semibold text-sm text-gray-700">Language <span class="text-sm text-red-600">*</span></label>
                                    <br>
                                    <input type="text" id="language_name" wire:model="language_name.0" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" placeholder="language">
                                    <div class="text-xs text-red-600 font-bold">@error('language_name.0') {{ $message }} @enderror</div>
                                </div>
                                <div class="w-1/2 my-5">
                                    <label for="proficiency" class="font-semibold text-sm text-gray-700">Proficiency <span class="text-sm text-red-600">*</span></label>
                                    <br>
                                    <select wire:model="proficiency.0" id="proficiency" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2">
                                        <option value="null">Select proficiency</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Proficient">Proficient</option>
                                        <option value="Expert">Expert</option>
                                    </select>
                                    <div class="text-xs text-red-600 font-bold">@error('proficiency.0') {{ $message }} @enderror</div>
                                </div>
                            </div>

                            <div class="flex">
                                <div class="w-1/6">
                                    <input type="checkbox" id="read.0" wire:model="read.0" class="text-xs placeholder-gray-500  border border-gray-400 " placeholder="read">
                                    <label for="read.0" class="font-semibold text-sm text-gray-700">Read</label>
                                    <div class="text-xs text-red-600 font-bold">@error('read.0') {{ $message }} @enderror</div>
                                </div>
                                <div class="w-1/6">
                                    <input type="checkbox" id="write.0" wire:model="write.0" class="text-xs placeholder-gray-500  border border-gray-400 " placeholder="write">
                                    <label for="write.0" class="font-semibold text-sm text-gray-700">Write</label>
                                    <div class="text-xs text-red-600 font-bold">@error('write.0') {{ $message }} @enderror</div>
                                </div>
                                <div class="w-1/6">
                                    <input type="checkbox" id="speak.0" wire:model="speak.0" class="text-xs placeholder-gray-500  border border-gray-400 " placeholder="speak">
                                    <label for="speak.0" class="font-semibold text-sm text-gray-700">Speak</label>
                                    <div class="text-xs text-red-600 font-bold">@error('speak.0') {{ $message }} @enderror</div>
                                </div>
                            </div>
                        </div>

                        <div id="getLanguageDiv">
                            @foreach($inputs as $key => $value)
                            <div class="flex">
                                <div class="w-1/2 my-5 mr-2">
                                    <label for="language_name" class="font-semibold text-sm text-gray-700">Language <span class="text-sm text-red-600">*</span></label>
                                    <br>
                                    <input type="text" id="language_name" wire:model="language_name.{{ $value }}" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2" placeholder="language">
                                    <div class="text-xs text-red-600 font-bold">@error('language_name.'. $value) {{ $message }} @enderror</div>
                                </div>
                                <div class="w-1/2 my-5">
                                    <label for="proficiency" class="font-semibold text-sm text-gray-700">Proficiency <span class="text-sm text-red-600">*</span></label>
                                    <br>
                                    <select wire:model="proficiency.{{ $value }}" id="proficiency" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2">
                                        <option value="null">Select proficiency</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Proficient">Proficient</option>
                                        <option value="Expert">Expert</option>
                                    </select>
                                    <div class="text-xs text-red-600 font-bold">@error('proficiency.'. $value ) {{ $message }} @enderror</div>
                                </div>
                            </div>

                            <div class="flex">
                                <div class="w-1/6">
                                    <input type="checkbox" id="read.{{ $value }}" wire:model="read.{{ $value }}" class="text-xs placeholder-gray-500  border border-gray-400 " placeholder="read">
                                    <label for="read.{{ $value }}" class="font-semibold text-sm text-gray-700">Read</label>
                                    <div class="text-xs text-red-600 font-bold">@error('read.'. $value) {{ $message }} @enderror</div>
                                </div>
                                <div class="w-1/6">
                                    <input type="checkbox" id="write.{{ $value }}" wire:model="write.{{ $value }}" class="text-xs placeholder-gray-500  border border-gray-400 " placeholder="write">
                                    <label for="write.{{ $value }}" class="font-semibold text-sm text-gray-700">Write</label>
                                    <div class="text-xs text-red-600 font-bold">@error('write.'. $value) {{ $message }} @enderror</div>
                                </div>
                                <div class="w-1/6">
                                    <input type="checkbox" id="speak.{{ $value }}" wire:model="speak.{{ $value }}" class="text-xs placeholder-gray-500  border border-gray-400 " placeholder="speak">
                                    <label for="speak.{{ $value }}" class="font-semibold text-sm text-gray-700">Speak</label>
                                    <div class="text-xs text-red-600 font-bold">@error('speak.'. $value) {{ $message }} @enderror</div>
                                </div>
                                <div class="w-3/6 text-end">
                                    <button wire:click.prevent="removeLanguage({{$key}})" class="text-red-600 font-bold text-xs mt-2" type="button">Delete</button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button class="inline-flex items-center py-2 mr-5 font-bold text-blue-500 text-sm" wire:click.prevent="addLanguage({{$i}})" type="button">Add another languages</button>
                    </div>
                    <div class="flex justify-end p-6 space-x-2">
                        <button data-modal-toggle="language-modal" type="button" class="bg-red-500 ml-3 rounded-lg text-white hover:bg-red-400  border  text-sm font-medium px-2 py-2 ">Cancel</button>
                        <button type="submit" class="px-2 py-2 bg-blue-500 ml-3 rounded-lg text-white hover:bg-blue-400">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- languages modal end -->


    <!-- delete language modal -->
    <div wire:ignore.self id="delete-language-modal" data-modal-show="false" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="p-6 space-y-6">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-red-500 w-14 h-14 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg text-center font-normal text-gray-700 ">Are you sure you want to delete the language detail?</h3>
                </div>
                <div class="flex justify-end p-6 space-x-2">
                    <button data-modal-toggle="delete-language-modal" type="button" class="bg-red-500 ml-3 rounded-lg text-white hover:bg-red-400  border  text-sm font-medium px-2 py-2 ">Decline</button>
                    <button wire:click="deleteLanguage()" class="px-2 py-2 bg-blue-500 ml-3 rounded-lg text-white hover:bg-blue-400">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal end -->

</div>