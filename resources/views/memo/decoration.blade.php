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
              				<th>Keterangan</th>
              				<th>Action</th>
						</tr>

			            <tbody>
			                @foreach($items as $i => $item)
			                @php
							setlocale (LC_TIME, 'ID');
							$date = strftime( "%d %B %Y", strtotime($item->date));
							@endphp
			                <tr>
			                  <td>{{$i+1}}</td>
			                  <td>
			                  	<img src="{{asset('storage/'.$item->image)}}" width="100">
			                  </td>
			                  <td>{{$date}}</td>
			                  <td>{{$item->order->nama_pemesan}}</td>
			                  <td>{{$item->item_list->name}}</td>
			                  <td>{{$item->person}}</td>
			                  <td>{{$item->description}}</td>
			                  <td>
				                  	<span data-toggle="modal" data-target="#modalPrint" >
										<a type="button" class="btn btn-success " ><i class="fa fa-print"></i> Print</a>
									</span>
							</td>
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

	<!-- Modal -->
	@foreach($items as $index => $item)
<div id="modalPrint" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
        <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Print Preview</h4>
      </div>
      <div class="modal-body">
				<div id="printThis">
					<div class="text-center">
						<img src="{{asset('img/logo/logo.png')}}" />
						<h4>Wedding & Event Organizer</h4>
						<h5>Jl.Pandanaran 126.Ruko Masjid Baiturrahman,Simpang Lima ,Semarang. Telp (024) 8313313</h5>
					</div><hr>
					<table border="0">
						@php
						setlocale (LC_TIME, 'id_ID');
						$date = strftime( "%d %B %Y", strtotime($item->date));
						@endphp
						<tr>
							<td width="150px">Pemesan</td> <td width="1px"> : </td><td>{{$item->order->nama_pemesan}}</td>
						</tr>
						<tr>
							<td>Tanggal</td> <td> : </td><td>{{$date}}</td>
						</tr>
						<tr>
							<td>Penanggung Jawab</td> <td> : </td><td>{{$item->person}}</td>
						</tr>
						
					</table>
						<div id="printHari" style="padding-left:100px">

						</div>
					<hr>
					<table class="table table-bordered">
			      		<thead>
			      			<tr>
			      				<td>No.</td>
			      				<td>Item Pesanan</td>
			      				<td>Keterangan</td>
			      				<td>Gambar</td>
			      			</tr>
			      		</thead>
			      		<tbody>
			      			<tr>
			      				<td>{{$index+1}}</td>
			      				<td>{{$item->item_list->name}}</td>
			      				<td>{{$item->description}}</td>
			      				<td>
			      					<img src="{{asset('storage/'.$item->image)}}" width="100">
			      				</td>
			      			</tr>

			      		</tbody>
			      	</table>
			      	<hr>

			      	  	
					
				</div>
				{{-- end printthis --}}
				<button type="button" name="button" class="btn btn-info btn-block" onclick="print_now()">Print Now</button>
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

$("table").DataTable();

});

function print_now(id){
	$("#printThis").printThis();
}	


// end ready
</script>
@endsection
