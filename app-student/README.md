# Apps-Student

Aplikasi latihan praktikum **Framework Laravel** untuk mengelola data **student** dan **admin**. Halaman CRUD hanya bisa diakses setelah login sebagai admin, dengan autentikasi berbasis session dan middleware. Dibuat dengan Laravel 12, PHP 8.2 dan MySQL.

**Disusun oleh:** Ahmad Rafiq Hakim / 2513020081

## Fitur

- **Migration** untuk tabel `students` dan `admins`.
- **Model dan Controller** untuk Student dan Admin (CRUD lengkap, validasi, pesan notifikasi), serta `AuthController` untuk login dan logout.
- **Factory dan Seeder** untuk data dummy: 10 student dan 5 admin.
- **Autentikasi (hal 33):** login, logout dan restrict pages berdasarkan data pada tabel `admins`.

## Teknologi

- Laravel 12 dan PHP 8.2
- MySQL (XAMPP atau Homebrew) dan phpMyAdmin
- Blade Template dan CSS sendiri (`public/css/app-student.css`), tanpa CDN

## Kebutuhan

- PHP 8.2 atau lebih baru
- Composer
- MySQL (XAMPP untuk macOS, atau `brew install mysql`)

## Cara Menjalankan

1. Masuk ke folder proyek dan pasang dependensi:

```
cd Apps-Student
composer install
cp .env.example .env
php artisan key:generate
```

Di Windows, ganti `cp` dengan `copy`. Folder `vendor` tidak disertakan, jadi `composer install` wajib dijalankan. Karena `composer.lock` tidak disertakan, Composer memilih versi paket yang cocok dengan PHP di komputer Anda.

2. Nyalakan MySQL, lalu buat database kosong bernama `apps_student` (phpMyAdmin atau `mysql -u root -e "CREATE DATABASE apps_student"`).

3. Pengaturan database di `.env` (sudah menjadi isi `.env.example`):

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=apps_student
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=file
CACHE_STORE=file
```

4. Buat tabel, isi data dummy dan jalankan server:

```
php artisan migrate:fresh --seed
php artisan serve
```

5. Buka `http://127.0.0.1:8000`. Pengunjung yang belum login akan melihat halaman login.

## Akun Uji

| Username | Password |
|---|---|
| `admin` | `admin123` |

Empat admin lain dibuat acak oleh Factory dengan password `password123` (usernamenya terlihat di menu Admins).

## Alur Autentikasi

1. Admin mengisi username dan password di halaman login (`/`).
2. `AuthController` mencari admin pada tabel `admins`, lalu mencocokkan password dengan `Hash::check`.
3. Jika cocok, `admin_id`, `admin_username` dan `logged_in` disimpan di session, lalu admin diarahkan ke `/student`.
4. Middleware `IsLogin` (alias `islogin`, didaftarkan di `bootstrap/app.php`) memeriksa session pada setiap halaman CRUD. Jika belum login, pengunjung dialihkan ke halaman login.
5. Logout menghapus semua session dan kembali ke halaman login.

Contoh: membuka `/student` langsung tanpa login akan diarahkan ke halaman login, bukan menampilkan data student.

## Daftar URL

| Method | URL | Keterangan | Login |
|---|---|---|---|
| GET | `/` | Halaman login (jika sudah login, ke `/student`) | Tidak |
| POST | `/login` | Proses login | Tidak |
| GET | `/logout` | Logout | Ya |
| GET | `/student` | Daftar student | Ya |
| GET | `/student/create` | Form tambah student | Ya |
| POST | `/student` | Simpan student baru | Ya |
| GET | `/student/{id}/edit` | Form ubah student | Ya |
| PUT | `/student/{id}` | Simpan perubahan student | Ya |
| DELETE | `/student/{id}` | Hapus student | Ya |
| GET | `/admin` | Daftar admin | Ya |
| GET | `/admin/create` | Form tambah admin | Ya |
| POST | `/admin` | Simpan admin baru | Ya |
| GET | `/admin/{id}/edit` | Form ubah admin | Ya |
| PUT | `/admin/{id}` | Simpan perubahan admin | Ya |
| DELETE | `/admin/{id}` | Hapus admin (kecuali akun yang sedang login) | Ya |

## Struktur Tabel

Tabel `students`:

| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | bigint, auto increment | Primary key |
| `nim` | varchar(20) | Unik |
| `nama` | varchar(50) | Nama student |
| `alamat` | text | Alamat |
| `gender` | enum('L','P') | Jenis kelamin |
| `jurusan` | varchar(50) | Jurusan |
| `created_at`, `updated_at` | timestamp | Waktu dibuat dan diubah |

Tabel `admins`:

| Kolom | Tipe | Keterangan |
|---|---|---|
| `id_admin` | bigint, auto increment | Primary key |
| `username` | varchar(100) | Unik |
| `password` | varchar(100) | Password (hash bcrypt) |
| `created_at`, `updated_at` | timestamp | Waktu dibuat dan diubah |

## Data Dummy (Seeder dan Factory)

- 1 admin tetap (`admin` / `admin123`) dan 4 admin acak dari `AdminFactory`.
- 10 student acak dari `StudentFactory` (NIM, nama, alamat, gender dan jurusan dibuat dengan Faker).

## File Penting

```
app/
  Http/Controllers/
    AuthController.php         # login dan logout
    StudentController.php      # CRUD student
    AdminController.php        # CRUD admin
  Http/Middleware/IsLogin.php  # pembatas halaman
  Models/Student.php, Admin.php
bootstrap/app.php              # alias middleware islogin
database/
  migrations/                  # admins dan students
  factories/                   # StudentFactory, AdminFactory
  seeders/                     # AdminSeeder, StudentSeeder, DatabaseSeeder
resources/views/
  layout.blade.php, login.blade.php
  template/                    # nav, errors
  student/, admin/             # index, create, edit, _form
routes/web.php
```

## Riwayat Commit

```
[INIT] Install Laravel
[ADD] fitur Migration
[ADD] fitur Model dan Controller
[ADD] fitur Seeder dan Factory
[ADD] fitur Autentikasi
[DOCS] Tambah README
```

## Catatan

- File `.env` tidak ikut repository, jadi harus dibuat dari `.env.example`.
- Password disimpan dalam bentuk hash (bcrypt), bukan teks biasa.
- Perintah `migrate:fresh` menghapus semua tabel di database `apps_student`, lalu membuatnya ulang.
