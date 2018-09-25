@extends('layouts.admin-horizontal')
@section('staff-active','class=menu-top-active')
@section('css')

@endsection
@section('content')
	<div class="container">
	<a href="{{url('admin/staff/create')}}"><button type="button" class="btn btn-success"><i class="fa fa-pencil-alt "></i> Insert new Staff</button></a><hr>

	<div class="panel panel-default">
		<div class="panel-heading">
			Staff List
		</div>
		{{-- end heading --}}
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $index => $ini)
						<tr>
							<th>{{$index+1}}</th>
							<th>{{$ini->name}}</th>
							<th>{{$ini->email}}</th>
							<th>{{$ini->content}}</th>
							<th>
								<button type="button" class="btn btn-warning" onclick="event.preventDefault();document.getElementById('edit{{$ini->id}}').submit();"><i class="fa fa-edit "></i> Edit</button>
								<button type="button" class="btn btn-danger" onclick="destroy({{$ini->id}})"><i class="fa fa-trash "></i>  Delete</button>
								<form id="edit{{$ini->id}}" action="{{url('admin/staff/edit')}}" method="post">
									<input type="hidden" name="id" value="{{$ini->id}}">
									{{csrf_field()}}
								</form>
								<form id="delete{{$ini->id}}" action="{{url('admin/staff/delete')}}" method="post">
									<input type="hidden" name="id" value="{{$ini->id}}">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
								</form>

							</th>
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
                    id:id,
                    _token:"{{ csrf_token() }}"
                }

                $.post("staff/delete",access)
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
