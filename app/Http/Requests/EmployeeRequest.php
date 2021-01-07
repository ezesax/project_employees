<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EmployeeRequest extends FormRequest
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
            'name'          => 'required|string|min:1',
            'lastname'      => 'nullable|string|min:1',
            'birthday'      => 'nullable|date',
            'roll_on_date'  => 'nullable|date',
            'roll_off_date' => 'nullable|date',
            'project_id'    => 'required|exists:projects,id',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
