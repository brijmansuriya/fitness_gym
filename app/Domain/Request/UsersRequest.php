<?php

namespace App\Domain\Request;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => 'required|max:190',
            'email' => 'required|email|max:190',
            'mobile_no' => 'required|size:10',
            'image' => 'nullable|mimes:jpg,jpeg,png',
            'password' => $this->method() == 'POST' ? 'required|min:6' : ($this->get('password') ? 'min:6' : ''),
            'confirm_password' => $this->method() == 'POST' ? 'required|min:6|same:password' : ($this->get('password') ? 'required_with:password|min:6|same:password' : ''),
        ];
    }

    public function persist()
    {
        return array_merge($this->only('name', 'email', 'mobile_no', 'image'),
            $this->has('image') ? ['image' => $this->uploadImage($this->name, $this->image)] : [],
            $this->has('password') ? ['password' => bcrypt($this->get('password'))] : [],
        );
    }

    public function uploadImage($name, $inputName)
    {
        $destinationPath = public_path('/uploads/users');
        \File::isDirectory($destinationPath) or \File::makeDirectory($destinationPath, 0777, true, true);

        $imageName = str_replace(' ', '-', $name).'-'.time().'.'.str_replace(' ', '-', $inputName->getClientOriginalName());
        $inputName->move($destinationPath, $imageName);

        //create thumbnail
        return $imageName;
    }
}
