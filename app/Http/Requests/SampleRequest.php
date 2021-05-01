<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SampleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'key1' => 'required',
            'key2' => 'nullable|date_format:Ymd'
        ];
    }
}
