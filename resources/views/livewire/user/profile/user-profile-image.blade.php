<div>
    <div class="relative flex items-center justify-center">
        <label for="profileimage" class="cursor-pointer">
        {{ Storage::url('profileimage/' . $profile) }}
            @if(Auth::user()->profile_img)
            <img class="w-40 h-40 p-1 rounded-full ring-4 ring-blue-400" src="{{ Storage::url('profileimage/' . $profile) }}" alt="{{ Auth::user()->profile_img }}" />
            <div class="absolute bottom-0 @if(auth()->user()->is_user == 0) left-9 md:left-[108px] lg:left-[108px]  @else left-4 md:left-0 lg:left-0  @endif right-0 top-0 w-40 h-40 sm:w-40 sm:h-40 md:w-40 md:h-40 lg:w-40 lg:h-40 xl:w-40 xl:h-40 rounded-full overflow-hidden bg-black bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-50 flex items-center justify-center flex-col">
                <p class="text-white font-bold flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-center">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>

                </p>
                <span class="text-md text-white font-bold mt-1">Update Photo</span>
            </div>
            @else
            <img class="w-40 h-40 p-1 rounded-full ring-4 ring-blue-400" src="https://static.naukimg.com/s/5/105/i/displayProfilePlaceholder.png" alt="profile" />
            <div class="absolute bottom-0 @if(auth()->user()->is_user == 0) left-9 md:left-[108px] lg:left-[108px]  @else left-4 md:left-0 lg:left-0  @endif right-0 top-0 w-40 h-40 sm:w-40 sm:h-40 md:w-40 md:h-40 lg:w-40 lg:h-40 xl:w-40 xl:h-40 rounded-full overflow-hidden bg-black bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-50 flex items-center justify-center flex-col">
                <p class="text-white font-bold flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-center">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </p>
                <span class="text-md text-white font-bold mt-1">Add Photo</span>
            </div>
            @endif
        </label>
        <input type="file" wire:model="profileimage" id="profileimage" class="hidden" accept="image/*" />
        @error('profileimage')
        <div class="text-xs text-red-600 font-semibold pt-1">{{ $message }}</span>
        @enderror
    </div>

    @push('scripts')
    <script>
        document.getElementById('profileimage').addEventListener('change', function() {
            $this.upload('profileimage', this.files[0]);
        });
    </script>
    @endpush
</div>