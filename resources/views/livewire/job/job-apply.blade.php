<div>
    @auth
        @if(auth()->user()->register_for == 'user')
            @php
            $alreadyApplied = false;
            @endphp

            @foreach($job_applies as $job_apply)

                @if($job_apply->job_id == $jobId)
                <p class="text-green-600 font-bold text-lg">Already Apply</p>
                @php
                $alreadyApplied = true;
                @endphp

                @break

                @endif

            @endforeach

            @if (!$alreadyApplied)
                <button type="submit" wire:click="save({{ $jobId }})" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Apply&nbsp;For&nbsp;Job</button>
            @endif
        @endif
    @else
        <div class="mt-2">
            <a href="/login" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2.5 px-4 border border-blue-500 hover:border-transparent rounded">Login&nbsp;to&nbsp;Apply</a>
        </div>
    @endauth
</div>