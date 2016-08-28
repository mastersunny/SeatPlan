<!DOCTYPE html>
<html>
<head>
   @include('includes.header')
</head>

<body>

 @include('includes.navbar')

  <!-- Page Content goes here -->
  <div class="section" style="margin:0px;">
    <!-- Page Layout here -->
    <!-- first row -->
    <div class="row">
      
      <!-- slider on left-top -->
      <div class="col s12 m9">
          <div class="slider">
            <ul class="slides">
              <li>
                <img src="{{asset('images/main.jpg')}}"> <!-- random image -->
                <div class="caption center-align">
                  <h3 style="color:green;">Welcome To Our Site</h3>
            <!--      <h5 class="blue-text text-darken-2">We Are Cse 38th</h5> -->
                </div>
              </li>
              <li>
                <img src="{{asset('images/main2.jpg')}}"> <!-- random image -->
                <div class="caption left-align">
                  <h3>Welcome To CSE Family</h3>
                   <!--      <h5 class="blue-text text-darken-2">We Are Cse 38th</h5> -->
                </div>
              </li>
              <li>
                <img src="{{asset('images/main3.jpg')}}"> <!-- random image -->
                <div class="caption right-align">
                  <h3 style="color:green;">Welcome To Our Site</h3>
                  <!--      <h5 class="blue-text text-darken-2">We Are Cse 38th</h5> -->
                </div>
              </li>
              <li>
                <img src="{{asset('images/main.jpg')}}"> <!-- random image -->
                <div class="caption center-align">
                  <h3>Welcome To CSE Family</h3>
                   <!--      <h5 class="blue-text text-darken-2">We Are Cse 38th</h5> -->
                </div>
              </li>
            </ul>
          </div>
      </div>
      <!-- slider on left-top -->

      <!-- highlight section on right-->
      <div class="col s12 m3">
        <div class="row login" id="login-div">
            <!-- 
            <form class="col s12"> -->
              @include('includes.alert')
              {{Form::open(['route'=>['login'],'method'=>'post','class'=>'col s12'])}}
              <h5 style="text-align:center;">Log In</h5><hr><br>
              <div class="row">
                <div class="input-field col s12">
                  <input id="icon_prefix" type="text" class="validate" name="username">
                  <label for="icon_prefix">Username</label>  
                </div>
                <div class="input-field col s12">
                  <input id="icon_telephone" type="password" class="validate" name="password">
                  <label for="icon_telephone">Password</label>
                </div>
                  <div class="input-filed col s12">
                    <p>
                      <input type="checkbox" id="test5" />
                      <label for="test5">Remember Me</label>
                    </p>
                    <p>
                      <a href="#" id="create-account">Create Account</a>
                    </p>
                  </div>
                  
                <div class="input-field col s12">
                  <button class="btn waves-effect waves-light col s12 teal" type="submit" name="action">Submit
                  </button>
                </div>
              </div>
            <!-- </form> -->
            {{Form::close()}}
          
        </div>
        <div class="row login" id="create-account-div" style="display:none;position:absolute;">
            <!-- 
            <form class="col s12"> -->
              <form action='createAccount' method="post">
              <h5 style="text-align:center;">Create Account</h5><hr><br>
              <div class="row">
                <div class="input-field col s12">
                  <input id="icon_prefix" type="text" class="validate" name="username">
                  <label for="icon_prefix">Username</label>  
                </div>
                <div class="input-field col s12">
                  <input id="icon_telephone" type="password" class="validate" name="password">
                  <label for="icon_telephone">Password</label>
                </div>
                  <div class="input-filed col s12">
                    <p>
                      <a href="#" id="login">Already have an account ? login</a>
                    </p>
                  </div>
                  
                <div class="input-field col s12">
                  <button class="btn waves-effect waves-light col s12 teal" type="submit" name="action">Submit
                  </button>
                </div>
              </div>
           </form>
           
          
        </div>
      </div>
      <!--end highlight section on right-->
    </div>
    <!--end first row -->

    <!-- second row -->
    <div class="row" style="margin:0px;">
      
      <!-- slider on right-top -->
      
        <div class="row">
          
          <div class="col s12 m3">
            <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="{{asset('images/s6.jpg')}}" height="200em;">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Examination hall<i class="material-icons right">more_vert</i></span>
                <p><a href="#">This is a link</a></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
                <p>Here is some more information about this product that is only revealed once clicked on.</p>
              </div>
            </div>
          </div>

          <div class="col s12 m3">
            <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="{{asset('images/s7.jpg')}}" height="200em;">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Examination hall<i class="material-icons right">more_vert</i></span>
                <p><a href="#">This is a link</a></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
                <p>Here is some more information about this product that is only revealed once clicked on.</p>
              </div>
            </div>
          </div>

          <div class="col s12 m3">
            <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="{{asset('images/s4.jpg')}}" height="200em;">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Examination hall<i class="material-icons right">more_vert</i></span>
                <p><a href="#">This is a link</a></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Examination hall<i class="material-icons right">close</i></span>
                <p>Here is some more information about this product that is only revealed once clicked on.</p>
              </div>
            </div>
          </div>

          <div class="col s12 m3">
            <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="{{asset('images/s8.jpg')}}" height="200em;">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Examination hall<i class="material-icons right">more_vert</i></span>
                <p><a href="#">This is a link</a></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Examination hall<i class="material-icons right">close</i></span>
                <p>Here is some more information about this product that is only revealed once clicked on.</p>
              </div>
            </div>
          </div>

        </div>
     
      <!-- slider on right-top -->
    </div>
    <!--end second row -->

    <!-- end page Layout     -->
  </div>
  <!-- end page Content -->

   @include('includes.footer')



@include('includes.script')
<script type="text/javascript">
  $(document).ready(function(){
    $(".button-collapse").sideNav();
    $('.slider').slider({full_width: false});

    $('#create-account').on('click', function(){
        $('#create-account-div').show();
        $('#login-div').hide();
    });

    $('#login').on('click', function(){
        $('#create-account-div').hide();
        $('#login-div').show();
    });

  });

</script>

</body>
</html>