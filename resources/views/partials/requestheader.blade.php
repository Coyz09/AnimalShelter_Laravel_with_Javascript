<nav class="navbar navbar-default">
  <div class="container-fluid">
{{-- <nav class="navbar navbar-default"> --}}
 {{--  <div class="container-fluid"> --}}
    <!-- Brand and toggle get grouped for better mobile display -->
{{--     <div class="navbar-header">   --}}    
       {{--  <a class="navbar-brand" href="/front">HOME</a>
        <a class="navbar-brand" href="/animals">ANIMALS</a>
        <a class="navbar-brand" href="/adopters">ADOPTERS</a> --}}
  <div class="container-fluid">
         <nav class="navbar navbar-expand-md ">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                      <div class="topnav">
                        <a  href="/animals">Animal Zone</a>
                          <a></a>
                        
                         {{-- <a  href="/front">HOME</a> --}}
                         <a href="/animals">ANIMALS</a>
                         <a href="/adopters">ADOPTERS</a>
                         @if(auth()->user()->role == 'personnel')
                            <a href="/requests">ADOPTER REQUEST</a>
                          @endif
                        </div>
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
     {{--          
     <div class="float-right">
        <div class="bg-info clearfix">
          <ul class="nav navbar-nav navbar-right">           
            <li class="dropdown">
              <a href="#" class="btn btn-info dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle"></i> User <span class="caret"></span></a>
                  <ul class="bg-info clearfix dropdown-menu">
                  @if (Auth::check())
                   @if(auth()->user()->role == 'rescuer')
                    <li><a href="{{ route('rescuer.profile') }}">User Profile</a></li>
                    @elseif(auth()->user()->role == 'adopter')
                    <li><a href="{{ route('adopter.profile') }}">User Profile</a></li>
                    @elseif(auth()->user()->role == 'personnel')
                    <li><a href="{{ route('personnel.profile') }}">User Profile</a></li>
                    @elseif(auth()->user()->role == 'user')
                    <li><a href="{{ route('user.profile') }}">User Profile</a></li>
                    @endif 
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('user.logout') }}">Logout</a></li>
                    
                  @else
                    <li><a href="{{ route('user.signup') }}">Signup</a></li>
                    <li><a href="{{ route('user.signin') }}">Login</a></li>
                  @endif 
                  </ul>
              </li>
            </ul>
          </div> --}}
      {{--   </div> --}}
        {{-- <a class="bg-info clearfix navbar-brand " href="{{ route('user.adoptersignup') }}">Adopter Registration</a> --}}
         

   {{--    <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#loginModal">Login<span  class="glyphicon glyphicon-plus" aria-hidden="true"></span>
           </button> --}}

       {{--  <a class="bg-info clearfix navbar-brand " href="{{ route('user.rescuersignup') }}">Rescuer Registration</a> --}}

        <a type="button"  data-bs-toggle="modal" data-bs-target="#myModal"><span  aria-hidden="true"></span></a>  
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>