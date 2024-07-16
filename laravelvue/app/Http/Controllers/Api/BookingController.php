<?php

namespace App\Http\Controllers\Api;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Hairstylist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required'],
            'booking_date' => ['required'],
            'booking_time' => ['required'],
            // 'services_name' => ['required', 'in:Bronze,Silver,Gold'],
            'service_id' => ['required'],
            'hairstylist_id' => ['required'],
            // 'booking_status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            try {
                // dd($request);
                // $booking = Booking::create($request->all());
                $booking = new Booking();
                $booking->user_id = $request->user_id;
                $booking->booking_date = $request->booking_date;
                $booking->booking_time = $request->booking_time;
                $booking->service_id = $request->service_id;
                $booking->hairstylist_id = $request->hairstylist_id;
                $booking->note = $request->note;
                $booking->booking_status = 'wait';
                $booking->save();

                $response = [
                    'message' => 'Booking created successfully',
                    'data' => $booking
                    ];

                return response()->json($response, Response::HTTP_CREATED);
                // return redirect()->route('booking.list')->with('status_code', 'alert-success')->with('status', 'Booking for '.$booking->user_id.' saved succesfully.');
            }

            catch (QueryException $e) {
                return response()->json([
                    'message' => 'Booking failed' . $e->errorInfo
                ]);
            }
    }

    public function list(Request $request)
    {
        
        $bookings = Booking::with('service')->with('user')->with('hairstylist')->orderBy('booking_date','DESC')->orderBy('booking_time','DESC')->get();
        $response = [
                    'message' => 'Booking data',
                    'data' => $bookings
                    ];
        return response()->json($response, Response::HTTP_CREATED);
    }   




}
