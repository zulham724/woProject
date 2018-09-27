@extends(Auth::user()->role_id == 1 ? 'layouts.admin-horizontal' : (Auth::user()->role_id == 2 ? 'layouts.operator-horizontal' : 'layouts.staff-horizontal'));
@section('memo-active','class=menu-top-active')
@section('css')

@endsection
@section('content')
	<div class="container">
	<a href="{{ route('orders.index') }}"><button type="button" class="btn btn-success">Back</button></a><hr>
	<div class="panel panel-default">
		<div class="panel-heading">
			Request & Memo
		</div>
		{{-- end heading --}}
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Image</th>
							<th>Tanggal</th>
            				<th>Nama Pemesan</th>
							<th>Item Pesanan</th>
              				<th>Penanggung Jawab</th>
						</tr>

			            <tbody>
			                @foreach($items as $i => $item)
			                <tr>
			                  <td>{{$i+1}}</td>
			                  <td>
			                  	<img src="{{asset('storage/'.$item->image)}}" width="100">
			                  </td>
			                  <td>{{$item->date}}</td>
			                  <td>{{$item->order->nama_pemesan}}</td>
			                  <td>{{$item->item_list->name}}</td>
			                  <td>{{$item->person}}</td>
			                </tr>
			                @endforeach
			            </tbody>
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
