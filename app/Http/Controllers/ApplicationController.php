<?php

namespace App\Http\Controllers;

use App\Services\ApplicationService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UpdateApplicationRequest;
use App\Http\Requests\StoreApplicationRequest;
use Illuminate\Support\Facades\Log;

class ApplicationController extends Controller
{
    protected $applicationService;

    public function __construct(ApplicationService $applicationService)
    {
        $this->applicationService = $applicationService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $applications = $this->applicationService->getAllApplications();
    
            return response()->json([
                'data' => $applications,
                'message' => 'Applications retrieved successfully',
                'status' => true
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Something went wrong',
                'status' => false
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        $validatedData = $request->validated();
        $application = $this->applicationService->storeApplication($validatedData);
        return response()->json([
            'message' => 'Application created successfully',
            'application' => $application
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
            $application = $this->applicationService->getApplicationById($id);
            if (!$application) {
                return response()->json([
                    'message' => 'Application not found',
                    'status' => false
                ]);
            }
            return response()->json([
                'data' => $application,
                'message' => 'Application retrieved successfully',
                'status' => true,
            ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    
   public function update(UpdateApplicationRequest $request, string $id)
   {
       $validatedData = $request->validated();

       $application = $this->applicationService->updateApplication($id, $validatedData);

       return response()->json([
           'message' => 'Application updated successfully!',
           'application' => $application
       ]);
   }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->applicationService->destroyApplication($id);
        return response()->json(['message' => 'Application deleted successfully']);

    }

}
