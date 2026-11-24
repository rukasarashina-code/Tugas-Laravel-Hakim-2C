# Laravel Admin

Aplikasi latihan praktikum **Framework Laravel** yang memakai template **SB Admin 2** (Bootstrap 4) dengan sistem templating Blade, CRUD data admin, serta migration dan seeder. Dibuat dengan Laravel 12, PHP 8.2 dan MySQL.

**Disusun oleh:** Ahmad Rafiq Hakim / 2513020081

## Fitur

- **Sistem Templating (hal 12):** satu layout bersama (`header`, `sidebar`, `content`, `footer`) yang dipakai semua halaman lewat `@extends`, `@section`, `@include` dan `@yield`.
- **Lima halaman:** Home, Product, Service, Contact dan About, dengan menu aktif otomatis di sidebar.
- **CRUD Admin (hal 19):** tambah, lihat, ubah dan hapus data pada tabel `admins`, lengkap dengan validasi dan pesan notifikasi.
- **Migration dan Seeder (hal 27):** tabel dibuat lewat migration, data awal dibuat lewat seeder dengan Faker.

## Teknologi

- Laravel 12 dan PHP 8.2
- MySQL (XAMPP atau Homebrew) dan phpMyAdmin
- SB Admin 2 v4.1.4 (Bootstrap 4), disimpan di `public/sbadmin`
- Blade Template

## Kebutuhan

- PHP 8.2 atau lebih baru
- Composer
- MySQL (XAMPP untuk macOS, atau `brew install mysql`)
- Koneksi internet (font dimuat dari Google Fonts)

## Cara Menjalankan

1. Masuk ke folder proyek dan pasang dependensi:

```
cd laravel-admin
composer install
cp .env.example .env
php artisan key:generate
```

Di Windows, ganti `cp` dengan `copy`. Folder `vendor` tidak disertakan, jadi `composer install` wajib dijalankan. Karena `composer.lock` tidak disertakan, Composer akan memilih versi paket yang cocok dengan PHP di komputer Anda.

2. Nyalakan MySQL, lalu buat database kosong bernama `laravel_admin` (lewat phpMyAdmin atau `mysql -u root -e "CREATE DATABASE laravel_admin"`).

3. Pastikan pengaturan database di file `.env` seperti berikut (sudah menjadi isi `.env.example`):

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_admin
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=file
CACHE_STORE=file
```

4. Buat tabel, isi data awal dan jalankan server:

```
php artisan migrate:fresh --seed
php artisan serve
```

5. Buka `http://127.0.0.1:8000` di browser (otomatis menuju `/home`).

## Daftar URL

| Method | URL | Keterangan |
|---|---|---|
| GET | `/` | Diarahkan ke `/home` |
| GET | `/home` | Halaman Home |
| GET | `/product` | Halaman Product |
| GET | `/service` | Halaman Service |
| GET | `/contact` | Halaman Contact |
| GET | `/about` | Halaman About |
| GET | `/admin` | Daftar admin |
| GET | `/admin/create` | Form tambah admin |
| POST | `/admin` | Simpan admin baru |
| GET | `/admin/{id}/edit` | Form ubah admin |
| PUT | `/admin/{id}` | Simpan perubahan admin |
| DELETE | `/admin/{id}` | Hapus admin |

## Struktur Tabel

Tabel `admins`:

| Kolom | Tipe | Keterangan |
|---|---|---|
| `id_admin` | bigint, auto increment | Primary key |
| `username` | varchar(100) | Unik |
| `password` | varchar(100) | Password (hash bcrypt) |
| `created_at`, `updated_at` | timestamp | Waktu dibuat dan diubah |

## Data Awal (Seeder)

- 1 admin tetap: username `admin`, password `admin123`.
- 5 admin acak dari Faker, password `password`.

## File Penting

```
app/
  Http/Controllers/
    DashboardController.php    # lima halaman template
    AdminController.php        # CRUD admin
  Models/Admin.php
database/
  migrations/                  # admins (selain users, cache, jobs bawaan Laravel)
  seeders/
    DatabaseSeeder.php
    AdminSeeder.php
resources/views/
  layouts/app.blade.php        # layout utama
  partials/                    # header, sidebar, footer
  admin/                       # index, create, edit, _form
  home, product, service, contact, about
routes/web.php
public/sbadmin/                # template SB Admin 2
```

## Riwayat Commit

```
[INIT] Install Laravel
[ADD] fitur Sistem Templating
[ADD] fitur CRUD
[ADD] fitur Migration dan Seeder
[DOCS] Tambah README
```

## Catatan

- File `.env` tidak ikut repository, jadi harus dibuat dari `.env.example`.
- Password disimpan dalam bentuk hash (bcrypt), bukan teks biasa.
- Perintah `migrate:fresh` menghapus semua tabel di database `laravel_admin`, lalu membuatnya ulang.
- Template SB Admin 2 berlisensi MIT (https://startbootstrap.com/theme/sb-admin-2).
