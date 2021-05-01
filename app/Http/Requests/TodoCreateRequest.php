<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'todo_name' => 'required',
            'todo_detail' => 'required',
            'expire_date' => 'required | date_format:Y-m-d'
        ];
    }
}
