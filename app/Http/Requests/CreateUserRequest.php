<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Tentukan apakah user diizinkan untuk membuat request ini.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Aturan validasi untuk form create user.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:15',
            'kelas_id' => 'required|exists:kelas,id',
        ];
    }

    /**
     * Pesan error kustom untuk validasi.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nama.required' => 'Nama wajib diisi.',
            'npm.required' => 'NPM wajib diisi.',
            'kelas_id.required' => 'Kelas wajib dipilih.',
        ];
    }
}