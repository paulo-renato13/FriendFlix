<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\User;

class UserRequest extends FormRequest
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
            'name' => 'required|string',
			'password' => 'required',
			'email' => 'required|email|unique:users,email',
			'age' => 'integer|min:13',
			'followers' => 'integer|min:0',
            'comments' => 'integer|min:0',
            'cpf' => 'cpf' 
        ];
       
    }

    public function messages() {
        return [
            'name.required' => 'O nome é obrigatório',
            'password.required' => 'A senha é obrigatória', 
            'email.email' => 'Insira um e-mail válido',
            'email.unique' => 'Email já existente!',
            'age.min' => 'Não atende a idade mínima'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}