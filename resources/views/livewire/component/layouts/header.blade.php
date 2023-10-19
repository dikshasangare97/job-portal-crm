<div>

    @if (Route::has('login'))
    @auth
    @if(Auth::user()->is_user == 2)
    @can('user')
    <livewire:component.layouts.user-layout />
    @else
    <livewire:component.layouts.admin-layout />
    @endcan

    @else
    <livewire:component.layouts.user-layout />
    @endif
    @else
    <livewire:component.layouts.user-layout />
    @endauth
    @else
    <livewire:component.layouts.user-layout />
    @endif

</div>