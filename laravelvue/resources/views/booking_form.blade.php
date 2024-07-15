@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@if ($edit_state) Modify @else New @endif Booking for {{ Auth::user()->name }}</div>

                <div class="card-body">
                    <!-- <h2></h2> -->

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($edit_state)
                            <form method="POST" action="{{ route('booking.update',$booking->id) }}" enctype="multipart/form-data"> 
                            @csrf
                            @method('PUT')
                        @else
                            <form method="POST" action="{{ route('booking.store') }}" enctype="multipart/form-data"> 
                            @csrf    
                        @endif

                            
                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                            <div class="mb-3">
                                <label for="booking_date" class="form-label">Appointment Date</label>
                                <input type="date" class="form-control" id="booking_date" name="booking_date" value="{{ $edit_state ? $booking->booking_date: '' }}" required>
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="booking_time" class="form-label">Appointment Time</label>
                                <input type="time" class="form-control" id="booking_time" name="booking_time" value="{{ $edit_state ? $booking->booking_time : '' }}" required>
                                @error('time')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="inlineFormCustomSelect">Service Package</label>
                                <select class="form-control" id="service_id" name="service_id" value="{{ $edit_state ? $booking->service_id : '' }}" required>
                                    <option selected>Choose...</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}" @if ($edit_state) @if ($booking->service_id==$service->id) selected @endif @endif>{{ $service->service_name }} - Package {{ $service->description }} - Price {{ $service->price }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="inlineFormCustomSelect">Hair Stylist</label>
                                <select class="form-control" id="hairstylist_id" name="hairstylist_id" value="{{ $edit_state ? $booking->hairstylist_id : '' }}" required>
                                    @foreach ($hairstylist as $person)
                                        <option value="{{ $person->id }}" @if ($edit_state) @if ($booking->hairstylist_id==$person->id) selected @endif @endif>{{ $person->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="note" class="form-label">Notes</label>
                                <textarea type="textarea" class="form-control" id="note" name="note" value="{{ $edit_state ? $booking->note : '' }}" required></textarea>
                                @error('notes')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- <div class="form-check form-switch"> -->
                                
                            @if (Auth::user()->name=='Super Admin' and $edit_state)  
           <!--                      <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="booking_status" id="inlineRadio1" value="wait">
                                  <label class="form-check-label" for="inlineRadio1">Wait</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="booking_status" id="inlineRadio2" value="done">
                                  <label class="form-check-label" for="inlineRadio2">Done</label>
                                </div>
                                <label class="form-check-label" for="booking_status">Booking Status</label> -->


                                <div class="form-group">
                                    <label for="booking_status">Booking Status :</label><br>
                                    <input type="radio" id="wait" name="booking_status" value="wait" {{ $booking->booking_status == 'wait' ? 'checked' : '' }}>
                                    <label for="wait">Wait</label><br>
                                    <input type="radio" id="done" name="booking_status" value="done" {{ $booking->booking_status == 'done' ? 'checked' : '' }}>
                                    <label for="done">Done</label><br>
                                </div>

                            @endif
                                
                            <!-- </div> -->

                            <button type="submit" class="btn btn-primary">@if ($edit_state=='new') Update @else Book Now @endif</button>

                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
