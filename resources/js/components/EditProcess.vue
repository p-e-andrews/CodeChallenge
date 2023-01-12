<template>
    <div>
        <h3 class="text-center">Edit Process</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateProcess">
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
                    <button type="submit" class="btn btn-primary">Update</button>
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
        created() {
            this.axios
                .get(`http://localhost:8000/api/processes/${this.$route.params.id}`)
                .then((res) => {
                    this.process = res.data;
                });
        },
        methods: {
            updateProcess() {
                this.axios
                    .patch(`http://localhost:8000/api/processes/${this.$route.params.id}`, this.process)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>