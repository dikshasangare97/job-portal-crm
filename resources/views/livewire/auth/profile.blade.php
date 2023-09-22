<div>
    @auth
    @if(auth()->user()->register_for == 'user')
    <livewire:user.profile />
    @else
    <livewire:recruiter.profile />
    @endif
    @endauth
</div>