<!DOCTYPE html>
<html lang="en">
<head>
  @include('site.head')

</head>
<body>
	<div class="modal fade" id="infoModal" role="dialog">
	    <div class="modal-dialog">
	    
	      <div class="modal-content">
	        
	        <div class="modal-body" style="text-align:center;">
	          <h2 class="text-primary"></h2>
	        </div>
	     
	      </div>
	      
	    </div>
    </div>
	@include('site.nav')
<div class="container-fluid">
	
	<div class="row">
		@include('site.side')
		<div class="col-md-10">
		   
		   <div class="well">
		   	  <h2 class="text-primary" style="text-align:center;">
				Create Routine
			</h2>
			
			<form id="examRoutine">
				<div class="form-group row">
				    <label for="courseCode" class="col-sm-2 form-control-label">Batch</label>
				    <div class="col-sm-10">
				      <select name="batch" id="batch" class="form-control">
				      	@foreach($batches as $batch)
				      	  <option value="{{$batch->batch_id}}">{{$batch->semester}} ({{$batch->batch_no}}) total - {{$batch->total_student}}</option>
				      	@endforeach
				      </select>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="courseId" class="col-sm-2 form-control-label">Course Code</label>
				    <div class="col-sm-10">
				      <select name="course_id" id="courseId" class="form-control">
				      	@foreach($courses as $course)
				      	 <option value="{{$course->course_id}}">{{$course->course_code}}</option>
				      	 @endforeach
				      </select>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="examDate" class="col-sm-2 form-control-label">Date</label>
				    <div class="col-sm-10">
				      <input name="date" type="text" class="form-control date2" id="examDate">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="stTime" class="col-sm-2 form-control-label">Start Time</label>
				    <div class="col-sm-10">
				      <input name="start_time" type="text" class="form-control time" id="stTime">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="endTime" class="col-sm-2 form-control-label">End Time</label>
				    <div class="col-sm-10">
				      <input name="end_time" type="text" class="form-control time" id="endTime">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="examId" class="col-sm-2 form-control-label">Exam Name</label>
				    <div class="col-sm-10">
				      <select name="exam_id" class="form-control" id="examId">
				      	 @foreach($exams as $exam)
			              <option value="{{$exam->id}}">{{$exam->exam_type->name}} {{$exam->semester->session}} {{$exam->semester->year}}</option>
			             @endforeach
				      </select>
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-2">
				    	<button id="checkRoom" type="button" class="btn btn-primary btn-sm">Check room</button>
				    </div>
				    <div class="col-sm-10">
				      <table class="table table-bordered" style="background:#FFFFFF;">
					    <thead>
					      <tr>
					        <th>Room Number</th>
					        <th>Teacher 1</th>
					        <th>Teacher 2</th>
					      </tr>
					    </thead>
					    <tbody id="roomInfo" style="text-align:center;">
					      
					     
					    </tbody>
					  </table>
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">Submit</button>
				    </div>
				  </div>
		    </form>
		   </div>	
			<div class="well">
		   	  <h2 class="text-primary" style="text-align:center;">
				Exam Routines
			</h2>
			<table class="table table-bordered" style="background:#FFFFFF;">
			    <thead>
			      <tr>
			        <th>Subject Code</th>
			        <th>Batch</th>
			        <th>Subject Name</th>
			        <th>Date</th>
			        <th>Start Time</th>
			        <th>End Time</th>
			        <th>Room</th>
			        <th>Reg. start</th>
			        <th>Reg. end</th>
			        <th>Teacher One</th>
			        <th>Teacher Two</th>
			   
			        <th></th>
			      </tr>
			    </thead>
			    <tbody id="semesterInfo">

			      @foreach($eroutine->exam_routines as $exam_routine)
			      	
			      	@foreach($exam_routine->courses as $course)

			      		@foreach($exam_routine->room_assigned as $room_assign)

					      <tr>
					        <td>{{$course->course_code}}</td>
					        <td>{{$exam_routine->ebatch->semester}}</td>
					        <td>{{$course->course_title}}</td>
					     	<td>{{$exam_routine->date}}</td>
					     	<td>{{$exam_routine->start_time}}</td>
					     	<td>{{$exam_routine->end_time}}</td>
					     	<td>{{$room_assign->room->room_number}}</td>
					     	<td>{{$room_assign->start_registration}}</td>
					     	<td>{{$room_assign->end_registration}}</td>
					     	<td>{{$room_assign->teacherAssign->teacherOne->teacher_name}}</td>
					     	<td>{{$room_assign->teacherAssign->teacherTwo->teacher_name}}</td>
				
					        <td>
					        	<button id="delete" data-id="{{$exam_routine->exam_routine_id}}" class="btn btn-sm btn-danger" type="button"> delete </button>
					        </td>
					      </tr>
			    		@endforeach

			    	@endforeach

			     @endforeach
			</tbody>
        </table>
			
		   </div>
		</div>
	</div>
		
	</div>
 <script type="text/javascript">
    $(document).ready(function(){

    	var baseUrl = "{{asset('/admin')}}";
    	function timeOut(){
       	setTimeout(function(){ document.location.reload(); }, 1000);
       }

       $('.date1').datepicker({
                'format': 'yyyy-m-d',
                'autoclose': true
        });
       $('.date2').datepicker({
                'format': 'yyyy-m-d',
                'autoclose': true
        });

            $('.time').timepicker({
                 'timeFormat': 'H:i:s',
                 'step':15
            });
         
         
         var date = stTime = endTime = batch =courseId =examId=null;
          

        $('#checkRoom').on('click',function(){
        	

            console.log('checking for rooms');

            date = $('#examDate').val();
            stTime = $('#stTime').val();
            endTime = $('#endTime').val();
            batch = $('#batch').val();
            courseId = $('#courseId').val();
            examId = $('#examId').val();
            
            //console.log(date + stTime + endTime);
            if(date.length==0||stTime.length==0||endTime.length==0)
            {
            	$('#infoModal h2').empty().append("Please fill out the required fields").css('color','red');
	            $('#infoModal').modal('show');
	            return;
            }
            
            
           var url = baseUrl+"/checkRoom";
            
            
            $.ajax({

              type: "GET",
              url: url,
              data:{
                 date: date,
                 start_time: stTime,
                 end_time:endTime
              },
              dataType  : 'json',
              success: function(response){

              	$('#roomInfo').empty();

              	if(response.available.length==0){
              		$('#roomInfo').append('<h2 style="color:red;">No room available</h2>');
              	}
                 
                 
              
                   for(var i=0;i<response.available.length;i++){

                     $('<tr><td><div class="checkbox">'
					   + '<label><input type="checkbox" value="'+response.available[i].room_id+'" class="room">'+response.available[i].room_number+'</label>'
					   + '</div></td><td><select class="form-control" id="test100'+i+'"></select></td>'
					   + '<td><select class="form-control" id="test10'+i+'"></select></td>'
				  
					   +'</tr>')
		                   .appendTo('#roomInfo');

		               for(var j=0;j<response.teachers.length;j++){
		               	  $('<option value='+ response.teachers[j].teacher_id+'>'+response.teachers[j].teacher_code+'</option>')
		               	  .appendTo('#test100'+i);
		               }
		               for(var j=0;j<response.teachers.length;j++){
		               	  $('<option value='+response.teachers[j].teacher_id +'>'+response.teachers[j].teacher_code+'</option>')
		               	  .appendTo('#test10'+i);
		               }
		               
                  }
                
            
              },
              error: function(response){
                 alert("sorry you request cannot be processed"+ response);
              }

            }); 
            
            
        });
        $('form#examRoutine').on('submit',function(e){

           e.preventDefault();
           
           var routine = {};
           routine.date = date;
           routine.start_time= stTime; 
           routine.end_time= endTime;
           routine.batch= batch;
           routine.course_id= courseId;
           routine.exam_id= examId;

           
           var rooms=[],i=0;
           
           $('#roomInfo tr').each(function(k,row){

                var $row = $(row);
                if($row.find('.room').prop('checked')){
                   
           			// console.log(k);

                    var $room = $row.find('.room').val();

                	var $teacher1 = $row.children('td').eq(1).find('select').val();
		           
		            var $teacher2 = $row.children('td').eq(2).find('select').val();
		            rooms[i++] = {id: $room, teacher1: $teacher1,teacher2: $teacher2};
		            // i++;
                }
	            
           });
           
           if(rooms.length==0){

           	  $('#infoModal h2').empty().append("Please fill out the required fields").css('color','red');
	          $('#infoModal').modal('show');
	          return;
           }
           console.log(rooms);
           routine.rooms=rooms;

           var url = baseUrl + "/examRoutine/store";
           console.log(JSON.stringify(routine));
           
           $.ajax({

              type: "POST",
              url: url,
              data: {
              	data : JSON.stringify(routine)
              },
              dataType  : 'json',
              success: function(response){

               console.log(response); 	
                
               $('#infoModal h2').empty().append("Routine Created Successfully");
	            $('#infoModal').modal('show');
	           
	            timeOut();
                //console.log(response);



                
              },
              error: function(response){

                $('#infoModal h2').empty().append("Failed");
	            $('#infoModal').modal('show');
	           
	             timeOut();
	             //console.log(response);
              }

            }); 
        });

        $('button#delete').click(function(){

        	var id = $(this).data('id');
        	console.log(id);

        	var url = baseUrl+"/examRoutine/delete/"+id; 
            
            $.ajax({

              type: "delete",
              url: url,
              dataType  : 'json',
              success: function(response){

                $('#infoModal h2').empty().append("Routine Deleted Successfully");
                $('#infoModal').modal('show');
                timeOut();
 
              },
              error: function(){

                $('#infoModal h2').empty().append("Failed");
	            $('#infoModal').modal('show');
	             timeOut();
              }

            });
        });

         
    });
 </script>
</body>
</html>