@auth()
	@if(auth()->user()->role == 'Admin')
    	@include('admin.layouts.navbars.navs.auth')
    @endif
@endauth
    
@guest()
    @include('admin.layouts.navbars.navs.guest')
@endguest