# Rencana Implementasi: Frontend Layanan Publik (Livewire)

Berdasarkan dokumen PRD dan struktur database yang telah direncanakan, berikut adalah rencana implementasi untuk halaman frontend (portal publik/klien) menggunakan **Livewire** (TALL Stack: Tailwind CSS, Alpine.js, Laravel, Livewire) untuk melayani pendaftaran peserta pelatihan dan pemesanan fasilitas.

## 🎯 Tujuan
Membangun antarmuka publik yang responsif, modern, dan interaktif untuk memudahkan klien (individu/instansi) dalam mencari informasi, mendaftar pelatihan, memesan fasilitas, serta melakukan login/registrasi akun, sebelum mereka masuk ke dalam sistem manajemen portal (Filament Panel `/portal`).

---

## 🏗️ Struktur Komponen Livewire

Kita akan membuat komponen-komponen Livewire independen yang akan dirender di halaman publik.

### 1. Modul Autentikasi Klien (Auth)
- **`Livewire\Frontend\Auth\Login`**
  - Halaman login untuk klien (Customer).
  - Validasi email dan password, kemudian redirect ke dashboard Filament (`/portal`) atau kembali ke halaman sebelumnya (misal sedang proses checkout).
- **`Livewire\Frontend\Auth\Register`**
  - Halaman pendaftaran akun baru untuk klien.
  - Input: Nama, Email, Password, NIK, Instansi, dan Tipe Klien.
  - Setelah berhasil, akun akan login otomatis dan bisa melanjutkan proses pendaftaran layanan.

### 2. Modul Pelatihan (Training)
- **`Livewire\Frontend\Trainings\Index`**
  - Menampilkan daftar pelatihan yang berstatus `open` atau `ongoing`.
  - Fitur: Pencarian (berdasarkan nama/tipe), filter jadwal, dan pagination.
- **`Livewire\Frontend\Trainings\Show`**
  - Halaman detail pelatihan (deskripsi, prasyarat, lokasi, jadwal, sisa kuota).
- **`Livewire\Frontend\Trainings\RegisterForm`**
  - Form pendaftaran pelatihan (Wizard/Multi-step).
  - *Requirement*: Pengguna harus **Login** terlebih dahulu. Jika belum, diarahkan ke halaman Login dengan *intended URL*.
  - Validasi: Memastikan kuota belum penuh (`filled_quota < max_quota`) dan klien belum mendaftar di pelatihan yang sama.

### 3. Modul Fasilitas (Facility)
- **`Livewire\Frontend\Facilities\Index`**
  - Menampilkan daftar fasilitas yang tersedia beserta foto (diambil dari relasi `facility_photos`).
  - Fitur: Filter tipe fasilitas (classroom, module, dll).
- **`Livewire\Frontend\Facilities\Show`**
  - Halaman detail fasilitas beserta kalender interaktif untuk mengecek ketersediaan tanggal.
- **`Livewire\Frontend\Facilities\BookingForm`**
  - Form pemesanan fasilitas.
  - *Requirement*: Pengguna harus **Login** terlebih dahulu.
  - Input: Nama Kegiatan, Tanggal Mulai - Selesai, Jumlah Tamu, dan Catatan.
  - Validasi: Mengecek agar tidak ada *double-booking* pada tanggal yang dipilih.

### 4. Layout & Halaman Utama
- **`Livewire\Frontend\Home`**
  - Landing page utama terpadu. Menampilkan *hero section* serta **memuat daftar lengkap pelatihan** yang bisa diikuti dan **fasilitas** yang bisa dipesan. Pengguna dapat langsung memilih layanan dari halaman ini.
- **Blade Components**
  - `components/layouts/app.blade.php`: Layout utama dengan Navbar (termasuk tombol Login/Register atau Nama Profil jika sudah login) dan Footer.
  - `components/ui/card.blade.php`, `components/ui/button.blade.php`: Reusable UI komponen dengan styling TailwindCSS.

---

## 🗂️ Proposed Changes (Struktur File)

Rencana pembuatan file adalah sebagai berikut:

### [NEW] Views & Layouts
- `resources/views/components/layouts/app.blade.php` (Master layout frontend)
- `resources/views/livewire/frontend/home.blade.php`

