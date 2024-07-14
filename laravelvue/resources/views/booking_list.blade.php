@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Booking List</div>

                <div class="card-body">

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">id</th>
                          <th scope="col">Date and Time</th>
                          <th scope="col">Service</th>
                          <th scope="col">Hairstylist</th>
                          <th scope="col">User</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach ($bookings as $booking)
                            <tr>
                              <th scope="row">{{ $booking->id }}</th>
                              <td>{{ $booking->booking_date }} | {{ $booking->booking_time }} </td>
                              <td>{{ $booking->service->service_name }}</td>
                              <td>{{ $booking->hairstylist->name }}</td>
                              <td>{{ $booking->user->name }}</td>
                              <td><button>Edit</button></td>
                            </tr>
                        @endforeach
                        
                      </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection