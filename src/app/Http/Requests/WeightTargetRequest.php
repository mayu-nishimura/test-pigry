<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightTargetRequest extends FormRequest
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
            'weight_target' =>['required', 'numeric', 'regex:/^\d{1,3}(\.\d)?$/'],
            ];
        }
    
    public function messages()
    {
        return [
            'weight_target.required' => '目標の体重を入力してください', 
            'weight_target.numeric' => '4桁までの数字で入力してください',
            'weight_target.regex' => '小数点は1桁で入力してください',
        ];
    }
}
