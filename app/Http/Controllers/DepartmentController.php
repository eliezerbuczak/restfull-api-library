<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    private DepartmentRepositoryInterface $department;

    public function __construct(DepartmentRepositoryInterface $department)
    {
        $this->department = $department;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $departments = $this->department->all();
        if (isset($departments['message'])) {
            return response()->json($departments, 404);
        }
        if(isset($departments['error'])){
            return response()->json($departments, 500);
        }
        return response()->json($departments);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        $department = $this->department->create($data);
        if(isset($department['error'])){
            return response()->json($department, 500);
        }
        return response()->json($department);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $department = $this->department->find($id);
        if (isset($department['message'])) {
            return response()->json($department, 404);
        }
        if(isset($department['error'])){
            return response()->json($department, 500);
        }
        return response()->json($department);
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        $department = $this->department->update($id, $data);
        if(isset($department['message'])){
            return response()->json($department, 404);
        }
        if(isset($department['error'])){
            return response()->json($department, 500);
        }
        return response()->json($department);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $department = $this->department->delete($id);
        if(isset($department['message'])){
            return response()->json($department, 404);
        }
        if(isset($department['error'])){
            return response()->json($department, 500);
        }
        return response()->json($department);
    }
}
