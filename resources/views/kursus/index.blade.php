@extends('layouts.admin-horizontal')
@section('css')

@endsection
@section('content')
	<div class="container">
	<a href="{{url('admin/kursus/create')}}"><button type="button" class="btn btn-success">Input Peserta Kursus</button></a><hr>

	<div class="panel panel-default">
		<div class="panel-heading">
			Data Peserta Kursus
		</div>
		{{-- end heading --}}
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>
								<select class="form-control" ng-model="anggaranBaru.lembaga_id" ng-required="true">
                					<option value="">Keseluruhan</option>
               						<option ng-repeat="#" ng-value="#">#</option>  
             					</select>
             				</th>
							<th>No.</th>
							<th>Nama Pemesan</th>
							<th>Nama Sertifikat</th>
							<th>Waktu Kursus</th>
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
