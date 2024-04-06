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
        return response()->json($departments);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        $department = $this->department->create($data);
        return response()->json($department);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $department = $this->department->find($id);
        return response()->json($department);
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        $department = $this->department->update($id, $data);
        return response()->json($department);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $department = $this->department->delete($id);
        return response()->json($department);
    }
}
