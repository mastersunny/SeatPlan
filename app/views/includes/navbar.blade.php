 <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper teal">
        <!-- <a href="#!" class="brand-logo"><img src="logo.png" width="257"></a> -->
         <ul class="right hide-on-med-and-down">
          <li class="active"><a href="{{URL::to('/')}}">Home</a></li>
          <li><a href="{{URL::to('/faculty')}}">Faculty Members</a></li>
          <li><a href="{{URL::to('/academic')}}">Academic</a></li>
          @if(Session::get('role') == "admin")
          <li><a href="{{URL::to('/admin')}}">Admin Panel</a></li>
          @endif
          <li><a href="{{URL::to('/contact')}}">Contact Us</a></li>
          @if(Auth::check())
          <li><a href="{{URL::to('/logout')}}">LogOut</a></li>
          @endif
        </ul>
      </div>
    </nav>


    <!-- <ul class="side-nav" id="mobile-nav">
      <li><a href="#">Home</a></li>
      <li><a href="#">Human Rights</a></li>
      <li><a href="#">Citizen Charter</a></li>

    </ul> -->
  </div>