<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Hairstylist;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::orderBy('booking_time','DESC')->get();
        $response = [
            'message' => 'List booking order by time',
            'data' => $booking
        ];

        return response()->json($response, Response::HTTP_OK);
    }


    public function list(Request $request)
    {
        // $bookings = Booking::with('service')::orderBy('booking_date','DESC')->get();
        if ($request->user()->name == 'Super Admin'){
            $bookings = Booking::with('service')->with('user')->with('hairstylist')->orderBy('booking_date','DESC')->orderBy('booking_time','DESC')->get();
        } else {
            $bookings = Booking::where('user_id', $request->user()->id)->with('service')->with('user')->with('hairstylist')->orderBy('booking_date','DESC')->orderBy('booking_time','DESC')->get();
        }    
        // dd($request->user()->name);
        return view('booking_list', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function booking_form()
    {
        $services = Service::all();
        $hairstylist = Hairstylist::all();
        
        return view('booking_form', compact('services'), compact('hairstylist'));
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
            'booking_status' => ['required'],
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
                $booking->booking_status = $request->booking_status;
                $booking->save();

                $response = [
                    'message' => 'Booking created successfully',
                    'data' => $booking
                    ];

                    // return response()->json($response, Response::HTTP_CREATED);
                    return redirect('booking_list');
            }

            catch (QueryException $e) {
                return response()->json([
                    'message' => 'Booking failed' . $e->errorInfo
                ]);
            }
        }
        

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::findOrFail($id);
        $response = [
            'message' => 'Show detail booking successfully',
            'data' => $booking
            ];
            return response()->json($response, Response::HTTP_OK);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $booking = Booking::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'user_name' => ['required'],
            'booking_time' => ['required'],
            'services_name' => ['required', 'in:Bronze,Silver,Gold'],
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            try {
                $booking->update($request->all());
                $response = [
                    'message' => 'update booking successfully',
                    'data' => $booking
                    ];

                    return response()->json($response, Response::HTTP_OK);
            }

            catch (QueryException $e) {
                return response()->json([
                    'message' => 'Booking failed' . $e->errorInfo
                ]);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);

            try {
                $booking->delete();
                $response = [
                    'message' => 'delete booking successfully',
                    'data' => $booking
                    ];

                    return response()->json($response, Response::HTTP_OK);
            }

            catch (QueryException $e) {
                return response()->json([
                    'message' => 'Booking failed' . $e->errorInfo
                ]);
            }
    }
}
