<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DoctorsRequest extends FormRequest
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
            'name_en' => ['required','max:255'],
            'phone' => ['required','max:255',Rule::unique('doctors','phone')->ignore($this->id)],
            'email' => ['required',Rule::unique('doctors','email')->ignore($this->id)],
        ];
    }
}
