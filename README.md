# Praktikum Laravel: Sistem Templating sampai Autentikasi

Isi zip ini adalah bahan per BAB + skrip `build.sh` yang membuat project Laravel,
mengerjakan tiap BAB, lalu **commit otomatis per BAB**.

## Cara pakai (Mac)
```bash
bash SETUP-COMPOSER-MAC.sh      # sekali saja (Homebrew, PHP, Composer, Git)
bash build.sh                   # buat project di ~/Documents/Belajar-laravel/web-app
# atau pilih folder sendiri:
bash build.sh ~/Projects/web-app
```

## Hasil commit
```
[INIT] Install Laravel
[ADD] fitur Route, Controller dan Parsing Data ke View   (latihan hal 12)
[ADD] fitur Sistem Templating                            (hal 12-19)
[ADD] fitur CRUD                                         (hal 19-27)
[ADD] fitur Migration, Seeder dan Factory                (hal 27-33)
[ADD] fitur Autentikasi                                  (hal 33-38)
```

## Menjalankan aplikasi
1. Nyalakan MySQL (XAMPP, atau `brew install mysql && brew services start mysql`).
2. Buat database `company` (phpMyAdmin, atau `mysql -u root -e "CREATE DATABASE company"`).
3. Di folder project:
   ```bash
   php artisan migrate:fresh --seed
   php artisan serve
   ```
4. Buka http://localhost:8000 dan login:
   - email: `rudyekoprasetya@mail.com`
   - password: `123456`

Untuk mencoba CRUD *sebelum* Bab Migration, import `database/sql/employes.sql` (ada di project setelah commit CRUD).

## Upload ke GitHub
```bash
cd ~/Documents/Belajar-laravel/web-app
git remote add origin https://github.com/USERNAME/NAMA-REPO.git
git push -u origin main
```

## Perbedaan kecil dari modul (disengaja, agar jalan di Laravel terbaru)
- Typo `<dic>` di layout diperbaiki menjadi `<div>`.
- CRUD memakai `Route::resource` dengan method `edit` (bukan `show`) supaya route form konsisten; ID dibuat auto increment sehingga tidak diinput manual. Ditambah validasi form dan pesan sukses.
- Middleware `IsLogin` dipanggil lewat nama class di route group, jadi tidak perlu edit `Kernel.php` (yang tidak ada lagi di Laravel 11+). Jika belum login, diarahkan ke `/` dengan pesan.
- Login memakai `first()` (bukan `firstOrFail()`) agar email salah tidak menampilkan halaman 404.
- `.env` diatur `SESSION_DRIVER=file` agar sesuai modul, dan migration bawaan dihapus sesuai modul.
