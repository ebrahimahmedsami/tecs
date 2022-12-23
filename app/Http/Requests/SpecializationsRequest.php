<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SpecializationsRequest extends FormRequest
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
            'name_ar' => ['required','max:255',Rule::unique('specializaitions','name_ar')->ignore($this->id)],
            'name_en' => ['required','max:255',Rule::unique('specializaitions','name_en')->ignore($this->id)],
        ];
    }
}
