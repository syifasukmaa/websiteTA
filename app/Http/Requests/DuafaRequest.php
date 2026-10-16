<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DuafaRequest extends FormRequest
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
            'nama' => ['required', 'string', 'max:255'],
            'nama_istri' => ['nullable', 'string', 'max:255'],
            'nama_suami' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'string'],
            'jumlah_uang' => ['required', 'numeric'],
            'keterangan' => ['required', 'string'],
            'penerimaan' => ['required', 'string'],
            'id_RT' => ['required'],
            'RW' => ['required'],
        ];
    }
}
