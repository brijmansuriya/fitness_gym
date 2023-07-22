<?php

namespace App\Domain\Request;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            'date' => 'required|date',
            'amount' => 'required|numeric',
        ];
    }

    public function persist()
    {
        return $this->only('name', 'date', 'amount');
    }
}
