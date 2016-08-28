
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
<!-- <a href="#modal1" class="modal-trigger btn">asd</a> -->
  @include('includes.navbar')
  
  <div id="modal1" class="modal">
    <div class="modal-content" style="text-align:center;" id="attend">
      <h5 id="code"></h5>
      <h6 id="examName"></h6>
      <h6 id="batch"></h6>
      <p>
         <span id="teacher1"></span>
         <span id="teacher2"></span>
      </p>
    
      <table class="centered bordered">
       
        <tbody id="attendenceSheet">
        
        </tbody>


      </table>
      <button class="btn waves-effect waves-light" type="button" name="action" style="margin-top:1em;">Submit
           <i class="material-icons right">send</i>
      </button>
    </div>
  </div>
  <!-- Page Content goes here -->
  <div class="section" style="margin:0px;">
    <!-- Page Layout here -->

    <!-- first row -->
    <div class="row">
      
      <div class="col s12 m3">

        <ul class="collapsible" data-collapsible="accordion">
          <li>
            <div class="collapsible-header teal">Exam Routine</div>
            
          </li>
          @foreach($exams as $exam)
            <li>
              <div class="collapsible-header">{{$exam->session}} - {{$exam->year}}</div>
              <div class="collapsible-body">
              <div class="collection">
                  @foreach($exam->exams as $exam_type)
                    <a href="" data-year="{{$exam->year}}" data-session="{{$exam->session}}" data-examid="{{$exam_type->id}}" class="exam collection-item">{{$exam_type->exam_type->name}}</a>
                  @endforeach
              </div>
              </div>
            </li>
          @endforeach
        </ul>
      </div>

      <div class="col s12 m9">
        <div class="row">
          @if($teacher)
          <div class="card">
            <div class="col s12 m4" style="padding:3%;">  
              <img class="rounded" src="{{asset($teacher->url)}}">
            </div>
            
            <div class="col s12 m8" style="padding:3%;">
              <h5>Name: <i>{{$teacher->teacher_name}}</i></h5>
              <h5>Designation: <i>{{$teacher->teacher_designation->desig_name}}</i></h5>
              <h5>Email: <i>{{$teacher->email_no}}</i></h5>
              <h5>Contact No: <i>{{$teacher->contact_no}}</i></h5>
            </div>
            
          </div>
          @endif
          <div class="col s12 m12" style="margin:0px;padding:0px;">
            <div class="card" id="examRoutineCard">
              <h4 id="examRoutineInfo" style="display:none;">No Exam Routine Created For This Exam</h4>
              <table class="striped" id="examRoutineTable">
                <thead style="font-size:80%;">
                  <tr>
                      <th data-field="id">Subject Code</th>
                      <th data-field="name">Batch</th>
                      <th data-field="price">Subject Name</th>
                      <th data-field="price">Date</th>
                      <th data-field="price">Start Time</th>
                      <th data-field="price">End Time</th>
                      <th data-field="price">Room</th>
                      <th data-field="price">Reg. start</th>
                      <th data-field="price">Reg. end</th>
                      <th data-field="price">Teacher1</th>
                      <th data-field="price">Teacher2</th>
                  </tr>
                </thead>

                <tbody id="examRoutine" style="font-size:80%;">
                                    
                </tbody>
              </table>
            </div>
                  
          </div>
        </div>
        
      </div>

    </div>
    <!--end first row -->



    <!-- end page Layout     -->
  </div>
  <!-- end page Content -->

   <footer class="page-footer teal darken-4 text-darken-4" style="margin-bottom:0px;">
    
    <div class="footer-copyright teal">
      <div class="container">
      © 2014 Copyright Text
      <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
      </div>
    </div>
  </footer>

<!-- Modal Structure -->
  
        



@include('includes.script')



