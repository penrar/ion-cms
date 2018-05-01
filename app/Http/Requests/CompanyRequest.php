<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CompanyRequest extends Request
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
            'company_name' => 'required',
            'phone_number' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required|min:5',
        ];
    }
}