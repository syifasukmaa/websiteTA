<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengqurbanSapiRequest extends FormRequest
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
            'nama_satu' => ['required', 'string', 'max:255'],
            'nama_dua' => ['required', 'string', 'max:255'],
            'nama_tiga' => ['required', 'string', 'max:255'],
            'nama_empat' => ['required', 'string', 'max:255'],
            'nama_lima' => ['required', 'string', 'max:255'],
            'nama_enam' => ['required', 'string', 'max:255'],
            'nama_tujuh' => ['required', 'string', 'max:255'],
            'pahala_satu' => ['required', 'string', 'max:255'],
            'pahala_dua' => ['required', 'string', 'max:255'],
            'pahala_tiga' => ['required', 'string', 'max:255'],
            'pahala_empat' => ['required', 'string', 'max:255'],
            'pahala_lima' => ['required', 'string', 'max:255'],
            'pahala_enam' => ['required', 'string', 'max:255'],
            'pahala_tujuh' => ['required', 'string', 'max:255'],
            'jenis_hewan' => ['required', 'string'],
            'hak_pengqurban' => ['required', 'string'],
            'biaya' => ['required', 'numeric'],
            'id_RT' => ['required'],
            'status_pembayaran' => ['required', 'string'],
        ];
    }
}
