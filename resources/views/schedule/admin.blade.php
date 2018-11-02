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
    const courses = {!! $courses !!};
    const acaras = {!! $acaras !!};
    const items = {!! $items !!};

    console.log(courses,acaras,items);

    $.each(courses,(key,i)=>{
        data.push({
            title:'Kursus '+i.name,
            start:i.date,
            id:'c'+i.id,
            acara:i.name,
            tanggal:i.date,
            jam:i.time,
            tempat:i.place
        });
    });

    $.each(acaras,(index,a)=>{
        data.push({
            title:'Acara '+a.order.nama_pemesan,
            start:a.tanggal,
            id:'a'+a.id,
            acara:a.acara,
            tanggal:a.tanggal,
            jam:a.jam,
            tempat:a.tempat
        });
    });

    // $.each(items,(index,i)=>{
    //     data.push({
    //         title:'Pesanan '+i.order.nama_pemesan,
    //         start:i.date,
    //         id:'i'+i.id,
    //         acara:i.person+' mengerjakan '+i.item_list.name,
    //         tanggal:i.date,
    //         jam:i.time,
    //         tempat:i.place
    //     });
    // });

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
							<td>"+new Date(this.tanggal).toLocaleString('id-ID',{ weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })+"</td>\
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
