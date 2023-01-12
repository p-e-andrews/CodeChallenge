<template>
    <div>
        <h2 class="text-center">Process List</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>UUID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Code</th>
                <th>Status</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="process in processes" :key="process.id">
                <td>{{ process.id }}</td>
                <td>{{ process.name }}</td>
                <td>{{ process.description }}</td>
                <td>{{ process.code }}</td>
                <td>{{ process.status }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: process.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteProcess(process.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                processes: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/processes/')
                .then(response => {
                    this.processes = response.data;
                });
        },
        methods: {
            deleteProcess(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/processes/${id}`)
                    .then(response => {
                        let i = this.processes.map(data => data.id).indexOf(id);
                        this.processes.splice(i, 1)
                    });
            }
        }
    }
</script>