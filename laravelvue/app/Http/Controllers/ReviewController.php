<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $review = Review::get();
        $response = [
            'message' => 'List review order by time',
            'data' => $review
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
            'review_time' => ['required'],
            'services_name' => ['required', 'in:Bronze,Silver,Gold'],
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            try {
                $review = review::create($request->all());
                $response = [
                    'message' => 'review created successfully',
                    'data' => $review
                    ];

                    return response()->json($response, Response::HTTP_CREATED);
            }

            catch (QueryException $e) {
                return response()->json([
                    'message' => 'review failed' . $e->errorInfo
                ]);
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $review = Review::findOrFail($id);
        $response = [
            'message' => 'Show detail review successfully',
            'data' => $review
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
        $review = Review::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'user_name' => ['required'],
            'review_time' => ['required'],
            'services_name' => ['required', 'in:Bronze,Silver,Gold'],
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            try {
                $review->update($request->all());
                $response = [
                    'message' => 'update review successfully',
                    'data' => $review
                    ];

                    return response()->json($response, Response::HTTP_OK);
            }

            catch (QueryException $e) {
                return response()->json([
                    'message' => 'review failed' . $e->errorInfo
                ]);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = review::findOrFail($id);

            try {
                $review->delete();
                $response = [
                    'message' => 'delete review successfully',
                    'data' => $review
                    ];

                    return response()->json($response, Response::HTTP_OK);
            }

            catch (QueryException $e) {
                return response()->json([
                    'message' => 'review failed' . $e->errorInfo
                ]);
            }
    }
}
