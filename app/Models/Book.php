<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function scopeSearchAuthor(Builder $_, string $searchQuery, Builder $query): Builder
    {
        return $query->whereHas('authors', fn ($q) => $q->where('name', 'like', "%$searchQuery%"));
    }

    public function scopeSearchName(Builder $_, string $searchQuery, Builder $query): Builder
    {
        return $query->where('name', 'like', "%$searchQuery%");
    }
}
