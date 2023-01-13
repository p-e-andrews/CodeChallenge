<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"processAdd"}' class="btn btn-primary">Create</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>process</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Code</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody v-if="processes.length > 0">
                                <tr v-for="(process,key) in processes" :key="key">
                                    <td>{{ process.id }}</td>
                                    <td>{{ process.name }}</td>
                                    <td>{{ process.description }}</td>
                                    <td>{{ process.code }}</td>
                                    <td>{{ process.status }}</td>
                                    <td>
                                        <router-link :to='{ name:"processEdit" , params:{ id:process.id } }' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteprocess(process.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No processes Found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:"processes",
    data(){
        return{
            processes:[]
        }
    },
    mounted(){
        this.getprocesses()
    },
    methods:{
        async getprocesses(){
            await this.axios.get('/api/process').then(response=>{
                this.processes = response.data
            }).catch(error=>{
                console.log(error)
                this.processes = []
            })
        },
        deleteprocess(id){
            if(confirm("Are you sure to delete this process ?")){
                this.axios.delete('/api/process/'+id).then(response=>{
                    this.getprocesses()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>