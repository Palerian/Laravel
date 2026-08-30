<?php

namespace App\Http\Requests\Admin;

use App\Models\Guru;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateGuruRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $merge = [];

        if ($this->has('name') && ! $this->has('nama')) {
            $merge['nama'] = $this->input('name');
        }

        if ($this->has('mapel') && ! $this->has('mata_pelajaran')) {
            $merge['mata_pelajaran'] = $this->input('mapel');
        }

        if ($this->has('telepon') && ! $this->has('no_telepon')) {
            $merge['no_telepon'] = $this->input('telepon');
        } elseif ($this->has('no_hp') && ! $this->has('no_telepon')) {
            $merge['no_telepon'] = $this->input('no_hp');
        } elseif ($this->has('phone') && ! $this->has('no_telepon')) {
            $merge['no_telepon'] = $this->input('phone');
        }

        if (! empty($merge)) {
            $this->merge($merge);
        }
    }

    public function rules(): array
    {
        $guru = $this->route('guru') ?? $this->route('id');
        if (is_numeric($guru) || is_string($guru)) {
            $guru = Guru::find($guru);
        }

        $guruId = $guru instanceof Guru ? $guru->id : $guru;
        $userId = $guru instanceof Guru ? $guru->user_id : null;

        return [
            'nama' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:50', Rule::unique('gurus', 'nip')->ignore($guruId)],
            'mata_pelajaran' => ['required', 'string', 'max:255'],
            'no_telepon' => ['required', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255', Rule::unique('users', 'email')->ignore($userId)],
            'password' => ['nullable', 'string', 'min:8'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama guru wajib diisi.',
            'nip.required' => 'NIP guru wajib diisi.',
            'nip.unique' => 'NIP sudah terdaftar di database.',
            'mata_pelajaran.required' => 'Mata pelajaran wajib diisi.',
            'no_telepon.required' => 'Nomor telepon wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar untuk pengguna lain.',
            'password.min' => 'Password minimal 8 karakter.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->is('api/*') || $this->is('api') || $this->expectsJson() || $this->wantsJson()) {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'message' => 'Validasi gagal, silakan periksa data input Anda.',
                'errors' => $validator->errors(),
            ], 422));
        }

        parent::failedValidation($validator);
    }
}
