@extends('layouts.admin-horizontal')
@section('css')

@endsection
@section('content')
	<div class="container">
	<a href="{{route('courses.create')}}" type="button" class="btn btn-success"><i class="fa fa-pencil-alt "></i> Input Peserta Kursus</a><hr>

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
							<th>Jam Kursus</th>
							<th>Tempat Kursus</th>
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
							<td>{{$course->courses_list->type}}</td>
							<td>{{$c+1}}</td>
							<td>{{$course->name}}</td>
							<td>{{$course->certificate_name}}</td>
							<td>{{$date}}</td>
							<td>{{$course->time}}</td>
							<td>{{$course->place}}</td>
							<td>
								<a type="button" href="{{ route('courses.edit',$course->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
								<a type="button" class="btn btn-danger " onclick="destroy({{$course->id}})"><i class="fa fa-trash"></i> Delete</a>
								<span data-toggle="modal" data-target="#modalPrint{{$course->id}}" >
									<a type="button" class="btn btn-success " ><i class="fa fa-print"></i> Print</a>
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
				<div id="printThis{{$course->id}}">
					<div class="text-center">
						<img src="{{asset('img/logo/logo.png')}}" />
						<h4>Wedding & Event Organizer</h4>
						<h5>Jl.Pandanaran 126.Ruko Masjid Baiturrahman,Simpang Lima ,Semarang. Telp (024) 8313313</h5>
					</div><hr style="height: 3px;border:none;color: #333;background-color: #333">
					<div class="text-center">
						
						<p style="font-size:50px; font-family: Bookman Old Style"><b><u>SERTIFIKAT</u></b></p><br>
						<h4>Diberikan kepada :</h4>
						@php
						setlocale (LC_TIME, 'id_ID');
						$date = strftime( "%d %B %Y", strtotime($course->date));
						$date1 = strftime( " %d %B %Y", time());
						$kalimat = $course->name;
						$kalimat_new = ucwords($kalimat);
						$tipe = $course->courses_list->type;
						$tipe_new = ucwords($tipe)
						@endphp
						<font face="Comic Sans MS">
							<h1><u>{{$kalimat_new}}</u></h1><br>
						</font>
						<h4>Telah menyelesaikan program kursus {{$tipe_new}}<br>
							yang dilaksanakan pada tanggal {{$date}}<br>
							dengan hasil Baik dan dinyatakan telah layak bekerja <br>
							sesuai dengan program keahlian yang telah diikuti<br><br>
						</h4>
					</div>
					
	      	     	
					
					<div class="row" style="height:150px">
						<div class="col-xs-12">
							<div class="col-xs-8">
							</div>
							<div class="col-xs-4">
								<h4>
									<center>Semarang, {{$date1}} <br>
									Ketua LPK</center></h4>
							</div>
							
						</div>
					</div>
					<div class="row" style="height:10px">
						<div class="col-xs-12">
							<div class="col-xs-8">
							</div>
							<div class="col-xs-4">
								<h4><center>Success</center> </h4>
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

@endsection
@section('script')
<script type="text/javascript">

$(document).ready(function(){

$("table").DataTable();

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
	$("#printThis"+id).printThis();
}
// end ready
</script>
@endsection
