<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengeluaranEditRequest extends FormRequest
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
            'id_jenis_pengeluaran' => ['required'],
            'jumlah_pengeluaran' => ['required'],
            'tanggal_pengeluaran' => ['required', 'date'],
            'dokumentasi_pengeluaran' => ['nullable', 'mimes:png,jpeg,jpg']
        ];
    }
    public function attributes()
    {
        return [
            'id_jenis_pengeluaran' => 'Jenis pengeluaran',
        ];
    }
}
