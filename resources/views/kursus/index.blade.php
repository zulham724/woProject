@extends('layouts.admin-horizontal')
@section('css')
<link href="https://fonts.googleapis.com/css?family=Charmonman" rel="stylesheet" media="all">
<style type="text/css">
	@media print{
		.certificate * {
			-webkit-print-color-adjust: exact;
			font-family: 'Charmonman', cursive !important;
			color:brown !important;
		}
	}

	.certificate * {
		-webkit-print-color-adjust: exact;
		font-family: 'Charmonman', cursive !important;
		color:brown !important;
	}

</style>
@endsection
@section('content')
	<div class="container-fluid">
	<a href="{{route('courses.create')}}" type="button" class="btn btn-success"><i class="fa fa-pencil-alt "></i> Input Peserta Kursus</a><hr>

	<div class="panel panel-default">
		<div class="panel-heading">
			Data Peserta Kursus
		</div>
		{{-- end heading --}}
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Jenis Kursus</th>
							<th>Nama Pemesan</th>
							<th>Nama Sertifikat</th>
							<th>Waktu Kursus</th>
							<th>Jam Kursus</th>
							<th>Tempat Kursus</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						@foreach($courses as $c => $course)
						@php
						setlocale (LC_TIME, 'id_ID');
						$date = strftime( "%A, %d %B %Y", strtotime($course->date));
						@endphp
						<tr>
							<td>{{$c+1}}</td>
							<td>{{$course->courses_list->type}}</td>
							<td>{{$course->name}}</td>
							<td>{{$course->certificate_name}}</td>
							<td>{{$date}}</td>
							<td>{{$course->time}}</td>
							<td>{{$course->place}}</td>
							<td>{!! ($course->price+$course->sum_course_items_price) - ($course->dp+$course->sum_course_payments_price) <= 0 ? 
								"<img src='".asset('images/lunas.png')."' height=30>" : "<img src='".asset('images/belum_lunas.png')."' height=30>" !!}</td>
							<td>
								<a type="button" href="{{ route('courses.edit',$course->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Lihat/Edit</a>
								<a type="button" class="btn btn-danger " onclick="destroy({{$course->id}})"><i class="fa fa-trash"></i> Delete</a>
								<span data-toggle="modal" data-target="#modalPrint{{$course->id}}" >
									<a type="button" class="btn btn-success " ><i class="fa fa-print"></i> Print</a>
								</span>
								<span data-toggle="modal" data-target="#modalNote{{$course->id}}" >
									<a type="button" class="btn btn-info" ><i class="fa fa-print"></i> Print Nota</a>
								</span>

								<form id="delete{{$course->id}}" action="{{ route('courses.destroy',$course->id) }}" method="post">
									<input type="hidden" name="_method" value="delete">
									<input type="hidden" name="id" value="{{$course->id}}">
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

	<!-- Modal -->
@foreach($courses as $index => $course)
<div id="modalPrint{{$course->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Print Preview</h4>
      </div>
      <div class="modal-body">
				<div id="printThis{{$course->id}}" style="border-style: double;padding-bottom: 30px;border-color:brown;">
					<div class="text-center">
						<img src="{{asset('img/logo/logo.png')}}" />
						<h4>Wedding & Event Organizer</h4>
						<h5>Jl.Pandanaran 126.Ruko Masjid Baiturrahman,Simpang Lima ,Semarang. Telp (024) 8313313</h5>
					</div>
					<hr>
					
					<div class="certificate">
						
						<div class="text-center">
						
							<p style="font-size:50px;"><b>SERTIFIKAT</b></p><br>
							<h4 style="color:brown;">Diberikan kepada :</h4>
							@php
							setlocale (LC_TIME, 'id_ID');
							$date = strftime( "%d %B %Y", strtotime($course->date));
							$date1 = strftime( " %d %B %Y", time());
							$kalimat = $course->certificate_name;
							$kalimat_new = ucwords($kalimat);
							$tipe = $course->courses_list->type;
							$tipe_new = ucwords($tipe)
							@endphp
								<h1>{{$kalimat_new}}</h1><br>
							<h4>For having participate in</h4>
							<h3><b>{{$tipe_new}}</b></h3>
							<h4>{{ $date }} at. {{ $course->place }}</h4>
						</div>
						
		      	     	
						
						<div class="row" style="height:100px">
							<div class="col-xs-12">
								<div class="col-xs-8">
								</div>
								<div class="col-xs-4">
									<h4>
										<center style="font-family: Arial, Helvetica, sans-serif">
										LKP ROSELLA SUCCESS</center>
									</h4>
								</div>
								
							</div>
						</div>
						<div class="row" style="height:10px">
							<div class="col-xs-12">
								<div class="col-xs-8">
								</div>
								<div class="col-xs-4">
									<h4><center>Hj. Ratna Hidayati</center> </h4>
								</div>
								
							</div>
						</div>

					</div>
					
				</div>
				{{-- end printthis --}}
				<button type="button" name="button" class="btn btn-info btn-block" onclick="print_now({{$course->id}})">Print Now</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endforeach
{{-- test --}}

