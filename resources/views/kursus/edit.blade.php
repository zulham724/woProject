@extends(Auth::user()->role_id==1 ? 'layouts.admin-horizontal' : 'layouts.operator-horizontal')
@section('css')

@endsection
@section('content')
<div class="container">

	<a href="{{route('courses.index')}}"><button type="button" class="btn btn-success" name="button"><i class="fa fa-arrow-left"></i> Back</button></a><hr>

	<div class="row">
		<form class="form" action="{{ route('courses.update',$courses->id) }}" enctype="multipart/form-data" method="post" files="true" id="orderForm">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit Data Peserta Kursus
				</div>
				<div class="panel-body">
					<div class="row">

						<div class="panel-body">
							<div class="form-group">
		            			@csrf
		            			@method('put')
								<h4><span class="label label-default">Nama Pemesan: </span></h4>
								<input type="text" name="name" class="form-control" value="{{$courses->name}}">
							</div>
							<div class="form-group">
								<h4><span class="label label-default">Nama Sertifikat: </span></h4>
								<input type="text" name="certificate_name" class="form-control" value="{{$courses->certificate_name}}">
							</div>
							<div class="form-group">
								<h4><span class="label label-default">Jenis Kursus: </span></h4>
								<select class="form-control" name="courses_list_id">
									@foreach($courses_lists as $courses_list)
									<option value="{{ $courses_list->id }}" {{ $courses_list->id == $courses->courses_list_id ? 'selected' : null }}>{{ $courses_list->type }} / {{$courses_list->price}}</option>
									@endforeach 
								</select>
							</div>
							<div class="form-group">
								<h4><span class="label label-default">Hari Tanggal: </span></h4>
								<input type="date" name="date" class="form-control" value="{{$courses->date}}">
							</div>
							<div class="form-group">
								<h4><span class="label label-default">Jam: </span></h4>
								<input type="text" name="time" class="form-control" value="{{$courses->time}}">
							</div>
							<div class="form-group">
								<h4><span class="label label-default">Tempat Kursus: </span></h4>
								<input type="text" name="place" class="form-control" value="{{$courses->place}}">
							</div>
							<button type="submit" class="btn btn-success center-block btn-block">Submit</button>
						</div>

						{{-- end form --}}
					</div>
					{{-- end row --}}
					
				</div>	
			</div>

			{{-- end main panel --}}
		</div>
		<div class="col-md-12">
			<course-item v-bind:edit_course_items="{{ $courses->course_items }}"></course-item>
		</div>
		</form>
	</div>

</div>
{{-- end container --}}
@endsection
@section('script')

@endsection
