<div class="col-md-2">
			<div class="list-group">
			  <a href="#" class="list-group-item active">
			    Semester
			  </a>
			  <a href="{{route('admin')}}" class="list-group-item">Create Semester</a>
			  
			  <a href="#" class="list-group-item active">
			    Exam
			  </a>
			  <a href="{{route('admin.exam')}}" class="list-group-item">Create Exam</a>
			 
			  <a href="#" class="list-group-item active">
			    Exam Routines
			  </a>
			  @foreach($exams as $exam)
			    <a href="{{route('admin.routine', $exam->id)}}" class="list-group-item">{{$exam->exam_type->name}} {{$exam->semester->session}} {{$exam->semester->year}}</a>
			  @endforeach
			</div>

		</div>