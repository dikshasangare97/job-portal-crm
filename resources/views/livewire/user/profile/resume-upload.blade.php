<div class="bg-white p-5 shadow-sm rounded-xl">

    <div>
        @if (session()->has('resumemessage'))
        <div class="flex items-center p-4 mb-4 text-sm border-b border-lime-400" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5 text-lime-400">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-lime-400">Success</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('resumemessage') }}</span>
            </div>
        </div>
        @endif
        @if (session()->has('error'))
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border-b border-red-700" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7 mr-5">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
            </svg>
            <div>
                <h1 class="text-xl font-bold leading-6 text-gray-800">Error</h1>
                <span class="text-gray-600 font-semibold leading-6">{{ session('error') }}</span>
            </div>
        </div>
        @endif
    </div>


    <h1 class=" items-center font-semibold text-gray-900 leading-8 text-xl">
        <span class="tracking-wide">Resume</span>
    </h1>
    <p class="text-gray-500 text-sm">Resume is the most important document recruiters look for. Recruiters generally do not look at profiles without resumes.</p>

    @if($userPersonalDetail->resume )
    <div class="flex my-6">
        <div class="w-1/2">
            <p class="font-semibold text-md text-gray-800">{{$userPersonalDetail->resume}}</p>
            <p class="text-md text-gray-500">Uploaded on {{ date('M d, Y',strtotime($userPersonalDetail->updated_at))}}</p>
        </div>
        <div class="w-1/2 text-end">
            <button wire:click="downloadResume({{ $userPersonalDetail->id }})" class="inline-flex items-center px-2 py-2 mr-3 bg-blue-50 rounded-full text-blue-700 text-xs">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>

            </button>

            <button class="inline-flex items-center px-2 py-2 mr-5 bg-red-50 rounded-full text-red-700 text-xs" data-modal-toggle="delete-resume-modal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </button>

        </div>
    </div>
    @endif

    <div class="flex items-center justify-center w-full my-5">
        <div class="flex flex-col items-center justify-center w-full py-5 border-2 border-gray-300 border-dashed rounded-lg">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <label for="resume" class="mb-2 text-sm text-blue-500 font-semibold border border-blue-600 rounded-full py-2 px-3 cursor-pointer">
                    Click to upload resume
                </label>
                <p class="text-sm text-gray-500">Supported Formats: doc, docx, rtf, pdf, upto 2 MB</p>
            </div>
            <input id="resume" type="file" wire:model="resume" class="hidden" />
            @error('resume')
            <div class="text-xs text-red-600 font-semibold pt-1">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <!-- delete resume modal -->
    <div wire:ignore.self id="delete-resume-modal" data-modal-show="false" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="p-6 space-y-6">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-red-500 w-14 h-14 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg text-center font-normal text-gray-700 ">Are you sure you want to delete the resume?</h3>
                </div>
                <div class="flex justify-end p-6 space-x-2">
                    <button data-modal-toggle="delete-resume-modal" type="button" class="bg-red-500 ml-3 rounded-lg text-white hover:bg-red-400  border  text-sm font-medium px-2 py-2 ">Decline</button>
                    <button wire:click="deleteResume({{ $userPersonalDetail->id }})" class="px-2 py-2 bg-blue-500 ml-3 rounded-lg text-white hover:bg-blue-400">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal end -->

    @push('scripts')
    <script>
        document.getElementById('resume').addEventListener('change', function() {
            $this.upload('resume', this.files[0]);
        });
    </script>
    @endpush
</div>