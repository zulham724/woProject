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

					<form method="POST" action="{{ route('itemlist.store') }}" >
						@csrf
						<div class="form-group">
				                <span class="label label-default">Nama Order List </span>
				                <input type="text" name="name" id="name" class="form-control" >
						</div>


						{{-- <div class="form-group">
							<span class="label label-default">Harga </span>
				            <input type="number" name="price" id="price" class="form-control" >
				        </div> --}}

				        <button type="submit" class="btn btn-success center-block btn-block">Submit</button>

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
										<a type="button" href="{{ route('itemlist.edit',$item_list->id) }}" class="btn btn-warning" >Edit</a>
										<button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete{{$item_list->id}}').submit();">Delete</button>
										<form id="delete{{$item_list->id}}" action="{{ route('itemlist.destroy',$item_list->id) }}" method="post">
											<input type="hidden" name="_method" value="delete">
											<input type="hidden" name="id" value="{{$item_list->id}}">
											<input type="hidden" name="_token" value="{{csrf_token()}}">
										</form>
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
</script>
@endsection
