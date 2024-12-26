<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InitialWeightRequest extends FormRequest
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
            'initial_weight' => ['required', 'numeric', 'max:999.9', 'regex:/^\d{1,3}(\.\d)?$/'],
            'target_weight' => ['required', 'numeric', 'max:999.9', 'regex:/^\d{1,3}(\.\d)?$/'],
        ];
    }

    public function messages()
    {
        return [
            'initial_weight.required' => '現在の体重を入力してください',
            'initial_weight.numeric' => '4桁までの数字で入力してください。',
            'initial_weight.max' => '4桁までの数字で入力してください',
            'initial_weight.regex' => '小数点は1桁で入力してください',
            'target_weight.required' => '目標の体重を入力してください',
            'target_weight.numeric' => '4桁までの数字で入力してください',
            'target_weight.max' => '4桁までの数字で入力してください',
            'target_weight.regex' => '小数点は1桁で入力してください',
            ];
    }
}