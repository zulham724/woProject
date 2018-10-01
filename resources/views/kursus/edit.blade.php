@extends(Auth::user()->role_id==1 ? 'layouts.admin-horizontal' : 'layouts.operator-horizontal')
@section('css')

@endsection
@section('content')
<div class="container">

	<a href="{{route('courses.index')}}"><button type="button" class="btn btn-success" name="button">Back</button></a><hr>

	<div class="panel panel-default">
		<div class="panel-heading">
			Edit Data Peserta Kursus
		</div>
		<div class="panel-body">
			<form class="form" action="{{ route('courses.update',$courses->id) }}" enctype="multipart/form-data" method="post" files="true" id="orderForm">
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
									<h4><span class="label label-default">Tempat Kursus: </span></h4>
									<input type="text" name="place" class="form-control" value="{{$courses->place}}">
								</div>
								<button type="submit" class="btn btn-success center-block btn-block">Submit</button>
							</div>

				{{-- end form --}}
			</div>
			{{-- end row --}}
			
			</div>	
			</form>
		</div>
	</div>

	{{-- end main panel --}}

</div>
{{-- end container --}}
@endsection
@section('script')
<script type="text/javascript">
var i = 0; //untuk total item
var a = 0; //untuk total acara
function datepicker(){
	$('.datepicker').datepicker({
      language: 'id',
      format:'yyyy-mm-dd'
    });
}
$(document).ready(function(){
	$('#tokenfield').tagsinput('items');
	datepicker();
	// $("#orderForm").validate({
	// 	rules:{
	// 		upload:{
	// 			required:true
	// 		}
	// 	}
	// });
	$("#orderForm").validate({
		rules:{
			dp:{
				required:true,
				digits: true
			}
		}
	});
});
function addItem(){
	i+=1;
	if(i>=0){
		$("#removeItem").html("<button class='btn btn-danger' type=button onclick='removeItem();'>Remove</button>")
	}
	$("#contentItem").append(
		"\
		<div class='form-group' id='item"+i+"'>\
			<div class='row'>\
				<div class='col-md-8'>\
					<input type='text' name='item"+i+"' class='form-control' placeholder='Nama Barang'>\
				</div>\
				<div class='col-md-4'>\
					<input type='number' name='cost"+i+"' class='form-control' placeholder='harga'>\
				</div>\
			</div>\
		</div>\
		");
	$("#totalItem").val(i);
	console.log($("#totalItem").val());
	console.log('item added',i);
	// $("#contentItem").append("")

}
function removeItem(){
	$("#item"+i).remove();
	i-=1;
	if(i==0){
		$("#removeItem").html("");
	}
	$("#totalItem").val(i);
	console.log($("#totalItem").val());
	console.log("item removed",i);
}
function addAcara(){
	a+=1;
	if(a>=0){
		$("#removeAcara").html("<button class='btn btn-danger' type=button onclick='removeAcara();'>Remove</button>")
	}
	$("#contentAcara").append(
		"\
		<div class='form-group' id='acara"+a+"'>\
			<div class='row'>\
				<div class='col-md-4'>\
					<input type='text' name='acara"+a+"' class='form-control' placeholder='Acara Pelaksanaan'>\
				</div>\
				<div class='col-md-3'>\
					<input type='text' name='tanggal"+a+"' class='datepicker form-control' placeholder='Tanggal' required readonly>\
				</div>\
				<div class='col-md-2'>\
					<input type='text' name='jam"+a+"' class='form-control' placeholder='Jam'>\
				</div>\
				<div class='col-md-3'>\
					<input type='text' name='tempat"+a+"' class='form-control' placeholder='Tempat'>\
				</div>\
			</div>\
		</div>\
		");
	$("#totalAcara").val(a);
	console.log($("#totalAcara").val());
	console.log('Acara added',a);
	// $("#contentItem").append("")
	datepicker();
}
function removeAcara(){
	$("#acara"+a).remove();
	a-=1;
	if(a==0){
		$("#removeAcara").html("");
	}
	$("#totalAcara").val(a);
	console.log($("#totalAcara").val());
	console.log("Acara removed",a);
}
</script>
@endsection
