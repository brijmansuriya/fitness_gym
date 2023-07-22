<?php

namespace App\Domain\Request;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'date' => 'required|date',
            'name' => 'required|max:190',
            'gender' => 'required|in:male,female',
            'birth_date' => 'nullable|date',
            'mobile_no' => 'required|size:10',
            'email' => 'nullable|email|max:190',
            'relative_name' => 'nullable|max:190',
            'relative_contact' => 'nullable|size:10',
            'addiction' => 'nullable|max:190',
            'image' => 'nullable|mimes:jpg,jpeg,png',
            'amount' => 'required|integer',
        ];
    }

    public function persist()
    {
        return array_merge($this->only('image', 'date', 'name', 'address', 'gender', 'birth_date', 'blood_group', 'mobile_no', 'email', 'relative_name', 'relative_contact', 'addiction', 'health_note', 'workout_goal', 'months', 'amount'), [
                'end_date' => Carbon::parse($this->date)->addMonths($this->months)->subDays(1)->format('Y-m-d'),
            ],
            $this->has('image') ? ['image' => $this->uploadImage($this->name, $this->image)] : [],
        );
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
