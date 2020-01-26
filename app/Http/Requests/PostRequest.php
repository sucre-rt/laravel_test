<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()     // 認証のルールを書くことができる
    {
        return true;        // trueにすることで、全てを許可するルールにする
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [    // postモデルのバリデーション
            'title' => 'required|min:3',    // not null制約、最低３文字
            'body' => 'required'
        ];
    }

    // エラーメッセージのカスタマイズ
    public function messages() {
        return[
            'title.required' => 'please enter title!!!'
        ];
    }
}
