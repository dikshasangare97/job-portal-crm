<div>
    @auth
    <form wire:submit="save">
        <input type="hidden" readonly wire:model="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" readonly wire:model="job_id" value="{{ $jobId }}">
        <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Apply</button>
    </form>
    @else
    <a href="/login" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Login to Apply</a>
    @endauth
</div>