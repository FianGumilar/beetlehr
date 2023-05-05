<?php

namespace App\Http\Requests\Fingerprint;

use Illuminate\Foundation\Http\FormRequest;

class ValidateBasicInfoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        // if($this->action === 'update'){
        //     $pictureRule = 'nullable|file|max:3072|mimes:jpg,jpeg,png';
        //     $phoneNumberRule = 'required|string|unique:employees,id,' . $this->id;
        //     $emailRule = 'required|email|unique:users,email,' . $this->user_id;
        // }else{
        //     $pictureRule = 'required|file|max:3072|mimes:jpg,jpeg,png';
        //     $phoneNumberRule = 'required|string|unique:employees';
        //     $emailRule = 'required|email|unique:users';
        // }

        $serialNumberRule = 'required|string|unique:fingerprint';

        return [
            'name' => 'required|string',
            'serial_number' => $serialNumberRule,
            'active' => 'required|string',
        ];
    }
}
