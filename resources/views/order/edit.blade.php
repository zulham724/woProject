@extends(Auth::user()->role_id == 1 ? 'layouts.admin-horizontal' : (Auth::user()->role_id == 2 ? 'layouts.operator-horizontal' : 'layouts.staff-horizontal'));
@section('css')

@endsection
@section('content')
<div class="container">

	<a href="{{ route('orders.index')}}"><button type="button" class="btn btn-success" name="button">Back</button></a><hr>

	<div class="panel panel-default">
		<div class="panel-heading">
			Form Pemesanan
		</div>
		<div class="panel-body">
			<form class="form" action="{{ route('orders.update',$order->id) }}" enctype="multipart/form-data" method="post" files="true" id="orderForm">

				@method('put')
                {{ csrf_field() }}
			<div class="row">
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								Nota
							</div>
							<div class="panel-body">
								<div class="form-group">
									<span class="label label-default">Nama Pemesan: </span>
									<input type="text" name="order[nama_pemesan]" class="form-control" value="{{$order->nama_pemesan}}" placeholder="nama pemesan">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Email : </span></h4>
									<input type="text" name="order[email_pemesan]" value="{{$order->email_pemesan}}" class="form-control" placeholder="email">
								</div>
								<div class="form-group">
									<span class="label label-default">Alamat: </span>
									<input type="text" name="order[alamat_pemesan]" class="form-control" value="{{$order->alamat_pemesan}}" placeholder="alamat">
								</div>
								<div class="form-group">
									<span class="label label-default">Kota: </span>
									<input type="text" name="order[kota_pemesan]" class="form-control" value="{{$order->kota_pemesan}}" placeholder="kota">
								</div>
								<div class="form-group">
									<span class="label label-default">CP: </span>
									<input type="text" name="order[cp_pemesan]" class="form-control" value="{{$order->cp_pemesan}}" placeholder="contact person">
								</div>
								<div class="form-group">
									<span class="label label-default">Tempat: </span>
									<select class="form-control" name="order[pelaksanaan_acara]">
									    <option value="{{$order->pelaksanaan_acara}}">{{$order->pelaksanaan_acara}}</option>
										<option value="Rumah">Rumah</option>
										<option value="Rumah-Gedung">Rumah-Gedung</option>
										<option value="Gedung">Gedung</option>
									</select>
								</div>
								<div class="form-group">
									<span class="label label-default">Penyelenggara:</span>
									<select class="form-control" name="order[penyelenggara]">
										<option value="{{$order->penyelenggara}}">{{$order->penyelenggara}}</option>
										<option value="Pihak Putra">Pihak Putra</option>
										<option value="Pihak Putri">Pihak Putri</option>
										<option value="Gabungan">Gabungan</option>
									</select>
								</div>
								<div class="form-group">
									<span class="label label-default">Jumlah Tamu Undangan: </span>
									<input type="text" name="order[total_tamu]" class="form-control" value="{{$order->total_tamu}}" placeholder="nominal tamu undangan">
								</div>
								<div class="form-group">
									<span class="label label-default">Jenis Jamuan: </span>
									<input type="text" name="order[jenis_jamuan]" class="form-control" value="{{$order->jenis_jamuan}}" placeholder="jenis jamuan">
								</div>
								<div class="form-group">
									<span class="label label-default">DP: </span>
									<input type="text" name="order[dp]" value="{{$order->dp}}" placeholder="dp" class="form-control">
								</div>
								<div class="form-group">
								    
									<span class="label label-default">Upload: </span> 
									@if($order->file!=NULL)
									<img src="{{asset('storage/'$order->upload)}}" style="width:30px; height:30px;">
									@endif
									<input type="file" name="order[upload]" id="upload">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">

						<div class="panel panel-default">
							<div class="panel-heading">
								Biodata
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">

										<div class="form-group">
											<span class="label label-default">Nama Lengkap Pria: </span>
											<input type="text" name="biodata[nama_lengkap_pria]" class="form-control" value="{{$biodata->nama_lengkap_pria}}" placeholder="nama">
										</div>
										<div class="form-group">
											<span class="label label-default">Alamat Pria: </span>
											<input type="text" name="biodata[alamat_pria]" class="form-control" value="{{$biodata->alamat_pria}}" placeholder="alamat">
										</div>
										<div class="form-group">
											<span class="label label-default">CP Pria:</span>
											<input type="text" name="biodata[cp_pria]" class="form-control" value="{{$biodata->cp_pria}}" placeholder="contact person">
										</div>
										<div class="form-group">
											<span class="label label-default">Tempat Tanggal Lahir:</span>
											<input type="text" name="biodata[ttl_pria]" class="form-control" value="{{$biodata->ttl_pria}}" placeholder="tempat tanggal lahir">
										</div>
										<div class="form-group">
											<span class="label label-default">Agama Pria:</span>
											<input type="text" name="biodata[agama_pria]" class="form-control" value="{{$biodata->agama_pria}}" placeholder="agama">
										</div>
										<div class="form-group">
											<span class="label label-default">Pendidikan Pria</span>
											<input type="text" name="biodata[pendidikan_pria]" class="form-control" value="{{$biodata->pendidikan_pria}}" placeholder="pendidikan">
										</div>
										<div class="form-group">
											<span class="label label-default">Tinggi Badan Pria:</span>
											<input type="text" name="biodata[tinggi_badan_pria]" class="form-control" value="{{$biodata->tinggi_badan_pria}}" placeholder="tinggi badan">
										</div>
										<div class="form-group">
											<span class="label label-default">Berat Badan Pria:</span>
											<input type="text" name="biodata[berat_badan_pria]" class="form-control" value="{{$biodata->berat_badan_pria}}" placeholder="berat badan">
										</div>
										<div class="form-group">
											<span class="label label-default">Ayah:</span>
											<input type="text" name="biodata[ayah_pria]" class="form-control" value="{{$biodata->ayah_pria}}" placeholder="nama">
										</div>
										<div class="form-group">
											<span class="label label-default">CP Ayah:</span>
											<input type="text" name="biodata[cp_ayah_pria]" class="form-control" value="{{$biodata->cp_ayah_pria}}" placeholder="contact person">
										</div>
										<div class="form-group">
											<span class="label label-default">Ibu:</span>
											<input type="text" name="biodata[ibu_pria]" class="form-control" value="{{$biodata->ibu_pria}}" placeholder="nama">
										</div>
										<div class="form-group">
											<span class="label label-default">CP Ibu:</span>
											<input type="text" name="biodata[cp_ibu_pria]" class="form-control" value="{{$biodata->cp_ibu_pria}}" placeholder="contact person">
										</div>
										<div class="form-group">
											<span class="label label-default">Nama Kakak:</span>
											<input type="text" name="biodata[nama_kakak_pria]" class="form-control" id="tokenfield" data-role="tagsinput" value="{{$biodata->kakak_pria}}" placeholder="nama">
										</div>
										<div class="form-group">
											<span class="label label-default">Nama Adik:</span>
											<input type="text" name="biodata[nama_adik_pria]" class="form-control" id="tokenfield" data-role="tagsinput" value="{{$biodata->adik_pria}}" placeholder="nama">
										</div>

									</div>
									<div class="col-md-6">

										<div class="form-group">
											<span class="label label-default">Nama Lengkap wanita: </span>
											<input type="text" name="biodata[nama_lengkap_wanita]" class="form-control" value="{{$biodata->nama_lengkap_wanita}}" placeholder="nama">
										</div>
										<div class="form-group">
											<span class="label label-default">Alamat wanita: </span>
											<input type="text" name="biodata[alamat_wanita]" class="form-control" value="{{$biodata->alamat_wanita}}" placeholder="alamat">
										</div>
										<div class="form-group">
											<span class="label label-default">CP wanita:</span>
											<input type="text" name="biodata[cp_wanita]" class="form-control" value="{{$biodata->cp_wanita}}" placeholder="contact person">
										</div>
										<div class="form-group">
											<span class="label label-default">Tempat Tanggal Lahir:</span>
											<input type="text" name="biodata[ttl_wanita]" class="form-control" value="{{$biodata->ttl_wanita}}" placeholder="tempat tanggal lahir">
										</div>
										<div class="form-group">
											<span class="label label-default">Agama wanita:</span>
											<input type="text" name="biodata[agama_wanita]" class="form-control" value="{{$biodata->agama_wanita}}" placeholder="agama">
										</div>
										<div class="form-group">
											<span class="label label-default">Pendidikan wanita</span>
											<input type="text" name="biodata[pendidikan_wanita]" class="form-control" value="{{$biodata->pendidikan_wanita}}" placeholder="pendidikan">
										</div>
										<div class="form-group">
											<span class="label label-default">Tinggi Badan wanita:</span>
											<input type="text" name="biodata[tinggi_badan_wanita]" class="form-control" value="{{$biodata->tinggi_badan_wanita}}" placeholder="tinggi badan">
										</div>
										<div class="form-group">
											<span class="label label-default">Berat Badan wanita:</span>
											<input type="text" name="biodata[berat_badan_wanita]" class="form-control" value="{{$biodata->berat_badan_wanita}}" placeholder="berat badan">
										</div>
										<div class="form-group">
											<span class="label label-default">Ayah:</span>
											<input type="text" name="biodata[ayah_wanita]" class="form-control" value="{{$biodata->ayah_wanita}}" placeholder="nama">
										</div>
										<div class="form-group">
											<span class="label label-default">CP Ayah:</span>
											<input type="text" name="biodata[cp_ayah_wanita]" class="form-control" value="{{$biodata->cp_ayah_wanita}}" placeholder="contact person">
										</div>
										<div class="form-group">
											<span class="label label-default">Ibu:</span>
											<input type="text" name="biodata[ibu_wanita]" class="form-control" value="{{$biodata->jenis_jamuan}}" placeholder="nama">
										</div>
										<div class="form-group">
											<span class="label label-default">CP Ibu:</span>
											<input type="text" name="biodata[cp_ibu_wanita]" class="form-control" value="{{$biodata->cp_ibu_wanita}}" placeholder="contact person">
										</div>
										<div class="form-group">
											<span class="label label-default">Nama Kakak:</span>
											<input type="text" name="biodata[nama_kakak_wanita]" class="form-control" id="tokenfield" data-role="tagsinput" value="{{$biodata->kakak_wanita}}" placeholder="nama">
										</div>
										<div class="form-group">
											<span class="label label-default">Nama Adik:</span>
											<input type="text" name="biodata[nama_adik_wanita]" class="form-control" id="tokenfield" data-role="tagsinput" placeholder="nama" value="{{$biodata->adik_wanita}}">
										</div>


									</div>
								</div>
								{{-- end row --}}
							</div>
						</div>

					</div>
				{{-- end form --}}
			</div>
			{{-- end row --}}

			<div class="row">
				<div class="col-md-6">
					
					<item v-bind:edit_items="{{$order->items}}"></item>
							
				</div>
				<div class="col-md-6">
					
					<acara v-bind:edit_acaras="{{$order->acaras}}"></acara>
							
				</div>
			</div>
			{{-- end row --}}

      <input type="hidden" name="order[id]" value="{{$order->id}}">
			<input type="hidden" name="totalItem" id="totalItem" value="{{$totalItem}}">
			<input type="hidden" name="totalAcara" id="totalAcara" value="{{$totalAcara}}">
			{{csrf_field()}}
			<button type="submit" class="btn btn-success center-block btn-block">Submit</button>
			</form>
		</div>
	</div>
	{{-- end main panel --}}

</div>
{{-- end container --}}
@endsection
@section('script')
<script type="text/javascript">

$(document).ready(function(){
	$('#tokenfield').tagsinput('items');
});

</script>

@endsection
