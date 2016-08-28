<?php 

/**
* 
*/
class InputController extends BaseController
{   


	public function getroom($date,$start_time,$end_time){

		 $exam_on_date= ExamRoutine::where('date',$date)->get();

         foreach($exam_on_date as $exam_routine){
         	
         }

    

	}

	public function showExamInput()
	{
		
        
		return View::make('users.ragistration');
	}
	


	//Creating Exam Routine and initilalize all database input

	public function examRoutine($exam_id)
	{
			
	}

	public function adminPage(){

		return View::make('users.createexam');
	}

}
