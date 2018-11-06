@extends(Auth::user()->role_id == 1 ? 'layouts.admin-horizontal' : (Auth::user()->role_id == 2 ? 'layouts.operator-horizontal' : 'layouts.staff-horizontal'));
@section('pembayaran-active','class=menu-top-active')
@section('css')

@endsection
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">

        <div class="panel panel-default">
          <div class="panel-heading">
            Pembayaran Angsuran
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table id="table" class="table table-bordered">
                <thead>
                  <tr>
                    <td>No</td>
                    <td>Nama Pemesan</td>
                    <td>Nama Sertifikat</td>
                    <td>Action</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($courses as $c => $course)
                    <tr>
                      <td>{{ $c+1 }}</td>
                      <td>{{ $course->name }}</td>
                      <td>{{ $course->certificate_name }}</td>
                      <td>
                        <button type="button" class="btn btn-warning" name="button" onclick="store({{$course->id}})"><i class="fa fa-tag"></i> Choose</button>
                        <button type="button" class="btn btn-info" name="button" onclick="edit({{$course->id}})"><i class="fa fa-edit"></i> Edit</button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
  {{-- end container --}}

  @foreach ($courses as $c => $course)
    {{-- every modal placed here --}}
    <!-- Modal -->
    <div id="modalUpdate{{ $course->id }}" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <h1 id="test"></h1>
            <div class="panel panel-default">
              <div class="panel-heading">
                Form Edit Pembayaran
              </div>
              <div class="panel-body">
                <form class="form" id="#myForm" action="{{ route('coursepayments.update',$course->id) }}" method="POST">
                  @method('put')
                  @csrf
                  @foreach ($course['course_payments'] as $cp => $course_payment)
                    <div class="form-group">
                      <label>Angsuran {{ $cp+1 }}</label>
                      <input type="number" name="" disabled class="form-control" value="{{ $course_payment->price }}">
                      <button type="button" onclick="destroy({{ $course_payment->id }})" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Hapus</button>
                    </div>
                  @endforeach
                  <div class="form-group">
                    <label>Total</label>
                    <input type="number" disabled name="" class="form-control" value="{{ $course->sum_course_payments_price }}">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

    <!-- Modal -->
    <div id="modalStore{{ $course->id }}" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <h1 id="test"></h1>
            <div class="panel panel-default">
              <div class="panel-heading">
                Form Edit Pembayaran
              </div>
              <div class="panel-body">
                <form class="form" id="#myForm" action="{{ route('coursepayments.store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="course_id" value="{{ $course->id }}">
                  <div class="form-group">
                    <label>Nominal Angsuran</label>
                    <input type="number" name="price" class="form-control" placeholder="Tulis sesuatu" value="0">
                  </div>
                  <button type="submit" class="btn btn-success btn-block">Submit</button>
                </form>
              </div>
            </div>
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

  });

  function edit(id){
    $("#modalUpdate"+id).modal();
  }

  function store(id){
    $("#modalStore"+id).modal();
  }

  function destroy(id){
    swal({
        type:"warning",
        title:"Apakah anda yakin ?",
        text:"",
        showCancelButton:true,
        cancelButtonColor:"#d33",
        confirmButtonText:"Ya",
        confirmButtonColor:"#3085d6"
    }).then(result=>{
        if(result.value){
            let access = {
                _token:"{{ csrf_token() }}",
                _method:"DELETE"
            }

            $.post("/coursepayments/"+id,access)
            .done(res=>{
                swal({
                    title:"Ok!",
                    text:"Data berhasil dihapus!",
                    type:"success"
                }).then(result=>{
                    window.location.reload();
                });
            })
            .fail(err=>{
                 console.log(err);
            });
        }
    });
}

</script>
@endsection
