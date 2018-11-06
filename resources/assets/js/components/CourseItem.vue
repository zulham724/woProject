<template>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambahan
                    <button type="button" class="btn btn-info pull-right" @click="add()"><i class="fa fa-plus"></i> Add Item</button>
                </div>

                <div class="panel-body">
                    <div v-for="(course_item,ci) in course_items">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Tulis sesuatu" :name="'course_items['+ci+'][name]'" v-model="course_item.name" required>
                                </div>
                                <div class="form-group">
                                     <label>Harga</label>
                                     <input type="number" class="form-control" placeholder="Tulis sesuatu" :name="'course_items['+ci+'][price]'" v-model="course_item.price" required>
                                </div>
                                <div class="form-group">
                                    <!-- <button type="button" class="btn btn-danger" @click="remove(a)"><i class="fa fa-trash"></i>Hapus</button>  -->
                                    <button type="button" class="btn btn-danger btn-block" @click="remove(ci)"><i class="fa fa-trash"></i> Hapus</button>
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
        props:["edit_course_items"],
        data(){
            return{
                course_items:[{}]
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.edit_course_items ? this.course_items = this.edit_course_items : null;
        },
        methods:{
            add(){
                this.course_items.push({});
            },
            remove(index){
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
                        this.course_items.splice(index,1);
                    }
                });
            }
        }
    }
</script>
