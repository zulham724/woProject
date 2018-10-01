@extends(Auth::user()->role_id == 1 ? 'layouts.admin-horizontal' : (Auth::user()->role_id == 2 ? 'layouts.operator-horizontal' : 'layouts.staff-horizontal'))
@section('schedule-active','class=menu-top-active')
@section('css')

@endsection
@section('content')
<div class="container">
	<div id="calendar"></div>
</div>
{{-- every modal placed here --}}
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pesanan Acara</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
        	<thead>
        		<tr>
        			<td>No.</td>
        			<td>Acara</td>
        			<td>Tanggal</td>
					<td>Jam</td>
        			<td>Tempat</td>
        		</tr>
        	</thead>
        	<tbody id="contentAcara">

        	</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function() {

    // page is now ready, initialize the calendar...
    if({!!$login!!}){
        swal("Hello :)","Anda telah Login","success");
    }
    const data=[];
    const schedule = {!! $schedule !!};
    const courses = {!! $courses !!};

    $.each(schedule,function(key,i){
    	data.push({
            title:'Pesanan '+this.nama_pemesan,
            start:this.tanggal,
            id:this.id,
            acara:this.nama_pemesan,
            tanggal:this.tanggal,
            jam:this.jam,
            tempat:this.tempat
        });
    });
    $.each(courses,(key,i)=>{
        data.push({
            title:'Kursus '+i.name,
            start:i.date,
            id:'a'+i.id,
            acara:i.name,
            tanggal:i.date,
            jam:'tidak ditentukan',
            tempat:i.place
        });
    });
    console.log("datanya",courses,schedule,data);
    $('#calendar').fullCalendar({
        lang:'id',
        events : data,
        eventClick:function(event){
        	if(event.id){
        		$("#contentAcara").html("");
        		$("#myModal").modal();
        		$("#content").text(event.id);
        		let selected = data.filter(function(i){
        			return i.id == event.id;
        		});
        		console.log(selected);
        		$.each(selected,function(key,i){
        			key+=1;
        			$("#contentAcara").append("\
        				<tr>\
							<td>"+key+"</td>\
							<td>"+this.acara+"</td>\
							<td>"+this.tanggal+"</td>\
							<td>"+this.jam+"</td>\
							<td>"+this.tempat+"</td>\
						</tr>\
        				");
        		});
        	}
        }
    });

});
</script>
@endsection
