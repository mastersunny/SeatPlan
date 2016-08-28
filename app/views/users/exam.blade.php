<!DOCTYPE html>
<html lang="en">
<head>
@include('site.head')
</head>
<body>
	<div class="modal fade" id="infoModal" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
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
		    <div class="well" id="createExam">
		   	    <h2 class="text-primary" style="text-align:center;">
				   Create Exam
			    </h2>
			
				<form id="createExam">
					  <div class="form-group row">
					    <label for="semester" class="col-sm-2 form-control-label">Semester</label>
					    <div class="col-sm-10">
					      <select name="semester_id" id="semester" class="form-control">
					      	 @foreach($semesters as $semester)
	                           <option value="{{$semester->id}}">{{$semester->session}} {{$semester->year}}</option>
					      	 @endforeach
					      </select>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="exam_type" class="col-sm-2 form-control-label">Exam Type</label>
					    <div class="col-sm-10">
					      <select name="exam_type_id" id="exam_type" class="form-control">
					      	 @foreach($exam_types as $exam_type)
	                           <option value="{{$exam_type->id}}">{{$exam_type->name}}</option>
					      	 @endforeach
					      </select>
					    </div>
					  </div>
					  <div class="form-group row">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default">Submit</button>
					    </div>
					  </div>
			    </form>
		    </div>
		    <div class="well" id="editExam" style="display:none;">
		   	    <h2 class="text-primary" style="text-align:center;">
				   Edit Exam
			    </h2>
			
				<form id="editExam">
					  <div class="form-group row">
					    <label for="editSemester" class="col-sm-2 form-control-label">Semester</label>
					    <div class="col-sm-10">
					      <select name="semester_id" id="editSemester" class="form-control">
					      	 @foreach($semesters as $semester)
	                           <option value="{{$semester->id}}">{{$semester->session}} {{$semester->year}}</option>
					      	 @endforeach
					      </select>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="editExam_type" class="col-sm-2 form-control-label">Exam Type</label>
					    <div class="col-sm-10">
					      <select name="exam_type_id" id="editExam_type" class="form-control">
					      	 @foreach($exam_types as $exam_type)
	                           <option value="{{$exam_type->id}}">{{$exam_type->name}}</option>
					      	 @endforeach
					      </select>
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
				    Current Exams
			    </h2>
				<table class="table table-bordered" style="background:#FFFFFF;">
				    <thead>
				      <tr>
				        <th>session</th>
				        <th>year</th>
				        <th>type</th>
				        <th></th>
				        <th></th>
				      </tr>
				    </thead>
				    <tbody id="examInfo">
				    	@foreach($exams as $exam)
				      <tr>

				        <td>{{$exam->semester->session}}</td>
				        <td>{{$exam->semester->year}}</td>
				        <td>{{$exam->exam_type->name}}</td>
				     
				        <td>
				        	<button  id="edit" data-semid="{{$exam->semester_id}}" data-typeid="{{$exam->exam_type_id}}" data-examid="{{$exam->id}}" class="btn btn-sm btn-info" type="button"> Edit </button>
				        </td>
				        <td>
				        	<button id="delete" data-semid="{{$exam->semester_id}}" data-typeid="{{$exam->exam_type_id}}" data-examid="{{$exam->id}}" class="btn btn-sm btn-danger" type="button"> delete </button>
				        </td>
				      </tr>
				      @endforeach
				     
				</tbody>
	        </table>
			
		   </div>	
			
		</div>
	</div>
		
	</div>
 <script type="text/javascript">
    $(document).ready(function(){

    	function timeOut(){
       	  setTimeout(function(){ document.location.reload(); }, 1000);
        }
    	var baseUrl = "{{asset('/')}}";
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

        $('form#createExam').on('submit',function(e){

           e.preventDefault();
           console.log($(this).serialize());
           
           var url = baseUrl+"admin/exam/store"; 


           $.ajax({

              type: "POST",
              url: url,
              data: $(this).serialize(),
              dataType  : 'json',
              success: function(response){

                $('#infoModal h2').empty().append("Exam Created Successfully");
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

        $('button#edit').click(function(e){

        	var examid = $(this).data('examid');

            var semid = $(this).data('semid');
            var typeid = $(this).data('typeid');

            var session  = $(this).parent('td').siblings().eq(0).text();
            var year  = $(this).parent('td').siblings().eq(1).text();
            var exam_type  = $(this).parent('td').siblings().eq(2).text();



            $('select#editSemester').val(semid);
            $('#editExam_type').val(typeid);

           $('#createExam').slideUp(300);
           $('#editExam').slideDown(300);

           $('form#editExam').submit(function(e){

           	var url = baseUrl+"admin/exam/update/"+examid; 
               
               e.preventDefault();
               
               $.ajax({

	              type: "POST",
	              url: url,
	              data: $(this).serialize(),
	              dataType  : 'json',
	              success: function(response){

	           	    $('#infoModal h2').empty().append("Exam Edited Successfully");
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

        $('button#delete').click(function(){

        	var examid = $(this).data('examid');
        	

        	var url = baseUrl+"admin/exam/delete/"+examid; 
            
            $.ajax({

              type: "delete",
              url: url,
              dataType  : 'json',
              success: function(response){

                $('#infoModal h2').empty().append("Exam Deleted Successfully");
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