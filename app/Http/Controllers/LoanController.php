<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\LoanRepositoryInterface;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    private LoanRepositoryInterface $loan;

    public function __construct(LoanRepositoryInterface $loan)
    {
        $this->loan = $loan;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $loans = $this->loan->all();
        return response()->json($loans);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        $loan = $this->loan->create($data);
        return response()->json($loan);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $loan = $this->loan->find($id);
        return response()->json($loan);
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        $loan = $this->loan->update($id, $data);
        return response()->json($loan);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $loan = $this->loan->delete($id);
        return response()->json($loan);
    }

    public function return($id): \Illuminate\Http\JsonResponse
    {
        $loan = $this->loan->return($id);
        return response()->json($loan);
    }

}
