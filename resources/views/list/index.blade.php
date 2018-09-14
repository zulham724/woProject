@extends('layouts.admin-horizontal')
<!-- @section('order-active','class=menu-top-active') -->
@section('css')

@endsection
@section('content')
	<div class="container">
	<!-- <a href="{{url('admin/staff/create')}}"><button type="button" class="btn btn-success">Back</button></a> -->

	<div class="panel panel-default">
		<div class="panel-heading">
			Input Orderan List
		</div>
		{{-- end heading --}}
	
		<div class="panel-body">

		<div class="form-group">
                <span class="label label-default">Nama Order List </span>
                <input type="text" name="order_list" id="order_list" class="form-control" >
        </div>
        <div class="form-group">
                <span class="label label-default">Harga </span>
                <input type="number" name="order_list" id="order_list" class="form-control" >
        </div>
        <button type="submit" class="btn btn-success center-block btn-block">Submit</button>
        <hr>
        

			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama List Order</th>
							<th>Nama List Order</th>
							<th>Action</th>
						</tr>
					</thead>
					
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
