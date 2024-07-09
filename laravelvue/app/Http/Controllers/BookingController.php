<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class BookingController extends Controller
{
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => ['required'],
            'booking_time' => ['required'],
            'services_name' => ['required', 'in:Bronze,Silver,Gold'],
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            try {
                $booking = Booking::create($request->all());
                $response = [
                    'message' => 'Booking created successfully',
                    'data' => $booking
                    ];

                    return response()->json($response, Response::HTTP_CREATED);
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
