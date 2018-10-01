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
			<div class="form-group">
  			<div class="row">
          <form method='post' action="{{ route('memo.search') }}">
            @csrf
    				<div class="form-group">
                <label for="dari" class="col-md-1 control-label">Dari</label>

                  <div class="col-md-2">
                      <select class="form-control" required name="date_from" >
                  			<option value="">-Semua Bulan-</option>
                 				<option value="1">Januari</option>
                 				<option value="2">Febuari</option>
                 				<option value="3">Maret</option>
                 				<option value="4">April</option>
                 				<option value="5">Mei</option> 
                 				<option value="6">Juni</option> 
                 				<option value="7">Juli</option> 
                 				<option value="8">Agustus</option> 
                 				<option value="9">September</option> 
                 				<option value="10">Oktober</option> 
                 				<option value="11">November</option> 
                 				<option value="12">Desember</option>      
                				</select>

                  </div>
                        

                       
                  <label for="sampai" class="col-md-1 control-label">Sampai</label>

                    <div class="col-md-2">
                        <select class="form-control" required name='date_to' >
                    			<option value="">-Semua Bulan-</option>
                   				<option value="1">Januari</option>
                   				<option value="2">Febuari</option>
                   				<option value="3">Maret</option>
                   				<option value="4">April</option>
                   				<option value="5">Mei</option> 
                   				<option value="6">Juni</option> 
                   				<option value="7">Juli</option> 
                   				<option value="8">Agustus</option> 
                   				<option value="9">September</option> 
                   				<option value="10">Oktober</option> 
                   				<option value="11">November</option> 
                   				<option value="12">Desember</option>      
                  			</select>

                    </div>

                    <label for="item" class="col-md-1 control-label">Item</label>

                      <div class="col-md-2">
                          <select class="form-control" name="courses_list_id">
                              <option value="">-Semua Item-</option>
                              @foreach($item_lists as $item_list)
                              <option value="{{ $item_list->id }}">{{ $item_list->name }}</option>
                              @endforeach 
                          </select>

                      </div>
  			
            </div>
            <button type="submit" class="btn btn-info">Search</button>
          </form>
        </div>
			</div>

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
