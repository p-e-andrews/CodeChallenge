<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Process</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="process.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" v-model="process.description">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" class="form-control" v-model="process.code">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control" v-model="process.status">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    name:"update-process",
    data(){
        return{
            process:{
                name:"",
                description:"",
                code:"",
                status:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showProcess()
    },
    methods:{
        async showProcess(){
            await this.axios.get('/api/process/'+this.$route.params.id).then(response=>{
                const { name, description, code, status} = response.data
                this.process.name = name
                this.process.description = description
                this.process.code = code
                this.process.status = status
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post('/api/process/'+this.$route.params.id, this.process).then(response=>{
                this.$router.push({name:"processList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>