<?php

namespace App\Livewire\Frontend\Auth;

use App\Enums\ClientType;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Daftar Akun — Layanan Publik')]
class Register extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $id_number = '';
    public string $phone = '';
    public string $position = '';
    public string $origin_institution = '';
    public string $client_type = 'individual';

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:customers,email'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'id_number' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:20'],
            'position' => ['nullable', 'string', 'max:255'],
            'origin_institution' => ['required', 'string', 'max:255'],
            'client_type' => ['required', 'string', 'in:individual,institutional'],
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar. Silakan gunakan email lain atau login.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal 8 karakter.',
            'id_number.required' => 'NIK/NIP/NRP wajib diisi.',
            'phone.required' => 'Nomor telepon/WA wajib diisi.',
            'origin_institution.required' => 'Instansi asal wajib diisi.',
            'client_type.required' => 'Tipe klien wajib dipilih.',
        ];
    }

    public function register(): void
    {
        $validated = $this->validate();

        $customer = Customer::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'id_number' => $validated['id_number'],
            'phone' => $validated['phone'],
            'position' => $validated['position'] ?? null,
            'origin_institution' => $validated['origin_institution'],
            'client_type' => ClientType::from($validated['client_type']),
            'is_active' => true,
        ]);

        Auth::guard('customer')->login($customer);
        session()->regenerate();

        $this->redirect(
            session('url.intended', route('home')),
            navigate: true
        );
    }

    public function render()
    {
        return view('livewire.frontend.auth.register');
    }
}
