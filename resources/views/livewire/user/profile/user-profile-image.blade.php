<div>

    <div class="relative flex items-center justify-center">
        <label for="profile_image" class="cursor-pointer">
            @if(Auth::user()->profile_img)
            <img class="w-40 h-40 p-1 rounded-full ring-4 ring-lime-500" src="{{ Storage::url(Auth::user()->profile_img) }}" alt="profile" />
            @else
            <img class="w-40 h-40 p-1 rounded-full ring-4 ring-lime-500" src="https://static.naukimg.com/s/5/105/i/displayProfilePlaceholder.png" alt="profile" />
            @endif

            <div class="absolute bottom-0 left-0 right-0 top-0 w-36 h-36 rounded-full overflow-hidden bg-gray-700 bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-50 m-2 flex items-center justify-center">
                <p class="text-md text-white font-bold">Add Photo</p>
            </div>
        </label>
        <input type="file" wire:model="profile_image" id="profile_image" class="hidden" accept="image/*" />
        @error('profile_image')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    @push('scripts')
    <script>
        document.getElementById('profile_image').addEventListener('change', function() {
            $this.upload('profile_image', this.files[0]);
        });
    </script>
    @endpush
</div>