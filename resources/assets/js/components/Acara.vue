<template>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Acara
					<button type="button" class="btn btn-info pull-right" @click="add()"><i class="fa fa-plus"></i> Add Acara</button>
					<div id="removeAcara" class="pull-right"></div>
				</div>
				<div class="panel-body">
					<div v-for="(acara,a) in acaras">
						<div class="form-group">
								<input type="text" :name="'acaras['+a+'][acara]'" class="form-control" v-model="acara.acara" required placeholder="Acara Pelaksanaan">
						</div>
						<div class="form-group">
							<input type="date" :name="'acaras['+a+'][tanggal]'"
								class="datepicker form-control" v-model="acara.tanggal" required placeholder="Tanggal" id="tanggal">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" :name="'acaras['+a+'][jam]'" required placeholder="Jam" v-model="acara.jam">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" :name="'acaras['+a+'][tempat]'" required placeholder="Tempat" v-model="acara.tempat">
						</div>
						<div class="form-group">
							<button type="button" class="btn btn-danger btn-block" @click="remove(a)"><i class="fa fa-trash"></i> Hapus</button>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
    	props:['edit_acaras'],
    	data() {
			return {
				acaras:[{}]
			}    		
    	},
    	created(){
    		this.edit_acaras ? this.acaras = this.edit_acaras : null;
    	},
        mounted() {
            console.log('Acara mounted.',this.acaras)
        },
        methods:{
        	add(){
        		console.log('uye');
        		this.acaras.push({});
        	},
        	remove(index){
        		console.log(this.acaras[index].acara);
        		this.acaras.splice(index,1);
        	}
        }
    }
</script>