### [NEW] Livewire Classes & Views (Auth)
- `app/Livewire/Frontend/Auth/Login.php` & `resources/views/livewire/frontend/auth/login.blade.php`
- `app/Livewire/Frontend/Auth/Register.php` & `resources/views/livewire/frontend/auth/register.blade.php`

### [NEW] Livewire Classes & Views (Trainings)
- `app/Livewire/Frontend/Trainings/Index.php` & `resources/views/livewire/frontend/trainings/index.blade.php`
- `app/Livewire/Frontend/Trainings/Show.php` & `resources/views/livewire/frontend/trainings/show.blade.php`
- `app/Livewire/Frontend/Trainings/RegisterForm.php` & `resources/views/livewire/frontend/trainings/register-form.blade.php`

### [NEW] Livewire Classes & Views (Facilities)
- `app/Livewire/Frontend/Facilities/Index.php` & `resources/views/livewire/frontend/facilities/index.blade.php`
- `app/Livewire/Frontend/Facilities/Show.php` & `resources/views/livewire/frontend/facilities/show.blade.php`
- `app/Livewire/Frontend/Facilities/BookingForm.php` & `resources/views/livewire/frontend/facilities/booking-form.blade.php`

### [MODIFY] Routes
- `routes/web.php`
  ```php
  // Public Routes
  Route::get('/', \App\Livewire\Frontend\Home::class)->name('home');
  Route::get('/pelatihan', \App\Livewire\Frontend\Trainings\Index::class)->name('trainings.index');
  Route::get('/pelatihan/{id}', \App\Livewire\Frontend\Trainings\Show::class)->name('trainings.show');
  Route::get('/fasilitas', \App\Livewire\Frontend\Facilities\Index::class)->name('facilities.index');
  Route::get('/fasilitas/{id}', \App\Livewire\Frontend\Facilities\Show::class)->name('facilities.show');
  
  // Guest Routes (Hanya untuk yang belum login)
  Route::middleware('guest:customer')->group(function () {
      Route::get('/login', \App\Livewire\Frontend\Auth\Login::class)->name('customer.login');
      Route::get('/register', \App\Livewire\Frontend\Auth\Register::class)->name('customer.register');
  });

  // Protected Routes (Hanya untuk customer yang sudah login)
  Route::middleware('auth:customer')->group(function () {
      Route::get('/pelatihan/{id}/daftar', \App\Livewire\Frontend\Trainings\RegisterForm::class)->name('trainings.register');
      Route::get('/fasilitas/{id}/pesan', \App\Livewire\Frontend\Facilities\BookingForm::class)->name('facilities.book');
  });
  ```

---

## 🎨 Design & UX Guidelines

1. **Modern Aesthetics**: Menggunakan *Tailwind CSS* untuk menghasilkan desain yang *clean*, responsif (mobile-friendly), dengan *hover effects* yang mulus.
2. **Interactive Forms**: Menggunakan kemampuan *real-time validation* Livewire untuk form pendaftaran/login, ketersediaan email, atau bentrok jadwal fasilitas secara instan tanpa perlu reload halaman.
3. **Feedback Visual**: Menampilkan *toast/sweetalert* ketika login, registrasi, pendaftaran, atau booking berhasil dilakukan, beserta redirect yang mulus.

---

## 🧪 Verification Plan

### Automated Tests
- Menambahkan Feature test (Pest/PHPUnit) untuk memastikan form Livewire (Auth & Layanan) merender dengan baik.
- Tes proteksi rute: memastikan pengunjung anonim (`guest`) akan di-redirect ke halaman `/login` jika mengakses halaman pendaftaran/booking.

### Manual Verification
- Melakukan pendaftaran akun baru melalui halaman Register, dan memastikan bisa Login.
- Saat belum login, klik tombol "Daftar" di halaman pelatihan, sistem harus me-redirect ke login. Setelah login, sistem mengembalikan *user* ke form pendaftaran.
- Melakukan simulasi pendaftaran pelatihan dan pemesanan fasilitas dari halaman awal hingga *submit*, lalu memastikan data masuk ke tabel yang bersangkutan.
