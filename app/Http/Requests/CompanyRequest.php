<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * validation rules that apply to the request
     *
     * @return array
     */
    protected $rules = [
        'name' => 'required',
    ];

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
        isset($_FILES['logo']) && !empty($_FILES['logo']) ? $this->rules['logo'] = 'mimes:jpeg,png,jpg,gif,svg|min:1' : '';
        return $this->rules;
    }
}
