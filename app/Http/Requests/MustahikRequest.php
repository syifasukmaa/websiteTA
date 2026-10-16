<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MustahikRequest extends FormRequest
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
            'nama_keluarga' => ['required', 'string', 'max:255'],
            'kelompok' => ['nullable', 'string'],
            'nama_istri' => ['nullable', 'string', 'max:255'],
            'nama_suami' => ['nullable', 'string', 'max:255'],
            'id_RT' => ['nullable'],
            'nomor_hp' => ['nullable', 'string', 'max:20'],
            'alamat' => ['required', 'string'],
        ];
    }
}
