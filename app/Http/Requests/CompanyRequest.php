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
        /*
return preg_match('/(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.(com)'.'((:[0-9]{1,5})?\\/.*)?$/i' ,$value);

return preg_match('/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $value);
        */
        isset($_FILES['logo']) && !empty($_FILES['logo']) ? $this->rules['logo'] = 'mimes:jpeg,png,jpg,gif,svg|min:1' : '';
        return $this->rules;
    }
}
