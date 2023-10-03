<div class="bg-white p-5 shadow-sm rounded-xl">

    <div>
        @if (session()->has('keyskillmsg'))
        <div class="flex items-center p-4 mb-4 text-sm  border-b border-lime-400" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5 text-lime-400">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-lime-400">Success</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('keyskillmsg') }}</span>
            </div>
        </div>
        @endif
        @if (session()->has('keyskillerrormsg'))
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-b border-red-700" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-gray-800">Error</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('keyskillerrormsg') }}</span>
            </div>
        </div>
        @endif
    </div>

    <div class="flex">
        <h1 class=" items-center font-semibold text-gray-900 leading-8 text-xl">
            <span class="tracking-wide">Key skills</span>
        </h1>
        <div>
            <button class="inline-flex items-center px-2 py-2 mr-5 text-gray-600 ml-3" data-modal-toggle="key-skill-modal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                </svg>
            </button>

        </div>
    </div>

    <div class="my-3">
        @if($userKeySkills)
        @foreach($userKeySkills as $userKeySkill)
        <div class="m-1 inline-flex max-w-96">
            <span class="font-normal flex text-sm rounded-full border border-gray-500 px-3 py-2 text-gray-600">{{$userKeySkill->keySkill->key_skill_name}}
                <button wire:click="deleteKeySkillId({{$userKeySkill->id}})" data-modal-toggle="delete-key-skill-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 font-bold">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>


            </span>
        </div>
        @endforeach
        @endif
    </div>
    <!-- key-skill add modal -->
    <div wire:ignore.self id="key-skill-modal" data-modal-show="false" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="text-end pt-5 pr-5">
                    <button data-modal-toggle="key-skill-modal" class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </button>
                </div>
                <form wire:submit="saveSkill">
                    <div class="px-5 pb-2">
                        <h1 class=" items-center font-semibold tracking-wide text-gray-900 leading-8 text-xl pb-2">Key skills</h1>
                        <p class="text-sm text-gray-500 pb-2">Tell recruiters what you know or what you are known for e.g. Direct Marketing, Oracle, Java etc. We will send you job recommendations based on these skills. each skill is separated by a comma.</p>
                        <div>
                            <label for="key_skill" class="text-sm text-gray-600">Skills</label>
                            <div class="my-2">
                                @if($userKeySkills)
                                @foreach($userKeySkills as $userKeySkill)
                                <div class="inline-flex max-w-96 mt-1">
                                    <span class="font-bold text-xs rounded-full border border-gray-500 px-3 py-2 text-gray-600 bg-gray-200">{{$userKeySkill->keySkill->key_skill_name}}
                                    </span>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <select multiple wire:model="key_skill" id="key_skill" class="text-xs placeholder-gray-500 mt-2 pl-3 pr-4 rounded-lg border border-gray-400 w-full py-2 ">
                                <option value="">Select skills</option>
                                @foreach($key_skills as $key_skill)
                                @php
                                $isDisabled = false;
                                foreach($userKeySkills as $userKeySkill)
                                {
                                if ($userKeySkill->keySkill->key_skill_name === $key_skill->key_skill_name)
                                {
                                $isDisabled = true;
                                break;
                                }
                                }
                                @endphp
                                <option value="{{ $key_skill->id }}" @if($isDisabled) disabled @endif>{{ $key_skill->key_skill_name }}</option>
                                @endforeach
                            </select>
                            @error('key_skill')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end p-6 space-x-2">
                        <button data-modal-toggle="key-skill-modal" type="button" class="bg-red-500 ml-3 rounded-lg text-white hover:bg-red-400  border  text-sm font-medium px-2 py-2 ">Cancel</button>
                        <button type="submit" class="px-2 py-2 bg-blue-500 ml-3 rounded-lg text-white hover:bg-blue-400">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- key-skill add modal end -->

    <!-- delete key-skill modal -->
    <div wire:ignore.self id="delete-key-skill-modal" data-modal-show="false" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="p-6 space-y-6">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-red-500 w-14 h-14 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg text-center font-normal text-gray-700 ">Are you sure you want to delete the key skill?</h3>
                </div>
                <div class="flex justify-end p-6 space-x-2">
                    <button data-modal-toggle="delete-key-skill-modal" type="button" class="bg-red-500 ml-3 rounded-lg text-white hover:bg-red-400  border  text-sm font-medium px-2 py-2 ">Decline</button>
                    <button wire:click="deleteKeySkill()" class="px-2 py-2 bg-blue-500 ml-3 rounded-lg text-white hover:bg-blue-400">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal end -->

</div>