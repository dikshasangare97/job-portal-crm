<div>
    <!-- resume upload modal -->
    @if($userPersonalDetail == null)
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="flex items-start justify-between p-4 border-b rounded-t ">
                        <h3 class="text-xl font-semibold text-gray-900">Upload Resume</h3>
                    </div>
                    <div class="flex items-center justify-center w-full p-5">
                        <div class="flex flex-col items-center justify-center w-full py-5 border-2 border-gray-300 border-dashed rounded-lg">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <label for="resume" class="mb-2 text-sm text-blue-500 font-semibold border border-blue-600 rounded-full py-2 px-3 cursor-pointer">
                                    Click to upload resume
                                </label>
                                <p class="text-sm text-gray-500">Supported Formats: doc, docx, rtf, pdf, upto 2 MB</p>
                            </div>
                            <input id="resume" type="file" wire:model="resume" class="hidden" />
                            @error('resume')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- end modal -->
    <div class="bg-gray-100">
        <div class="container mx-auto my-5 p-5">
            <div class="w-full text-black bg-white shadow-lg rounded-xl">
                <div class="flex">
                    <div class="w-1/4 p-10">
                        <div class="relative  ">
                            <img class="w-20 h-20 rounded-full" src="https://dummyimage.com/500x250" alt="dummy-image">
                            <!-- <button class="absolute top-0 bg-blue-500 text-white p-2 rounded hover:bg-blue-800 m-2">Button</button> -->
                        </div>
                    </div>
                    <div class="w-3/4 p-10">
                        <div class="flex">
                            <h3 class="text-2xl font-bold capitalize">{{ Auth::user()->name }}</h3>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:flex no-wrap md:-mx-2 mt-10">
                <div class="w-full md:w-3/12 md:mx-2">
                    <div class="bg-white p-3 border-t-4 border-blue-400">
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">Quick Links</h1>
                    </div>
                </div>

                <div class="w-full md:w-9/12 mx-2 ">
                    @if($userPersonalDetail != null)
                    <livewire:user.profile.resume-upload />
                    <div class="my-4"></div>

                    <livewire:user.profile.resume-headline />
                    <div class="my-4"></div>

                    <livewire:user.profile.key-skills />
                    <div class="my-4"></div>

                    <livewire:user.profile.employment-details />
                    <div class="my-4"></div>

                    <livewire:user.profile.education-details />
                    <div class="my-4"></div>

                    <livewire:user.profile.itskill-details />
                    <div class="my-4"></div>

                    <livewire:user.profile.profile-summary />
                    <div class="my-4"></div>

                    <livewire:user.profile.career-profile />
                    <div class="my-4"></div>

                    <livewire:user.profile.personal-details />
                    <div class="my-4"></div>

                    <livewire:user.profile.language-details />
                    <div class="my-4"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.getElementById('resume').addEventListener('change', function() {
            $this.upload('resume', this.files[0]);
        });
    </script>
    @endpush
</div>