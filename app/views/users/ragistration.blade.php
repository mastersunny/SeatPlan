<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/custom.css">

  <link href="{{asset('bootstrap/css/materialize.min.css')}}" rel="stylesheet">
  
  <link href="{{asset('bootstrap/css/custom.css')}}" rel="stylesheet">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

  @include('includes.header')

  <!-- Page Content goes here -->
  <div class="section" style="margin:0px;">
    <!-- Page Layout here -->
    <!-- first row -->
    <div class="row">
      <div class="col s12 m3">
        <div class="row">
          <div class="card">
            <div class="card-image">
              <img src="police.jpg" width="300">
              <span class="card-title">S Piklu</span>
            </div>
            <div class="card-content">
              <h5>CSE</h5>
              <h5>Lecturer</h5>
            </div>
          </div>
        </div>
            
      </div>
      <div class="col s12 m9">
        <div class="row ">
          <div class="card">
            <h3 style="text-align:center;">Create An Exam</h3><hr>
            <form class="col s12" action="/createExam" method="post">
              <div class="row">
                <div class="input-field col s6">
                  <input type="text" name="exam_type" class="validate">
                  <label>Exam Type</label>
                </div>
                <div class="input-field col s6">
                  <input id="last_name"  type="text" name="session" class="validate">
                  <label for="last_name">Session</label>
                </div>
                <div class="input-field col s6">
                  <input type="text" name="year" class="datepicker">
                  <label for="password">Year</label>
                </div>
                <div class="input-field col s6">
                  <input type="text" name="start_date" class="datepicker">
                  <label for="">Start Date</label>
                </div>
                <div class="input-field col s6">
                  <input type="text" name="end_date" class="datepicker">
                  <label for="">End Date</label>
                </div>
                <div class="input-field col s6" >
                  <button style="margin-top:1em;" class="btn waves-effect waves-light col s12 teal" type="submit" name="action">Submit
                  </button>
                </div>
              </div>
            </form>
          </div>


        </div>
      </div>
    </div>
    <!--end first row -->
    <!-- end page Layout     -->
  </div>
  <!-- end page Content -->

   <footer class="page-footer teal darken-4 text-darken-4">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Footer Content</h5>
          <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright teal">
      <div class="container">
      © 2014 Copyright Text
      <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
      </div>
    </div>
  </footer>





<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/materialize.min.js"></script>


<script src="{{asset('bootstrap/js/jquery-2.1.1.min.js')}}"></script>
<script src="{{asset('bootstrap/js/materialize.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $(".button-collapse").sideNav();
    $('.slider').slider({full_width: false});

   // $('.datepicker').pickadate({
    //  selectMonths: true, // Creates a dropdown to control month
    //  selectYears: 15 // Creates a dropdown of 15 years to control year
    //});
  });

</script>

</body>
</html>