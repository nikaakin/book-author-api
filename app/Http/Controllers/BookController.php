<?php

namespace App\Http\Controllers;

use App\Http\Requests\books\StoreRequest;
use App\Http\Requests\books\UpdateRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    public function index(): JsonResponse
    {
        $query = Book::query();

        if(request()->input('name')) {
            $query = Book::searchName(request()->input('name'), $query);
        }

        if(request()->input('author')) {
            $query = Book::searchAuthor(request()->input('author'), $query);
        }

        $books = $query->get();

        return response()->json([
            $books,
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

    public function update(UpdateRequest $request, Book $book): JsonResponse
    {
        $data = $request->validated();

        $authors = [];
        foreach($data['authors'] as $key => $value) {
            array_push($authors, Author::firstOrCreate(['name' => $value]));
        }

        $book->authors()->sync(collect($authors)->map((fn ($author) => $author->id)));

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
