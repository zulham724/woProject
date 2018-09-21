@extends('layouts.admin-horizontal')
@section('css')

@endsection
@section('content')
	<div class="container">
	<a href="{{url('admin/kursus/create')}}"><button type="button" class="btn btn-success">Input Peserta Kursus</button></a><hr>

	<div class="panel panel-default">
		<div class="panel-heading">
			Data Peserta Kursus
		</div>
		{{-- end heading --}}
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>
								<select class="form-control" name="courses_list_id">
										<option value="">-Keseluruhan-</option>
										@foreach($courses_lists as $courses_list)
										<option value="{{ $courses_list->id }}">{{ $courses_list->type }}</option>
										@endforeach 
									</select>
		
             				</th>
							<th>No.</th>
							<th>Nama Pemesan</th>
							<th>Nama Sertifikat</th>
							<th>Waktu Kursus</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						@foreach($courses as $c => $courses)
						<tr>
							<td>{{$courses->courses_list->type}}</td>
							<td>{{$c+1}}</td>
							<td>{{$courses->name}}</td>
							<td>{{$courses->certificate_name}}</td>
							<td>{{$courses->date}}</td>
							<td>
								<a type="button" href="{{ route('courses.edit',$courses->id) }}" class="btn btn-warning" >Edit</a>
								<button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete{{$courses->id}}').submit();">Delete</button>

								<form id="delete{{$courses->id}}" action="{{ route('courses.destroy',$courses->id) }}" method="post">
									<input type="hidden" name="_method" value="delete">
									<input type="hidden" name="id" value="{{$courses->id}}">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
								</form>
						</tr>
						@endforeach
					</tbody>
					
				</table>		
			</div>
		</div>
		{{-- end body --}}
	</div>

	</div>
	{{-- end container --}}
@endsection
@section('script')
<script type="text/javascript">

$(document).ready(function(){

$("table").DataTable();

});
// end ready
</script>
@endsection
