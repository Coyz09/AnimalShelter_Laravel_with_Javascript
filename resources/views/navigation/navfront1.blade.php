<style>
    .topnav {
        background-color: #336600;
        overflow: hidden;
    }

    /* Style the links inside the navigation bar */
    .topnav a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 20px;
    }
     .topnav div {
        float: left;
        color: #66ff33;
        background-color: #336600;
        text-align: center;
        padding: 1px 1px;
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

    .topnav .login {
        float: right;
      }

</style>

@section('navbar')

<div class="topnav">
    @include('partials.requestheader')
 {{--  <a href="/front">HOME</a>
  <a href="/animals">ANIMALS</a>
  <a href="/adopters">ADOPTERS</a> --}}
  {{--   <div class="login">
      <a href="/contact">CONTACT US</a>
      <a href="/login">LOGIN</a>
    
    </div> --}}



        {{-- <a>
          <form class="input-group" action="{{route('animals')}}" method="GET">
            <input type="text" class="form-control" name="search" placeholder="Search" >
          </form>
        </a>
 --}}
</div>


