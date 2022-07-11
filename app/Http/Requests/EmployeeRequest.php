<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Emailcustom;

class EmployeeRequest extends FormRequest
{
    /**
     * validation rules that apply to the request
     *
     * @return array
     */
    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'password' => 'required',
        'company_id' => 'required',
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
        isset($_REQUEST['email']) && !empty($_REQUEST['email']) ? $this->rules['email'] = new Emailcustom : '';
        isset($_REQUEST['phone']) && !empty($_REQUEST['phone']) ? $this->rules['phone'] = 'numeric|min:10|max:10' : '';
        isset($_REQUEST['password']) && !empty($_REQUEST['password']) ? $this->rules['password'] = 'min:6' : '';
        return $this->rules;
    }
}
