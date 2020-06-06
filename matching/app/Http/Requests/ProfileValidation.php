<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileValidation extends FormRequest
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
            'name' => ['required', 'between:1,20'],
            'age' => ['required', 'integer','min:2'],
            'prefecture' => ['required'],
            'sex' => ['required', 'integer'],
            'matching_age_from' => ['required', 'integer'],
            'matching_age_to' => ['required', 'integer'],
            'profile' => ['required', 'between:1,255'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は入力必須です',
            'name.between' => '1〜20文字の間で入力してください',
            'age.required' => '年齢は入力必須です',
            'age.integer' => '年齢は半角英数字で入力してください',
            'age.min' => '2桁で入力してください',
            'prefecture.required' => '住んでいる都道府県は入力必須です',
            'sex.required' => '性別は入力必須です',
            'sex.integer' => '性別は半角英数字で判定します',
            'matching_age_from.required' => 'マッチング希望年齢fromは入力必須です',
            'matching_age_from.integer' => 'マッチング希望年齢fromは半角英数字で入力してください',
            'matching_age_to.required' => 'マッチング希望年齢toは入力必須です',
            'matching_age_to.integer' => 'マッチング希望年齢toは半角英数字で入力してください',
            'profile.required' => '自己アピールは入力必須です',
            'profile.between' => 'プロフィールは1〜255文字の間で入力してください'
        ];
    }
}
