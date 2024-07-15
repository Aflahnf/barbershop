@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div style="float:left">Booking List</div>
                    <div style="float:right">Order Status : <a href="{{ url('/booking_list/all') }}">All</a> | <a href="{{ url('/booking_list/wait') }}">Wait</a> | <a href="{{ url('/booking_list/done') }}">Done</a></div>
                </div>

                <div class="card-body">
                    @if ($status_code!=='')
                        <div class="alert {{ $status_code }}">
                            {{ $status }}
                        </div>
                    @endif
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
                         @foreach ($bookings as $booking)
                            <tr>
                              <th scope="row">{{ $booking->id }}</th>
                              <td>{{ $booking->booking_date }} | {{ $booking->booking_time }} </td>
                              <td>{{ $booking->service->service_name }}</td>
                              <td>{{ $booking->hairstylist->name }}</td>
                              <td>{{ $booking->user->name }}</td>
                               <td>{{ $booking->booking_status }}</td>
                              <td>
                                <!-- <a href="/booking_form/{{ $booking->id  }}" class="btn" role="button">Edit</a> -->
                                <form action="{{ route('booking_form.edit', $booking->id) }}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <button type="submit">Edit</button>
                                </form>
                              </td>
                              <td>
                                <form action="{{ route('booking.delete', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                              </td>
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