<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'no_telepon' => 'required|numeric|unique:users,no_hp',
            'pswd' => 'required|min:6',
            'confirm_pswd' => 'required|same:pswd|min:6',
            'roles' => 'required',
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
            'name.required' => 'Nama tidak boleh kosong',
            'no_telepon.required' => 'Nomor telepon tidak boleh kosong',
            'no_telepon.numeric' => 'Nomor telepon harus berupa angka',
            'no_telepon.unique' => 'Nomor telepon sudah terdaftar',
            'no_telepon.regex' => 'Nomor telepon tidak valid',
            'pswd.required' => 'Password tidak boleh kosong',
            'pswd.min' => 'Password minimal 6 karakter',
            'confirm_pswd.required' => 'Konfirmasi password tidak boleh kosong',
            'confirm_pswd.same' => 'Konfirmasi password tidak sama dengan password',
            'confirm_pswd.min' => 'Konfirmasi password minimal 6 karakter',
            'roles.required' => 'Role tidak boleh kosong',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'no_telepon' => (substr($this->no_telepon, 0, 2) === '62') ? '0' . substr($this->no_telepon, 2) : '62' . substr($this->no_telepon, 1),
        ]);
    }
}
