<!DOCTYPE html>
<html>
<head>
  @include('includes.header')
  <style type="text/css">
     
     
     html, body, .section { height: 100%; }
      body > .section { height: auto; min-height: 100%; }

      footer {
       clear: both;
       position: relative;
       z-index: 10;
       height: 3em;
       margin-top: -3em;
      }
  </style>
</head>

<body>

  @include('includes.navbar')

  <!-- Page Content goes here -->
  <div class="section" style="margin:0px;">
    <!-- Page Layout here -->
    <!-- first row -->
    <div class="row">
      @foreach($teachers as $teacher)
      <div class="col s12 m3">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="{{$teacher->url}}" style="height:250px;">
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4" style="font-size:15px;font-weight:bold;">{{$teacher->teacher_name}}<i class="material-icons right">more_vert</i></span>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">{{$teacher->teacher_name}}<i class="material-icons right">close</i></span>

            <p>Computer Science And Engineering</p>
            <p>Name : {{$teacher->teacher_name}} </p>
            <p>Contact No. : {{$teacher->contact_no}}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <!--end first row -->
    <!-- end page Layout     -->
  </div>
  <!-- end page Content -->

   @include('includes.footer')





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

  });

</script>

</body>
</html>