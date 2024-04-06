<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    private DepartmentRepositoryInterface $department;

    public function index()
    {
        $departments = $this->$department->all();
        return response()->json($departments);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $department = $this->$department->create($data);
        return response()->json($department);
    }

    public function show($id)
    {
        $department = $this->$department->find($id);
        return response()->json($department);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $department = $this->$department->update($id, $data);
        return response()->json($department);
    }

    public function destroy($id)
    {
        $department = $this->$department->delete($id);
        return response()->json($department);
    }
}
