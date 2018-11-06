@extends('layouts.admin-horizontal')
<!-- @section('order-active','class=menu-top-active') -->
@section('css')

@endsection
@section('content')
	<div class="container">
	<!-- <a href="{{url('admin/staff/create')}}"><button type="button" class="btn btn-success">Back</button></a> -->

	<div class="panel panel-default">
		<div class="panel-heading">
			Form Jenis Kursus
		</div>
		{{-- end heading --}}
	
		<div class="panel-body">
			<form method="POST" action="{{ route('courseslists.store') }}" >
	                        {{ csrf_field() }}

				<div class="form-group">
					            <span class="label label-default">Nama Jenis Kursus </span>
		            <input type="text" name="type" id="order_list" class="form-control" >
		        </div>
		        <button type="submit" class="btn btn-success center-block btn-block"><i class="fa fa-save "></i>  Submit</button>
	        </form>
        <hr>
        

			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Jenis Kursus</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($courses_lists as $cl => $courses_list)
						<tr>
							<td>{{$cl+1}}</td>
							<td>{{$courses_list->type}}</td>
							<td>
								<a type="button" href="{{ route('courseslists.edit',$courses_list->id) }}" class="btn btn-warning" ><i class="fa fa-edit"></i> Edit</a>
								<button type="button" class="btn btn-danger" onclick="destroy({{$courses_list->id}})"><i class="fa fa-trash"></i> Delete</button>

								<form id="delete{{$courses_list->id}}" action="{{ route('courseslists.destroy',$courses_list->id) }}" method="post">
									<input type="hidden" name="_method" value="delete">
									<input type="hidden" name="id" value="{{$courses_list->id}}">
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
                 
                    _method:"delete",
                    _token:"{{ csrf_token() }}"
                }

                $.post("courseslists/"+id,access)
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
// end ready
</script>
@endsection
