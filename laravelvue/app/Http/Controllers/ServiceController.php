<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = Service::get();
        $response = [
            'message' => 'List service',
            'data' => $service
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        $response = [
            'message' => 'Show detail service',
            'data' => $service
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
        {
            $service = service::findOrFail($id);
    
            $validator = Validator::make($request->all(), [
                'user_name' => ['required'],
                'service_time' => ['required'],
                'services_name' => ['required', 'in:Bronze,Silver,Gold'],
                ]);
    
                if ($validator->fails()) {
                    return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
                }
    
                try {
                    $service->update($request->all());
                    $response = [
                        'message' => 'update service successfully',
                        'data' => $service
                        ];
    
                        return response()->json($response, Response::HTTP_OK);
                }
    
                catch (QueryException $e) {
                    return response()->json([
                        'message' => 'service failed' . $e->errorInfo
                    ]);
                }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

            try {
                $service->delete();
                $response = [
                    'message' => 'delete service successfully',
                    'data' => $service
                    ];

                    return response()->json($response, Response::HTTP_OK);
            }

            catch (QueryException $e) {
                return response()->json([
                    'message' => 'service failed' . $e->errorInfo
                ]);
            }
    }
}
