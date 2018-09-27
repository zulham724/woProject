<template>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Pesanan
					<button type="button" class="btn btn-info pull-right" @click="add()"><i class="fa fa-plus"></i> Add Item</button>
					<div id="removeItem" class="pull-right"></div>
				</div>
				<div class="panel-body">
					<div class="form-group" v-for="(item,a) in items">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<select class="form-control" :name="'items['+a+'][item_list_id]'">
										<option value="">--Pilih Barang--</option>
			               				<option  v-for="(itemlist,i) in itemlists" :value="itemlist.id">{{ itemlist.name }}
			               				</option>  
		             				</select>
								</div>

								<div class="form-group">

									<input type="number" :name="'items['+a+'][price]'" class="form-control" required v-model="item.price" placeholder="Harga">
									
								</div>

								<div class="form-group">
									<input type="date" :name="'items['+a+'][date]'" class="form-control" required v-model="item.date" placeholder="tanggal">
								</div>

								<div class="form-group">
									<input type="text" :name="'items['+a+'][person]'" class="form-control" required v-model="item.person" placeholder="Penanggung Jawab">
								</div>

								<div class="form-group">
									<h4><span class="label label-default" v-model="item.image">Gambar: </span></h4>
									<input type="file" :name="'items['+a+'][image]'" id="upload">
								</div>

								<div class="form-group">
									<textarea type="text" :name="'items['+a+'][description]'" required v-model="item.description" class="form-control" placeholder="Keterangan"></textarea>
								</div>	

								<div class="form-group">
									<!-- <button type="button" class="btn btn-danger" @click="remove(a)"><i class="fa fa-trash"></i>Hapus</button>  -->
									<button type="button" class="btn btn-danger btn-block" @click="remove(a)"><i class="fa fa-trash"></i> Hapus</button>
								</div>

							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
    	props:['edit_items'],
    	data() {
			return {
				items:[{}],
				itemlists:[{}],
				itemlist_selected:null
			}    		
    	},
    	created(){
    		this.edit_items ? this.items = this.edit_items : null;
    		this.read();
    	},
        mounted() {
            console.log('Item mounted.',this.items)
        },
        methods:{
        	add(){
        		console.log('uye');
        		this.items.push({});
        	},
        	remove(index){
        		console.log(this.items[index].item);
        		this.items.splice(index,1);
        	},
        	read(){
        		// console.log('read');
        		axios.get('/itemlists/').then(result=>{
        			console.log(result);
        			this.itemlists = result.data;
        		},err=>{
        			console.log(err);
        		});
        	}
        }
    }
</script>

