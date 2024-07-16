

<template>
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
</template>