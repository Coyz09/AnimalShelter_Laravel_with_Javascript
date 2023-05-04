<style>
  .topnav {
    background-color: #336600;
    overflow: hidden;
  }

  /* Style the links inside the navigation bar */
  .topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 20px;
  }

  /* Change the color of links on hover */
  .topnav a:hover {
    background-color: #66ff33;
    color: green;
  }

  /* Add a color to the active/current link */
  .topnav a.active {
    background-color: #04AA6D;  
    color: white;
  }

  .topnav input[type=text] {
      float: right;
      padding: 6px;
      border: none;
      margin-top: 8px;
      margin-right: 16px;
      font-size: 17px;
    }

    .topnav .logout {
        float: right;
      }

</style>

@section('navbar')

<div class="topnav">
   @include('partials.headers')
  {{-- <a href="/animal">Animal</a>
  <a href="/adopter">Adopter</a>
  <a href="/personnel">Personnel</a>
  <a href="/rescuer">Rescuer</a>
  <a href="/injury">Injury/Disease</a>
  <a href="/customer">Customer Emails</a> --}}
  {{-- <div class="logout">
  @if (Auth::check())
    
              <li><a href="{{ route('user.logout') }}">Logout</a></li>
            
            @endif 
  </div> --}}
</div>