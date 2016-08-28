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
		   <div class="well" id="createSemester">
		   	  <h2 class="text-primary" style="text-align:center;">
				Create Semester
			</h2>
			
			<form id="createSemester">
				  <div class="form-group row">
				    <label for="session" class="col-sm-2 form-control-label">Sesssion</label>
				    <div class="col-sm-10">
				      <input name="session" type="text" class="form-control" id="session" placeholder="Fall / Summer / Spring" required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="start" class="col-sm-2 form-control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input name="start_date" type="text" class="form-control date1" id="start" required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="end" class="col-sm-2 form-control-label">End Date</label>
				    <div class="col-sm-10">
				      <input name="end_date" type="text" class="form-control date1" id="end" required>
				    </div>
				  </div>
			
				  <div class="form-group row">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">Submit</button>
				    </div>
				  </div>
		    </form>
		   </div>
		   <div class="well" id="editSemester" style="display:none;">
		   	  <h2 class="text-primary" style="text-align:center;">
				Edit Semester
			</h2>
			
			<form id="editSemester">
				  <div class="form-group row">
				    <label for="editSession" class="col-sm-2 form-control-label">Sesssion</label>
				    <div class="col-sm-10">
				      <input name="session" type="text" class="form-control" id="editSession" required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="start_date" class="col-sm-2 form-control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input name="start_date" type="text" class="form-control date1" id="start_date" required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="end_date" class="col-sm-2 form-control-label">End Date</label>
				    <div class="col-sm-10">
				      <input name="end_date" type="text" class="form-control date1" id="end_date" required>
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
		   	  <h2 class="text-primary" style="text-align:center;text-align:center;">
				Current Semesters
			</h2>
			<table class="table table-bordered" style="background:#FFFFFF;">
			    <thead>
			      <tr>
			        <th>session</th>
			        <th>start date</th>
			        <th>end date</th>
			        <th></th>
			        <th></th>
			      </tr>
			    </thead>
			    <tbody id="semesterInfo">
			    	@foreach($semesters as $semester)
				      <tr>
				        <td>{{$semester->session}}</td>
				       
				        <td>{{$semester->start_date}}</td>
				        <td>{{$semester->end_date}}</td>
				        <td>
				        	<button id="edit" data-id="{{$semester->id}}" class="btn btn-sm btn-info" type="button"> Edit </button>
				        </td>
				        <td>
				        	<button id="delete" data-id="{{$semester->id}}" class="btn btn-sm btn-danger" type="button"> delete </button>
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

        $('form#createSemester').on('submit',function(e){

           e.preventDefault();
           console.log($(this).serialize());
           
           var url = baseUrl+"admin/semester/store"; 


           $.ajax({

              type: "POST",
              url: url,
              data: $(this).serialize(),
              dataType  : 'json',
              success: function(response){

                

                	$('#infoModal h2').empty().append("Semester Created Successfully");
                    $('#infoModal').modal('show');

                

               
                 timeOut();

 
              },
              error: function(){
                 $('#infoModal h2').empty().append("Failed to create Semester");
                 $('#infoModal').modal('show');
                 timeOut();
              }

            }); 
        });

        $('button#edit').click(function(e){

            var id = $(this).data('id');

            var session  = $(this).parent('td').siblings().eq(0).text();
            var start_date  = $(this).parent('td').siblings().eq(1).text();
            var end_date  = $(this).parent('td').siblings().eq(2).text();

           $('#editSession').val(session);
           $('#start_date').val(start_date);
           $('#end_date').val(end_date);
           
           $('#createSemester').slideUp(300);
           $('#editSemester').slideDown(300);

           $('form#editSemester').submit(function(e){

           	var url = baseUrl+"admin/semester/update/"+id; 
               
               e.preventDefault();
               
               $.ajax({

	              type: "POST",
	              url: url,
	              data: $(this).serialize(),
	              dataType  : 'json',
	              success: function(response){

	           	    $('#infoModal h2').empty().append("Semester Edited Successfully");
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

        	var id = $(this).data('id');
        	console.log(id);

        	var url = baseUrl+"admin/semester/delete/"+id; 
            
            $.ajax({

              type: "delete",
              url: url,
              dataType  : 'json',
              success: function(response){

                $('#infoModal h2').empty().append("Semester Deleted Successfully");
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