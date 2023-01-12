<template>
    <div>
        <h3 class="text-center">Create Process</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addProcess">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="process.name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="process.description">
                    </div>
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" class="form-control" v-model="process.code">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" v-model="process.status">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                process: {}
            }
        },
        methods: {
            addProcess() {
                this.axios
                    .post('http://localhost:8000/api/processes', this.process)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>