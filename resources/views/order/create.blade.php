@extends(Auth::user()->role_id == 1 ? 'layouts.admin-horizontal' : (Auth::user()->role_id == 2 ? 'layouts.operator-horizontal' : 'layouts.staff-horizontal'))
@section('order-active','class=menu-top-active')
@section('css')

@endsection
@section('content')
<div class="container-fluid">

	<a href="{{ route('orders.index') }}"><button type="button" class="btn btn-success" name="button"><i class="fa fa-arrow-left"></i> Back</button></a><hr>

	<div class="panel panel-default">
		<div class="panel-heading">
			Form Pemesanan
		</div>
		<div class="panel-body">
			<form class="form" action="{{ route('orders.store') }}" enctype="multipart/form-data" method="post" files="true" id="orderForm">
			<div class="row">
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								Nota
							</div>
							<div class="panel-body">
								<div class="form-group">
									<h4><span class="label label-default">Nama Pemesan: </span></h4>
									<input type="text"  name="order[nama_pemesan]" class="form-control" placeholder="nama pemesan">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Email : </span></h4>
									<input type="text"  name="order[email_pemesan]" class="form-control" placeholder="email">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Alamat: </span></h4>
									<input type="text"  name="order[alamat_pemesan]" class="form-control" placeholder="alamat">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Kota: </span></h4>
									<input type="text"  name="order[kota_pemesan]" class="form-control" placeholder="kota">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">CP: </span></h4>
									<input type="text"  name="order[cp_pemesan]" class="form-control" placeholder="contact person">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Tempat: </span></h4>
									<select  class="form-control" name="order[pelaksanaan_acara]">
										<option value="Rumah">Rumah</option>
										<option value="Rumah-Gedung">Rumah-Gedung</option>
										<option value="Gedung">Gedung</option>
									</select>
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Penyelenggara:</span></h4>
									<select  class="form-control" name="order[penyelenggara]">
										<option value="Pihak Putra">Pihak Putra</option>
										<option value="Pihak Putri">Pihak Putri</option>
										<option value="Gabungan">Gabungan</option>
									</select>
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Jumlah Tamu Undangan: </span></h4>
									<input type="text"  name="order[total_tamu]" class="form-control" placeholder="nominal tamu undangan">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Jenis Jamuan: </span></h4>
									<input type="text"  name="order[jenis_jamuan]" class="form-control" placeholder="jenis jamuan">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">DP: </span></h4>
									<input type="text"  name="order[dp]" id="dp" class="form-control" placeholder="dp">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Upload: </span></h4>
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
											<h4><span class="label label-default">Nama Lengkap Pria: </span></h4>
											<input type="text"  name="biodata[nama_lengkap_pria]" class="form-control" placeholder="nama lengkap">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Alamat Pria: </span></h4>
											<input type="text"  name="biodata[alamat_pria]" class="form-control" placeholder="alamat">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">CP Pria:</span></h4>
											<input type="text"  name="biodata[cp_pria]" class="form-control" placeholder="contact person">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Tempat Tanggal Lahir:</span></h4>
											<input type="text"  name="biodata[ttl_pria]" class="form-control" placeholder="tempat tanggal lahir">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Agama Pria:</span></h4>
											<input type="text"  name="biodata[agama_pria]" class="form-control" placeholder="agama">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Pendidikan Pria</span></h4>
											<input type="text"  name="biodata[pendidikan_pria]" class="form-control" placeholder="pendidikan">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Tinggi Badan Pria:</span></h4>
											<input type="text"  name="biodata[tinggi_badan_pria]" class="form-control" placeholder="tinggi badan">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Berat Badan Pria:</span></h4>
											<input type="text"  name="biodata[berat_badan_pria]" class="form-control" placeholder="berat badan">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Ayah:</span></h4>
											<input type="text"  name="biodata[ayah_pria]" class="form-control" placeholder="nama">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">CP Ayah:</span></h4>
											<input type="text"  name="biodata[cp_ayah_pria]" class="form-control" placeholder="contact person">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Ibu:</span></h4>
											<input type="text"  name="biodata[ibu_pria]" class="form-control" placeholder="nama">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">CP Ibu:</span></h4>
											<input type="text"  name="biodata[cp_ibu_pria]" class="form-control" placeholder="contact person">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Nama Kakak:</span></h4>
											<input type="text" name="biodata[kakak_pria]" class="form-control" id="tokenfield" data-role="tagsinput" placeholder="nama">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Nama Adik:</span></h4>
											<input type="text" name="biodata[adik_pria]" class="form-control" id="tokenfield" data-role="tagsinput" placeholder="nama">
										</div>

									</div>
									<div class="col-md-6">

										<div class="form-group">
											<h4><span class="label label-default">Nama Lengkap wanita: </span></h4>
											<input type="text"  name="biodata[nama_lengkap_wanita]" class="form-control" placeholder="nama">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Alamat wanita: </span></h4>
											<input type="text"  name="biodata[alamat_wanita]" class="form-control" placeholder="alamat">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">CP wanita:</span></h4>
											<input type="text"  name="biodata[cp_wanita]" class="form-control" placeholder="contact person">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Tempat Tanggal Lahir:</span></h4>
											<input type="text"  name="biodata[ttl_wanita]" class="form-control" placeholder="tempat tanggal lahir">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Agama wanita:</span></h4>
											<input type="text"  name="biodata[agama_wanita]" class="form-control" placeholder="agama">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Pendidikan wanita</span></h4>
											<input type="text"  name="biodata[pendidikan_wanita]" class="form-control" placeholder="pendidikan">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Tinggi Badan wanita:</span></h4>
											<input type="text"  name="biodata[tinggi_badan_wanita]" class="form-control" placeholder="tinggi badan">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Berat Badan wanita:</span></h4>
											<input type="text"  name="biodata[berat_badan_wanita]" class="form-control" placeholder="berat badan">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Ayah:</span></h4>
											<input type="text"  name="biodata[ayah_wanita]" class="form-control" placeholder="nama">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">CP Ayah:</span></h4>
											<input type="text"  name="biodata[cp_ayah_wanita]" class="form-control" placeholder="contact person">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Ibu:</span></h4>
											<input type="text"  name="biodata[ibu_wanita]" class="form-control" placeholder="nama">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">CP Ibu:</span></h4>
											<input type="text"  name="biodata[cp_ibu_wanita]" class="form-control" placeholder="contact person">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Nama Kakak:</span></h4>
											<input type="text" name="biodata[kakak_wanita]" class="form-control" id="tokenfield" data-role="tagsinput" placeholder="nama">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Nama Adik:</span></h4>
											<input type="text" name="biodata[adik_wanita]" class="form-control" id="tokenfield" data-role="tagsinput" placeholder="nama">
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
				<div class="col-md-5">
					
					<item></item>
							
				</div>
				<div class="col-md-7">
					
					<acara></acara>
							
				</div>
			</div>
					{{-- end row --}}
			@csrf
			<button type="submit" class="btn btn-success center-block btn-block" style="border-radius:24px"><i class="fa fa-save"></i> SUBMIT</button>
			</form>
		</div>
				
	</div>
	{{-- end main panel --}}

</div>
{{-- end container --}}
@endsection
@section('script')
<script type="text/javascript">

</script>
@endsection
