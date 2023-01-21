<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientsRequest extends FormRequest
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
            'name_ar' => ['required','max:255'],
            'name_en' => ['nullable','max:255'],
            'phone' => ['required','numeric'],
            'age' => ['required','numeric'],
            'address' => ['required','max:255'],
            'gender' => ['required','in:0,1'],
            'clinic_id' => ['required'],
            'national_id' => ['required','digits:14',
                auth()->user()->clinic ?
                '' :
                Rule::unique('patients','national_id')->ignore($this->id)
            ],
        ];
    }
}
