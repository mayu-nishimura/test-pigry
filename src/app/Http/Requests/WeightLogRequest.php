<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightLogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'date' => ['required'],
            'weight' =>['required', 'numeric', 'max:999.9', 'regex:/^\d{1,3}(\.\d)?$/'],
            'calories' => ['required', 'integer'],
            'exercise_time' => ['required'],
            'exercise_content' => ['max:120'],
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',
            'weight.required' => '体重を入力してください',
            'weight.numeric' => '数字で入力してください',
            'weight.max' => '4桁までの数字で入力してください',
            'weight.regex' => '小数点は1桁で入力してください',
            'calories.required' => '接種カロリーを入力してください',
            'calories.integer' => '数字で入力してください',
            'exercise_time.required' => '運動時間を入力してください',
            'exercise_content.max' => '120文字以内で入力してください',
        ];
    }
}
