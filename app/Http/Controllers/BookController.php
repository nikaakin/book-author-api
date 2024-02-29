<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'books' => Book::all(),
        ], 200);
    }

    public function show(Book $book): JsonResponse
    {
        return response()->json([
            'book' => $book
        ], 200);
    }

    public function destroy(Book $book): JsonResponse
    {
        $book->delete();
        return response()->json([
            'message' => 'Book was deleted successfully'
        ], 204);
    }
}
