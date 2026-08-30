# Aplikasi Sistem Informasi Sekolah - Laravel 13

Aplikasi ini adalah sistem informasi sekolah yang dibangun menggunakan Laravel 13, mencakup modul modul praktikum dari Bab 4 hingga Bab 6.

## Struktur Aplikasi

### Modul Praktikum

#### Bab 4 - Controller Laravel 13
- **Basic Controller**: `app/Http/Controllers/GuruController.php`
  - Method: index, create, edit, store, show, update, destroy
  - Dependency Injection: Request $request
  - Response JSON: api()
  - Redirect: simpan()

- **Resource Controller**: Terintegrasi di `routes/web.php`
  - Route::resource('guru', GuruController::class)

#### Bab 5 - Blade Template
- Layout: `resources/views/layouts/app.blade.php`
- Partial views: navbar, sidebar, footer
- Blade Components: alert, table, dan komponen lainnya
- Section & Yield: Untuk halaman dashboard dan content
- Include: Memutar file navbar, sidebar, footer

#### Bab 6 - Migration
- Migration untuk tabel: gurus, siswas, mapels
- Seeder untuk mengisi data dummy
- Fitur: migrate, rollback, refresh --seed


### Akun Login (Hanya Admin)
Halaman login hanya menampilkan akun administrator:
- `admin@miyamasuzaka.test` (Super Administrator)
- `kepsek@miyamasuzaka.test` (Kepala Sekolah)

Semua password demo: `password`

## Instalasi

1. Clone repository
2. `composer install`
3. `cp .env.example .env`
4. Konfigurasi database di `.env`
5. `php artisan key:generate`
6. `php artisan migrate`
7. `php artisan db:seed`
8. `php artisan serve`

## Akun Login Default

- **Email**: admin@miyamasuzaka.test atau kepsek@miyamasuzaka.test
- **Password**: password

## Fitur Utama

- CRUD Guru (Create, Read, Update, Delete)
- Resource Controller dengan semua method (index, create, store, show, edit, update, destroy)
- Dependency Injection melalui Request
- Response JSON untuk API
- Redirect dengan Flash Message
- Blade Template Engine dengan Layout, Section, Yield, Include, Components
- Database Migration dan Seeder
- Hanya akun admin yang bisa login di halaman auth