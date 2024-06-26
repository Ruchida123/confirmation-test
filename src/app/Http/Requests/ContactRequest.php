<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ContactRequest extends FormRequest
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
            'last_name' => ['required'],
            'first_name' => ['required'],
            'gender' => ['required'],
            'email' => ['required', 'email'],
            'tell1' => ['required', 'numeric', 'digits_between:1,5'],
            'address' => ['required'],
            'category_id' => ['required'],
            'detail' => ['required', 'max:120'],
        ];
    }

    public function withValidator(Validator $validator) {
        // TODO: チェック処理の実施条件
        $validator->sometimes('tell2', 'required | numeric | digits_between:1,5', function() {
        //tell1がエラーではない場合
        return $this->input('tell1') != "";
        });

        $validator->sometimes('tell3', 'required  | numeric | digits_between:1,5', function() {
        //tell2がエラーではない場合
        return $this->input('tell2') != "";
        });
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tell1.required' => '電話番号を入力してください',
            'tell2.required' => '電話番号を入力してください',
            'tell3.required' => '電話番号を入力してください',
            'tell1.numeric' => '電話番号は5桁までの数字で入力してください',
            'tell2.numeric' => '電話番号は5桁までの数字で入力してください',
            'tell3.numeric' => '電話番号は5桁までの数字で入力してください',
            'tell1.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tell2.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tell3.digits_between' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => '`お問合せ内容は120文字以内で入力してください`',
        ];
    }
}
