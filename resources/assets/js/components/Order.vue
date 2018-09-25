<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            Order List
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th>Nama Pemesan</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Kota</th>
                            <th>CP</th>
                            <th>Tempat</th>
                            <th>Penyelenggara</th>
                            <th>Total Tamu</th>
                            <th>Jenis Jamuan</th>
                            <th>Tanggal Order</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data(){
            return {
                orders:[{}]
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            axios.get('/orders').then(result=>{
                console.log(result);
                $("#datatable").DataTable({
                    process:true,
                    data: result.data,
                    columns:[
                        {data:"nama_pemesan"},
                        {data:"email_pemesan"},
                        {data:"alamat_pemesan"},
                        {data:"kota_pemesan"},
                        {data:"cp_pemesan"},
                        {data:"pelaksanaan_acara"},
                        {data:"penyelenggara"},
                        {data:"total_tamu"},
                        {data:"jenis_jamuan"},
                        {data:"created_at"},
                        {data:(data,type,full)=>{
                            return "\
                            <button class='btn btn-default' data-toggle='modal' data-target='#modalBiodata' onclick='biodata("+data.id+")'><i class='fa fa-search' title='Lihat Biodata'></i></button>\
                            <button class='btn btn-default' data-toggle='modal' data-target='#modalItem' onclick='item("+data.id+")'><i class='fa fa-shopping-cart'></i></button>\
                            <button class='btn btn-default' data-toggle='modal' data-target='#modalAcara' onclick='acara("+data.id+")'><i class='fa fa-truck'></i></button>\
                            <button class='btn btn-default' data-toggle='modal' data-target='#myModal'><i class='fa fa-edit'></i></button>\
                            <button class='btn btn-default' onclick='destroy("+data.id+")' ><i class='fa fa-times'></i></button>\
                            \
                            "
                        }}
                    ]
                });
            }); 
        }
    }
</script>
