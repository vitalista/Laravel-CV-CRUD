<?php

namespace App\Http\Controllers;

use App\Services\CvsService;
use App\Http\Requests\StoreCvsRequest;
use App\Http\Requests\UpdateCvsRequest;
use Illuminate\Http\JsonResponse;

class CvsController extends Controller
{
    protected $cvsService;

    public function __construct(CvsService $cvsService)
    {
        $this->cvsService = $cvsService;
    }

    public function index(): JsonResponse{

        $cvs = $this->cvsService->getAllCvs();
        return response()->json([
           'data' => $cvs,
            'message' => 'Cvs retrieved successfully',
            'status' => true
        ]);

    }

    public function store(StoreCvsRequest $request): JsonResponse{

        $validatedData = $request->validated();
        $cvs = $this->cvsService->storeCv($validatedData);
        return response()->json([
            'message' => 'Cv created successfully',
            'application' => $cvs
        ]);

    }

    // public function create(): JsonResponse{

    // }

    public function show(string $id): JsonResponse{

        $cvs = $this->cvsService->getCvById($id);
        if (!$cvs) {
            return response()->json([
                'message' => 'Cv not found',
                'status' => false
            ]);
        }
        return response()->json([
            'data' => $cvs,
            'message' => 'Cv retrieved successfully',
            'status' => true,
        ]);

    }

    // public function edit(): JsonResponse{

    // }

    public function update(UpdateCvsRequest $request, string $id): JsonResponse{

       $validatedData = $request->validated();
       $cvs = $this->cvsService->updateCv($id, $validatedData);
       return response()->json([
           'message' => 'Cv updated successfully!',
           'application' => $cvs,
       ]);

    }

    public function destroy(string $id): JsonResponse{

        $this->cvsService->destroyCv($id);
        return response()->json(['message' => 'Cv deleted successfully']);

    }

}
