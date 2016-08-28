<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active">
          <li class="active"><a href="{{URL::to('/')}}">Home</a></li>
        </li>
        <li>
          <a href="{{URL::to('/faculty')}}">Faculty Members</a>
        </li>
        <li>
          <a href="{{URL::to('/academic')}}">Academic</a>
        </li>
          <li><a href="{{URL::to('/#')}}">Contact Us</a></li>
        
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
        <li><a href="{{URL::to('/logout')}}"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>