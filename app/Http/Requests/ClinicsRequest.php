<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClinicsRequest extends FormRequest
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
            'phone' => ['required','max:255',Rule::unique('clinics','phone')->ignore($this->id)],
            'email' => ['nullable','email'],
            'doctor' => ['required',Rule::exists('doctors','id')],
            'disclosure_price' => ['required','numeric'],
            'rediscovery_price' => ['required','numeric'],
            'today_capacity' => ['required','numeric'],
            'time_form' => ['required'],
            'time_to' => ['required'],
            'role_id' => [request()->method() == 'POST' ? 'required' : 'nullable',Rule::exists('roles','id')],
            'address' => ['nullable','max:255'],
            'day' => ['required','array'],
            'password' => [request()->method() == 'POST' ? 'required' : 'nullable','max:100','min:6','confirmed'],
        ];
    }
}
