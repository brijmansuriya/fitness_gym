<?php

namespace App\Domain\Request;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'months' => 'required|integer|max:190',
            'amount' => 'required|integer',
        ];
    }

    public function persist()
    {
        return $this->only('months', 'amount');
    }

    public function uploadImage($name, $inputName)
    {
        $date = \Carbon\Carbon::now()->format('Y/F');

        $destinationPath = public_path('/uploads/register');
        \File::isDirectory($destinationPath) or \File::makeDirectory($destinationPath, 0777, true, true);

        $imageName = str_replace(' ', '-', $name).'-'.time().'.'.str_replace(' ', '-', $inputName->getClientOriginalName());
        $inputName->move($destinationPath, $imageName);

        //create thumbnail

        return $imageName;
    }
}
