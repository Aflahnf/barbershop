<template>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        MAIN MENU
                        <hr>
                        <ul class="list-group">
                            <router-link :to="{name: 'order'}"
                                class="list-group-item text-dark text-decoration-none">ORDER</router-link>
                            <router-link :to="{name: 'list'}"
                                class="list-group-item text-dark text-decoration-none">ORDER LIST</router-link>    
                            <li @click.prevent="logout" class="list-group-item text-dark text-decoration-none"
                                style="cursor:pointer">LOGOUT</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        




                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">id</th>
                                  <th scope="col">Date and Time</th>
                                  <th scope="col">Service</th>
                                  <th scope="col">Hairstylist</th>
                                  <th scope="col">User</th>
                                  <th scope="col">Booking Status</th>
                                  <th scope="col"></th>
                                  <th scope="col"></th>
                                </tr>
                              </thead>
                              <tbody>

                                    <tr>
                                      <th scope="row"></th>
                                      <td> </td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                       <td></td>
                                      <td>
                                        <form>
                                            <button type="submit">Edit</button>
                                        </form>
                                      </td>
                                      <td>
                                        <form>
                                            <button type="submit">Delete</button>
                                        </form>
                                      </td>
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
import { onMounted, ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

    export default {

        data() {
            return {
                results: []
            };
        },
        mounted() {
            this.fetchItems();
          },
        methods: {
            fetchItems() {
                console.log('test');
                axios.get('http://localhost:8000/api/list')
                    .then(response => {

                    this.items = response.data;

                })
                    .catch(error => console.log(error));
            }
        },

        setup() {

            //state token
            const token = localStorage.getItem('token')

            //inisialisasi vue router on Composition API
            const router = useRouter()

            //state user
            const user = ref('')
            
            //mounted properti
            onMounted(() =>{

                this.fetch();

                //check Token exist
                if(!token) {
                    return router.push({
                        name: 'login'
                    })
                }
                
                //get data user
                axios.defaults.headers.common.Authorization = `Bearer ${token}`
                axios.get('http://localhost:8000/api/user')
                .then(response => {

                    console.log(response.data.name)
                    user.value = response.data

                })
                .catch(error => {
                    console.log(error.response.data)
                })

            })

            //method logout
            function logout() {

                //logout
                axios.defaults.headers.common.Authorization = `Bearer ${token}`
                axios.post('http://localhost:8000/api/logout')
                .then(response => {

                    if(response.data.success) {

                        //remove localStorage
                        localStorage.removeItem('token')

                        //redirect ke halaman login
                        return router.push({
                            name: 'login'
                        })

                    }

                })
                .catch(error => {
                    console.log(error.response.data)
                })

            }

            return {
                token,      // <-- state token
                user,       // <-- state user
                logout      // <-- method logout
            }

        }

    }



</script>