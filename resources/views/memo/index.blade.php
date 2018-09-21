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
  				<div class="form-group">
                       <label for="dari" class="col-md-1 control-label">Dari</label>

                          <div class="col-md-2">
                              <select class="form-control" ng-model="#" ng-required="true" >
                          			<option value="">-Semua Bulan-</option>
                         				<option value="">Januari</option>
                         				<option value="">Febuari</option>
                         				<option value="">Maret</option>
                         				<option value="">April</option>
                         				<option value="">Mei</option> 
                         				<option value="">Juni</option> 
                         				<option value="">Juli</option> 
                         				<option value="">Agustus</option> 
                         				<option value="">September</option> 
                         				<option value="">Oktober</option> 
                         				<option value="">November</option> 
                         				<option value="">Desember</option>      
                       				</select>

                          </div>
                      

                     
                       <label for="sampai" class="col-md-1 control-label">Sampai</label>

                          <div class="col-md-2">
                              <select class="form-control" ng-model="#" ng-required="true" >
                          			<option value="">-Semua Bulan-</option>
                         				<option value="">Januari</option>
                         				<option value="">Febuari</option>
                         				<option value="">Maret</option>
                         				<option value="">April</option>
                         				<option value="">Mei</option> 
                         				<option value="">Juni</option> 
                         				<option value="">Juli</option> 
                         				<option value="">Agustus</option> 
                         				<option value="">September</option> 
                         				<option value="">Oktober</option> 
                         				<option value="">November</option> 
                         				<option value="">Desember</option>      
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
        </div>
			</div>

			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Pemesan</th>
							<th>Item Pesanan</th>
						</tr>

            <tbody>
                @foreach($items as $i => $item)
                <tr>
                  <td>{{$i+1}}</td>
                  <td>{{$item->order->nama_pemesan}}</td>
                  <td>{{$item->item_list->name}}</td>
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
