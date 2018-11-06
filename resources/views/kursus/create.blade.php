@extends(Auth::user()->role_id==1 ? 'layouts.admin-horizontal' : 'layouts.operator-horizontal')
@section('css')

@endsection
@section('content')
<div class="container">

	<a href="{{route('courses.index')}}" type="button" class="btn btn-success" name="button"><i class="fa fa-arrow-left"></i> Back</a><hr>

	<form class="form" id="add" action="{{ route('courses.store') }}" enctype="multipart/form-data" method="post" files="true" id="orderForm">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Data Peserta Kursus
			</div>
			<div class="panel-body">
				<div class="row">

					<div class="panel-body">
						<div class="form-group">
	            			@csrf
	            			@method('post')
							<h4><span class="label label-default">Nama Peserta: </span></h4>
							<input type="text" name="name" class="form-control" placeholder="Tulis sesuatu" required>
						</div>
						<div class="form-group">
							<h4><span class="label label-default">Nama Sertifikat: </span></h4>
							<input type="text" name="certificate_name" class="form-control" placeholder="Tulis sesuatu" required>
						</div>
						<div class="form-group">
							<h4><span class="label label-default">Jenis Kursus: </span></h4>
							<select class="form-control" name="courses_list_id" required>
								@foreach($courses_lists as $courses_list)
								<option value="{{ $courses_list->id }}">{{ $courses_list->type }} / {{$courses_list->price}}</option>
								@endforeach 
							</select>
						</div>
						<div class="form-group">
							<h4><span class="label label-default">Hari Tanggal: </span></h4>
							<input type="date" name="date" class="form-control" placeholder="Tulis sesuatu" required>
						</div>
						<div class="form-group">
							<h4><span class="label label-default">Jam: </span></h4>
							<input type="text" name="time" class="form-control" placeholder="Tulis sesuatu" required>
						</div>
						<div class="form-group">
							<h4><span class="label label-default">Tempat Kursus: </span></h4>
							<input type="text" name="place" class="form-control" placeholder="Tulis sesuatu" required>
						</div>
						<div class="form-group">
							<h4><span class="label label-default">Harga: </span></h4>
							<input type="number" class="form-control" name="price" placeholder="Tulis sesuatu" required>
						</div>
						<div class="form-group">
							<h4><span class="label label-default">DP: </span></h4>
							<input type="number" class="form-control" name="dp" placeholder="Tulis sesuatu" required>
						</div>

						<button type="submit" class="btn btn-success center-block btn-block"><i class="fa fa-save"></i>  Submit</button>
					</div>

					{{-- end form --}}
				</div>
				{{-- end row --}}	
				
			</div>
		</div>
		{{-- end main panel --}}
	</div>
	<div class="col-md-12">
		<course-item></course-item>
	</div>
	</form>

</div>
{{-- end container --}}
@endsection
@section('script')
<script type="text/javascript">
const sbmt = ()=>{
    swal({
        type:"warning",
        title:"Apakah anda yakin ?",
        text:"",
        showCancelButton:true,
        cancelButtonColor:"#d33",
        confirmButtonText:"Ya",
        confirmButtonColor:"#3085d6"
    }).then(result=>{
        if(result.value){
            $("#add").submit();
        }
    });
}
</script>
@endsection
