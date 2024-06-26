<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'no_telp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'pswd' => 'required|min:6',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'no_telp.required' => 'Nomor telepon tidak boleh kosong',
            'no_telp.regex' => 'Nomor telepon tidak valid',
            'no_telp.min' => 'Nomor telepon minimal 10 karakter',
            'pswd.required' => 'Password tidak boleh kosong',
            'pswd.min' => 'Password minimal 6 karakter',
        ];
    }

    protected function prepare_for_validation()
    {
        $this->merge([
            'no_telp' => (substr($this->no_telp, 0, 2) === '62') ? '0' . substr($this->no_telp, 2) : '62' . substr($this->no_telp, 1),
        ]);
    }
}
