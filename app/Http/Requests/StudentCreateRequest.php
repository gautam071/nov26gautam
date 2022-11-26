<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required|string',
            'email'   => 'required|string',
            'phone'   => 'required|numeric',
            'address' => 'nullable|string',
            'city'    => 'nullable|string',
            'state'   => 'nullable|string',
            'country' => 'nullable|string',
            'status'  => 'required|string',
        ];
    }
}
