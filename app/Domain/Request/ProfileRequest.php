<?php

namespace App\Domain\Request;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        $id = auth()->id();

        return [
            'email' => 'required|unique:users,email,'.$id,
            'name' => 'required|unique:users,name,'.$id,
            'password' => 'required_with:confirm_password|same:confirm_password|min:6,'.$id,
        ];
    }

    public function persist()
    {
        return [
            'email' => $this->get('email'),
            'name' => $this->get('name'),
            'password' => bcrypt($this->get('password')),
        ];
    }
}
