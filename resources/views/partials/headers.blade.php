<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
     {{--  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button> --}}
        <a  href="/animals">Animal Zone</a>
        <a></a>
        <a class="navbar-brand" href="/dashboard">Dashboard</a>
        <a class="navbar-brand" href="/animal">Animal</a>
        <a class="navbar-brand" href="/adopter">Adopter</a>
        <a class="navbar-brand" href="/personnel">Personnel</a>
        <a class="navbar-brand" href="/rescuer">Rescuer</a>
        <a class="navbar-brand" href="/injury">Injury/Disease</a>

                        <a></a>
                          <a></a>
                        <a></a>
                        <a></a>
                          <a></a>
                        <a></a>
                        <a></a>
                          <a></a>
                        <a></a>
                        <a></a>

         <ul class="navbar-nav me-auto">
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

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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


                    
 {{--        <a class="navbar-brand" href="/customer">Customer Emails</a> --}}
       {{--        
        <div class=" float-right">
          <div class="bg-info clearfix">
            <ul class="nav navbar-nav navbar-right">
              
        <li class="dropdown">
      
          <a href="#" class="btn btn-info dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle"></i> Admin <span class="caret"></span></a>
         
            <ul class="bg-info clearfix dropdown-menu">
            @if (Auth::check())
              <li><a href="{{ route('admin.show') }}">Admin Profile</a></li>
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
</div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>