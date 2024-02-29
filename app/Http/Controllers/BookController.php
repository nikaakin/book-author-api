<?php

namespace App\Http\Controllers;

use App\Http\Requests\books\StoreRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\JsonResponse;

use function PHPSTORM_META\map;

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

    public function store(StoreRequest $request): JsonResponse
    {
        $data = $request->validated();
        $book = Book::create($data);

        $authors = [];
        foreach($data['authors'] as $key => $value) {
            array_push($authors, Author::firstOrCreate(['name' => $value]));
        }

        $book->authors()->attach(collect($authors)->map((fn ($author) => $author->id)));

        return response()->json([
            $book,
            $authors
        ], 201);
    }

    public function destroy(Book $book): JsonResponse
    {
        $book->delete();
        return response()->json([
            'message' => 'Book was deleted successfully'
        ], 204);
    }
}
