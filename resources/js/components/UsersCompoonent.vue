<template>
    <div>
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Users</h1>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 mb-2">
                            <button type="button" class="btn btn-sm btn-primary" @click="addUser">
                                Add User
                            </button>
                        </div>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr v-for="user in users" :key="user.id">
                                <td>{{user.id}}</td>
                                <td>{{user.name}}</td>
                                <td>{{user.email}}</td>
                                <td>{{user.email}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addUser">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent="submitUser">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input v-model="name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input v-model="email" type="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input v-model="password" type="password" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-sm btn-warning" @click="closeModal">
                                Not Now
                            </button>
                            <button type="submit" class="btn btn-sm btn-success">
                                Add User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                users:[],
                email:'',
                password:'',
                name:''
            }
        },
        created() {
            this.getUsers()
        },
        methods:{
            addUser(){
                $('#addUser').modal('show');
            },
            closeModal()
            {
                $('#addUser').modal('hide');
            },
            getUsers(){
                axios.get('api/users')
                    .then((response)=>{
                        this.users = response.data
                    })
                    .catch((error)=>{
                        console.log(error)
                    })
            },
            submitUser(){
                if (this.name ===''||this.email ===""||this.password ==="")
                {
                    alert('All Fields are Required');
                }
                else{
                    fetch(`api/store`,{
                        method:'post',
                        body:JSON.stringify({
                            "name":this.name,"email":this.email,"password":this.password
                        }),
                        headers:{
                            'Accept':'application/json',
                            'Content-Type':'application/json',
                            'X-CSRF-Token':$('meta[name=csrf-token]').attr('content')
                        }
                    })
                        .then(response=>response.json())
                        .then(response=>{
                            if(response.errors){
                                this.anyError = true;
                                this.errors = response.errors;
                            }
                            if (response.status === 0){
                                $('#addUser').modal('hide')
                                this.getUsers();
                                alert('User Has Been Added');
                            }
                        })
                }
            }
        }
    }
</script>
