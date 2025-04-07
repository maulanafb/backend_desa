<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=> "required|string|max:255",
            "password"=> "nullable|string|min:8",
        ];
    }

    public function attributes() {
        return [
            "name"=> "Nama",
            'password'=> 'Kata Sandi',
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute tidak boleh kosong',
            'string' => ':attribute harus berupa teks',
            'max' => ':attribute tidak boleh lebih dari :max karakter',
            'unique' => ':attribute sudah terdaftar',
            'min' => ':attribute harus memiliki minimal :min karakter',
            'confirmed' => ':attribute tidak cocok',
            'same' => ':attribute tidak cocok',
            'different' => ':attribute tidak boleh sama dengan :other',
        ];
    }
}
