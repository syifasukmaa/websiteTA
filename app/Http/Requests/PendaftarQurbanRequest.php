<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendaftarQurbanRequest extends FormRequest
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
            'jenis_hewan' => ['required', 'string'],
            'tujuan_pahala' => ['required', 'string'],
            'hak_pengqurban' => ['required', 'string'],
            'biaya' => ['required', 'numeric'],
            'RW' => ['required', 'string'],
            'id_RT' => ['nullable'],
            'status_pembayaran' => ['required', 'string'],
        ];
    }
}
