<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YatimPiatuRequest extends FormRequest
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
            'nama_ibu' => ['required', 'string', 'max:255'],
            'nama_ayah' => ['required', 'string', 'max:255'],
            'biaya' => ['required', 'numeric'],
            'alamat' => ['required', 'string'],
            'status' => ['required', 'string'],
            'pendidikan' => ['required', 'string'],
            'id_RT' => ['required'],
        ];
    }
}
