<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MuzakkiRequest extends FormRequest
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
            'nama_muzakki' => ['required', 'string', 'max:255'],
            'jumlah_jiwa' => ['required', 'numeric', 'min:1'],
            'beras' => ['nullable', 'numeric'],
            'uang' => ['nullable', 'numeric'],
            'infaq' => ['nullable', 'numeric'],
            'alamat' => ['required', 'string'],
            'keterangan' => ['nullable', 'string'],
            'id_RT' => ['required'],
        ];
    }
}
