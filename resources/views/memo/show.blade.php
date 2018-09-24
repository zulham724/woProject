@extends('layouts.admin-horizontal')
@section('memo-active','class=menu-top-active')
@section('css')

@endsection
@section('content')
	<div class="container">
	
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
							<th>Tanggal</th>
              <th>Nama Pemesan</th>
							<th>Item Pesanan</th>
              <th>Penanggung Jawab</th>
						</tr>

            <tbody>
                @foreach($items as $i => $item)
                <tr>
                  <td>{{$i+1}}</td>
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
