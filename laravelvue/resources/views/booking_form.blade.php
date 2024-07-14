@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Booking</div>

                <div class="card-body">
                    <!-- <h2>Booking Form</h2> -->

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('booking.store') }}" enctype="multipart/form-data"> 
                            @csrf
                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                            <div class="mb-3">
                                <label for="booking_date" class="form-label">Appointment Date</label>
                                <input type="date" class="form-control" id="booking_date" name="booking_date" value="{{ old('booking_date') }}" required>
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="booking_time" class="form-label">Appointment Time</label>
                                <input type="time" class="form-control" id="booking_time" name="booking_time" value="{{ old('booking_time') }}" required>
                                @error('time')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="inlineFormCustomSelect">Service Package</label>
                                <select class="form-control" id="service_id" name="service_id" value="{{ old('service_id') }}" required>
                                    <option selected>Choose...</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->service_name }} - Package {{ $service->description }} - Price {{ $service->price }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="inlineFormCustomSelect">Hair Stylist</label>
                                <select class="form-control" id="hairstylist_id" name="hairstylist_id" value="{{ old('hairstylist_id') }}" required>
                                    @foreach ($hairstylist as $person)
                                        <option value="{{ $person->id }}">{{ $person->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="note" class="form-label">Notes</label>
                                <input type="text" class="form-control" id="note" name="note" value="{{ old('note') }}" required>
                                @error('notes')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-check form-switch">
                                
                            @if (Auth::user()->name=='Super Admin')  
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="booking_status" id="booking_status" value="wait" checked>
                                  <label class="form-check-label" for="inlineRadio1">Wait</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="booking_status" id="booking_status" value="done">
                                  <label class="form-check-label" for="inlineRadio2">Done</label>
                                </div>
                            @else
                               <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="booking_status" id="booking_status" value="wait" readonly checked>
                                  <label class="form-check-label" for="inlineRadio1">Wait</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="booking_status" id="booking_status" value="done" readonly>
                                  <label class="form-check-label" for="inlineRadio2">Done</label>
                                </div>
                            @endif
                                <label class="form-check-label" for="booking_status">Booking Status</label>
                            </div>

                            

                            <div style="float:left;">
                            <button type="submit" class="btn btn-primary">Book Now</button>
                            </div>
                            <div  style="float:right;">
                            <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
