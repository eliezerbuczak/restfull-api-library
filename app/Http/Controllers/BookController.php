<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected BookRepositoryInterface $book;

    public function __construct(BookRepositoryInterface $book)
    {
        $this->book = $book;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $books = $this->book->all();
        return response()->json($books);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        $book = $this->book->create($data);
        return response()->json($book);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $book = $this->book->find($id);
        return response()->json($book);
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        $book = $this->book->update($id, $data);
        return response()->json($book);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $book = $this->book->delete($id);
        return response()->json($book);
    }

}
