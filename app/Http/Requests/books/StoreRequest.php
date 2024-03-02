<?php

namespace App\Http\Requests\books;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            // not doing unique under the assumption that 2 books could be named the same
            // otherwise could have used this `unique:table,column,except,id`
            'authors' => 'required|array',
            'name' => 'required|string',
            'year' => 'required|integer',
            'status' => 'in:free,busy'
        ];
    }

}
