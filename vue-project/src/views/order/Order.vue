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
                        
                                <form @submit.prevent="submitForm">                       
                                    <input type="hidden" name="user_id" id="user_id" value="">
                                    <div class="mb-3">
                                        <label for="booking_date" class="form-label">Appointment Date</label>
                                        <input type="date" class="form-control" id="booking_date" name="booking_date" value="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="booking_time" class="form-label">Appointment Time</label>
                                        <input type="time" class="form-control" id="booking_time" name="booking_time" value="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inlineFormCustomSelect">Service Package</label>
                                        <select class="form-control" id="service_id" name="service_id" value="" required>
                                            <option selected>Choose...</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="inlineFormCustomSelect">Hair Stylist</label>
                                        <select class="form-control" id="hairstylist_id" name="hairstylist_id" value="" required>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="note" class="form-label">Notes</label>
                                        <textarea type="textarea" class="form-control" id="note" name="note" value="" required></textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="booking_status">Booking Status :</label><br>
                                        <input type="radio" id="wait" name="booking_status" value="wait">
                                        <label for="wait">Wait</label><br>
                                        <input type="radio" id="done" name="booking_status" value="done">
                                        <label for="done">Done</label><br>
                                    </div> 
                                    <button type="submit" class="btn btn-primary">Book Now</button>    
                                </form>                    


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

        setup() {

            //state token
            const token = localStorage.getItem('token')

            //inisialisasi vue router on Composition API
            const router = useRouter()

            //state user
            const user = ref('')
            
            //mounted properti
            onMounted(() =>{

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