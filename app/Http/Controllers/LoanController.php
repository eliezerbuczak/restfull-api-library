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
        if (isset($loans['message'])) {
            return response()->json($loans, 404);
        }
        if(isset($loans['error'])){
            return response()->json($loans, 500);
        }
        return response()->json($loans);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        $loan = $this->loan->create($data);
        if(isset($loan['error'])){
            return response()->json($loan, 500);
        }
        return response()->json($loan);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $loan = $this->loan->find($id);
        if (isset($loan['message'])) {
            return response()->json($loan, 404);
        }
        if(isset($loan['error'])){
            return response()->json($loan, 500);
        }
        return response()->json($loan);
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        $loan = $this->loan->update($id, $data);
        if(isset($loan['message'])){
            return response()->json($loan, 404);
        }
        if(isset($loan['error'])){
            return response()->json($loan, 500);
        }

        return response()->json($loan);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $loan = $this->loan->delete($id);
        if(isset($loan['message'])){
            return response()->json($loan, 404);
        }
        if(isset($loan['error'])){
            return response()->json($loan, 500);
        }
        return response()->json($loan);
    }

    public function return($id): \Illuminate\Http\JsonResponse
    {
        $loan = $this->loan->return($id);
        if(isset($loan['message'])){
            return response()->json($loan, 404);
        }
        if(isset($loan['error'])){
            return response()->json($loan, 500);
        }
        return response()->json($loan);
    }

}
