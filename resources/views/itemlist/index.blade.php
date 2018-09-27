@extends('layouts.admin-horizontal')
<!-- @section('order-active','class=menu-top-active') -->
@section('css')

@endsection
@section('content')
	<div class="container">

			<div class="panel panel-default">
				<div class="panel-heading">
					Input Orderan List
				</div>
				{{-- end heading --}}
			
				<div class="panel-body">

					<form method="POST" action="{{ route('itemlists.store') }}" >
						@csrf
						<div class="form-group">
				                <span class="label label-default">Nama Order List </span>
				                <input type="text" name="name" id="name" class="form-control" >
						</div>


						{{-- <div class="form-group">
							<span class="label label-default">Harga </span>
				            <input type="number" name="price" id="price" class="form-control" >
				        </div> --}}

				        <button type="submit" class="btn btn-success center-block btn-block"><i class="fa fa-save"></i> Submit</button>

			    	</form>
		       
		        	<hr>
		        

					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama List Order</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($item_lists as $cl => $item_list)
								<tr>
									<td>{{$cl+1}}</td>
									<td>{{$item_list->name}}</td>
									<td>
										<a type="button" href="{{ route('itemlists.edit',$item_list->id) }}" class="btn btn-warning" ><i class="fa fa-edit"></i> Edit</a>
										@if($item_list->id != 1 && $item_list->id != 2)
										<button type="button" class="btn btn-danger" onclick="destroy({{$item_list->id}})"><i class="fa fa-trash"></i> Delete</button>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
							
						</table>		
					</div>
				</div>
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

                $.post("itemlists/"+id,access)
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
</script>
@endsection