<script type="text/javascript">
  $(document).ready(function(){
 
    $('#examRoutineCard').hide();
    $(".button-collapse").sideNav();
    $('.slider').slider({full_width: false});
    
    var examSession = null;
    var examType= null;
    var examYear = null;
    var exam_routine_id=null;

    // var baseUrl = '{{'/'}}';
   
    $('.exam').on('click',function(e){

       
        examType = $(this).text();
        examSession = $(this).data('session');
        examYear = $(this).data('year');
        
        
      $('#examRoutineCard').show();

       e.preventDefault();

      $('tbody#examRoutine').empty();

       var exam_id =   $(this).data('examid');
       
       var url = ((baseUrl)+'examRoutine/'+exam_id);


      $.ajax({

      type: "GET",

      url: url,
      dataType  : 'json',
      success: function(response){
        console.log(response);
        
        
       
       if(response[0].exam_routines.length==0){

           $('#examRoutineTable').hide();
           $('#examRoutineInfo').show();
           return;
       }

        $('#examRoutineTable').show();
        $('#examRoutineInfo').hide();

        var subject_code=null,
            batch=null,
            session=null,
            subject_name=null,
            date=null,
            start_time=null,
            end_time=null,
            room_number=null,
                   teacher_1=null,
                   teacher_2=null,
                   course_id=null,
                   id_exam = null,
                   reg_start = null,
                   reg_end=null,
                   
                   $button;


        for(var i =0;i<response[0].exam_routines.length;i++){

            subject_code = response[0].exam_routines[i].courses[0].course_code;
            batch = response[0].exam_routines[i].batch.semester;
           // session = response[0].session;
            subject_name=response[0].exam_routines[i].courses[0].course_title;
            date=response[0].exam_routines[i].date;
            start_time=response[0].exam_routines[i].start_time;
            end_time=response[0].exam_routines[i].end_time;
            course_id = response[0].exam_routines[i].course_id;
            id_exam = response[0].semester_id;
            exam_routine_id = response[0].exam_routines[i].exam_routine_id;

 

           for(var j=0;j<response[0].exam_routines[i].room_assigned.length;j++){
               

                room_number = response[0].exam_routines[i].room_assigned[j].rooms[0].room_number;
                teacher_1 = response[0].exam_routines[i].room_assigned[j].teachers_assign[0].teacher1[0].teacher_code;
                teacher_2 = response[0].exam_routines[i].room_assigned[j].teachers_assign[0].teacher2[0].teacher_code;
                reg_start =  response[0].exam_routines[i].room_assigned[j].start_registration;
                reg_end = response[0].exam_routines[i].room_assigned[j].end_registration;
                                 

                $button  = $('<a href="#" data-routineid='+exam_routine_id+' data-course='+course_id+' data-exam='+id_exam+' class="btn waves-effect waves-light">Seat</a>');

                $('tbody#examRoutine').append("<tr>"
                                 +"<td class='code'>"  +  subject_code + "</td>" 
                                 + "<td class='batch'>" + batch + "</td>"
                                
                                 + "<td>" +  subject_name + "</td>"
                                 + "<td>" +  date + "</td>"
                                 + "<td>" +  start_time + "</td>"
                                 + "<td>" +  end_time + "</td>"
                                 + "<td>" +  room_number + "</td>"
                                 + "<td>" +  reg_start + "</td>"
                                 + "<td>" +  reg_end + "</td>"
                                 + "<td class='teacher1'>" +  teacher_1 + "</td>"
                                 + "<td class='teacher2'>" +  teacher_2 + "</td>"
                                 + "<td id =" + response[0].exam_routines[i].room_assigned[j].room_assign_id + ">" + "</td>"
                                
                                 + "</tr>");

                        $("td#"+response[0].exam_routines[i].room_assigned[j].room_assign_id).append($button).click(function(){

                             
                             
                             course_id = $(this).children('a').data('course');
                             id_exam = $(this).children('a').data('exam');
                             exam_routine_id = $(this).children('a').data('routineid');                          

                             subject_code = $(this).siblings('.code').text();
                             teacher1 = $(this).siblings('.teacher1').text();
                             teacher2 = $(this).siblings('.teacher2').text();
                             batch = $(this).siblings('.batch').text();

                             $('#code').empty().append(subject_code);
                             $('span#teacher1').empty().append("Teacher1: "+teacher1);
                             $('span#teacher2').empty().append("Teacher2: "+teacher2);
                             $('#examName').empty().append(examType +" " +examSession + " "+ examYear);
                             $('#batch').empty().append(batch);
                             
                             $('#attendenceSheet').empty();
                             attendence(course_id,id_exam,exam_routine_id);

                            
                        });
                        
           }
        }
      },
      error: function(){
         alert("sorry you request cannot be processed");
      }

    });

      


    });

   function attendence(course_id,id_exam){
             

             $('#modal1').openModal();

             url = baseUrl+'registeredStudents/'+course_id+'/'+id_exam;
             

            $.ajax({

             method: "GET",
              url: url,
              dataType  : 'json',
              success: function(response){
                    
                    console.log(response);

                var count = 0;
                var count2 = 1;
                var tr=null;
                var id = null;
                

                for(var i=0;i<response.length;i++){
                  
                    $('<tr><td><p><input name="present" type="checkbox" value="'+response[i].student_id+'" id="test'+i+'"/>'
                    +'<label for="test'+i+'"">'+response[i].reg_no+'</label></p></td></tr>')
                    .appendTo('#attendenceSheet');
                    
                             
                }
            
              },
              error: function(){
                 alert("sorry you request cannot be processed");
              }

            }); 

        

       

      }

      

        

         $('#attend button').click(function(){
            
            var present = [],i=0;
           $.each($("input[name='present']:checked"), function(){            
                present[i++] = {roll: $(this).val(), flag: 1};
            });

            url = (baseUrl+"saveStudentsAttendence/"+exam_routine_id);
              
            $.ajax({

              method: "GET",
              url: url,
              data: {
                student: JSON.stringify(present)
              },
            
              dataType  : 'json',
              success: function(response){


                  console.log(response);
                  $('#modal1').closeModal();
            
              },
              error: function(){
                 alert("sorry you request cannot be processed");
              }

            });
           // $.each( present, function( key, value ) {
            //   console.log( key + ": " + value );
            
            //});
         });
      




  });

 

</script>

</body>
</html>