@foreach ($courses as $c => $course)
	<div id="modalNote{{$course->id}}" class="modal fade customtable" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Print Preview</h4>
	      </div>
	      <div class="modal-body">
				<div id="printNote{{$course->id}}">
					
					<div class="text-center">
						<img src="{{asset('img/logo/logo.png')}}" />
						<h4>Wedding & Event Organizer</h4>
						<h5>Jl.Pandanaran 126.Ruko Masjid Baiturrahman,Simpang Lima ,Semarang. Telp (024) 8313313</h5>
					</div><hr>
					@php
						setlocale (LC_TIME, 'id_ID');
						$date = strftime( "%d %B %Y", strtotime($course->date));
					@endphp
					
					<div class="row">
						<div class="col-xs-offset-2 col-xs-4">
							<div class="table-responsive">
								<table border="0">
									<tr>
										<td>Kursus</td><td> : </td><td>{{ $course->courses_list->type }}</td>
									</tr>
									<tr>
										<td>Pemesan </td> <td> : </td><td>{{ $course->name }}</td>
									</tr>
									<tr>
										<td>Waktu </td> <td> : </td><td>{{ $date }}</td>
									</tr>
									<tr>
										<td>Jam </td> <td> : </td><td>{{ $course->time }}</td>
									</tr>
									<tr>
										<td>Tempat </td> <td> : </td><td> {{ $course->place }}</td>
									</tr>
									<tr>
										<td>Harga Kursus</td> <td> : </td><td>Rp. {{ number_format($course->price,0,".",".") }}</td>
									</tr>
									<tr>
										<td>Total Harga Tambahan</td> <td> : </td><td>Rp. {{ number_format($course->sum_course_items_price,0,".",".") }}</td>
									</tr>
									<tr>
										<td>DP</td> <td> : </td><td>Rp. {{ number_format($course->dp,0,".",".") }}</td>
									</tr>
									<tr>
										<td>Angsuran</td> <td> : </td><td>Rp. {{ number_format($course->sum_course_payments_price,0,".",".") }}</td>
									</tr>
									<tr>
										<td>Status</td> <td> : </td><td>{{ ($course->price+$course->sum_course_items_price) - ($course->dp+$course->sum_course_payments_price) <= 0 ? 'Lunas' : 'Belum Lunas' }}</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="table-responsive">
								<table border="0">
									<tr>
										<td>Rincian tambahan: </td>
									</tr>
									@foreach ($course['course_items'] as $ci => $course_item)
										<tr>
											<td> - {{ $course_item->name }}</td><td> : </td><td>Rp. {{ number_format($course_item->price,"0",".",".") }}</td>
										</tr>
									@endforeach
								</table>
							</div>
						</div>
					</div>
					
					<center>
					<hr>
					<div class="row" style="height:80px">
						<div class="col-xs-12">
							<div class="col-xs-6">
								<h4>Hormat Kami</h4>
							</div>
							<div class="col-xs-6">
								<h4>Pemesan</h4>
							</div>
						</div>
					</div>
					<div class="row" style="height:5px">
						<div class="col-xs-12">
							<div class="col-xs-6">
								<h4>Success</h4>
							</div>
							<div class="col-xs-6">
								<h4>{{ $course->name }}</h4>
							</div>
						</div>
					</div>
					</center>
				</div>
				{{-- end printthis --}}
				<button type="button" name="button" class="btn btn-info btn-block" onclick="print_note({{$course->id}})">Print Now</button>
	       </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
@endforeach

@endsection
@section('script')
<script type="text/javascript">

$(document).ready(function(){

	$("#table").DataTable();

});

const destroy = (id)=>{
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
                let access = {
                    id:id,
                    _method:"delete",
                    _token:"{{ csrf_token() }}"
                }

                $.post("courses/"+id,access)
                .done(res=>{
                    swal({
                        title:"Ok!",
                        text:"Data berhasil dihaps!",
                        type:"success"
                    }).then(result=>{
                        window.location.reload();
                    });
                })
                .fail(err=>{
                     console.log(err);
                });
            }
        });
    }

    function print_now(id){
		$("#printThis"+id).printThis({
			importCSS: true,
            importStyle: true
		});
	}

	function print_note(id){
		$("#printNote"+id).printThis({
			importCSS: true,
            importStyle: true
		});
	}
// end ready
</script>
@endsection
