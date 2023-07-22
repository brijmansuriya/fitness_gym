<?php

namespace App\Domain\Request;

use Illuminate\Foundation\Http\FormRequest;

class NutritionRequest extends FormRequest
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
            'amount' => 'required|integer',
            'detail' => 'required',
        ];
    }

    public function persist()
    {
        return $this->only('name', 'amount', 'detail');
    }
}
