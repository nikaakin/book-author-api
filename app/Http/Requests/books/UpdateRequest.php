<?php

namespace App\Http\Requests\books;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'authors' => 'array',
            'name' => 'string',
            'year' => 'integer',
            'status' => 'in:free,busy'
        ];
    }
}
