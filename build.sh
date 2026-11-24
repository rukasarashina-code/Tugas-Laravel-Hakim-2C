#!/bin/bash
# Membuat project Laravel + mengerjakan praktikum per BAB, dan commit per BAB.
# Pemakaian:  bash build.sh [folder-project]
# Default folder: ~/Documents/Belajar-laravel/web-app
set -e

HERE="$(cd "$(dirname "$0")" && pwd)"
TARGET="${1:-$HOME/Documents/Belajar-laravel/web-app}"

# --- helper: ubah/tambah KEY=VALUE di file .env (portable Linux & macOS) ---
set_env() {
  local f="$1" k="$2" v="$3"
  [ -f "$f" ] || return 0
  if grep -qE "^#?[[:space:]]*${k}=" "$f"; then
    awk -v k="$k" -v v="$v" '
      $0 ~ "^#?[ ]*" k "=" { if (!done) { print k "=" v; done=1 } ; next }
      { print }' "$f" > "$f.tmp" && mv "$f.tmp" "$f"
  else
    echo "${k}=${v}" >> "$f"
  fi
}

# --- helper: salin file satu BAB lalu commit ---
commit_bab() {
  local dir="$1" title="$2" body="$3"
  cp -R "$HERE/$dir/files/." "$TARGET/"
  git add -A
  if git diff --cached --quiet; then
    echo "- (tidak ada perubahan) $title"
  else
    git commit -q -m "$title" -m "$body"
    echo "OK  $title"
  fi
}

# 1. buat project Laravel jika belum ada
if [ ! -f "$TARGET/artisan" ]; then
  command -v composer >/dev/null 2>&1 || { echo "Composer belum ada. Jalankan dulu: bash SETUP-COMPOSER-MAC.sh"; exit 1; }
  mkdir -p "$(dirname "$TARGET")"
  composer create-project laravel/laravel "$TARGET"
fi
cd "$TARGET"

# 2. siapkan git
command -v git >/dev/null 2>&1 || { echo "Git belum terpasang (brew install git)"; exit 1; }
if [ ! -d .git ]; then
  git init -q -b main 2>/dev/null || { git init -q; git checkout -q -b main; }
fi
if ! git config user.name >/dev/null 2>&1;  then git config user.name  "Mahasiswa Laravel"; echo "(git user.name diisi default, ganti dengan: git config user.name \"Nama Anda\")"; fi
if ! git config user.email >/dev/null 2>&1; then git config user.email "mahasiswa@example.com"; echo "(git user.email diisi default, ganti dengan: git config user.email \"email@anda\")"; fi

# cegah dijalankan dua kali pada project yang sama
if git log --format=%s 2>/dev/null | grep -qF "[ADD] fitur Autentikasi"; then
  echo "Project ini sudah pernah dibuild (commit Autentikasi sudah ada). Gunakan folder lain."
  exit 0
fi

# 3. session/cache memakai file (sesuai modul) agar tidak butuh tabel tambahan
for f in .env .env.example; do
  set_env "$f" SESSION_DRIVER file
  set_env "$f" CACHE_STORE file
  set_env "$f" CACHE_DRIVER file
  set_env "$f" QUEUE_CONNECTION sync
done

echo "== Mulai commit per BAB =="
git add -A
if ! git diff --cached --quiet; then
  git commit -q -m "[INIT] Install Laravel" -m "Project Laravel baru dari composer create-project, session/cache memakai file."
  echo "OK  [INIT] Install Laravel"
fi

# 4. commit per BAB
commit_bab bab-0-dasar \
  "[ADD] fitur Route, Controller dan Parsing Data ke View" \
  "MahasiswaController (/daftar/mahasiswa), KalkulatorController (perkalian dan luas segitiga), CSS latihan."

commit_bab bab-1-sistem-templating \
  "[ADD] fitur Sistem Templating" \
  "Layout Blade (@include header/sidebar, @yield content), halaman Home, Gallery, About, DashboardController, style.css."

# konfigurasi database (modul: Membuat CRUD Tampil Data)
for f in .env .env.example; do
  set_env "$f" DB_CONNECTION mysql
  set_env "$f" DB_HOST 127.0.0.1
  set_env "$f" DB_PORT 3306
  set_env "$f" DB_DATABASE company
  set_env "$f" DB_USERNAME root
  set_env "$f" DB_PASSWORD ""
done
commit_bab bab-2-crud \
  "[ADD] fitur CRUD" \
  "Model Employe, EmployeController (index, create, store, edit, update, destroy), view tampil/tambah/edit/hapus, Route::resource, konfigurasi DB company, SQL tabel employes."

# modul: hapus migration bawaan, sisakan milik sendiri
rm -f database/migrations/*.php
commit_bab bab-3-migration \
  "[ADD] fitur Migration, Seeder dan Factory" \
  "Migration users dan employes, UserSeeder, EmployeSeeder (Faker), DatabaseSeeder."

commit_bab bab-4-autentikasi \
  "[ADD] fitur Autentikasi" \
  "Halaman login, AuthController (login/logout dengan session + Hash), middleware IsLogin, route group terproteksi, link Logout."

echo
echo "== Riwayat commit =="
git --no-pager log --oneline
echo
echo "Langkah berikutnya:"
echo "  1) Jalankan MySQL (XAMPP / brew services start mysql), buat database 'company'"
echo "  2) cd \"$TARGET\" && php artisan migrate:fresh --seed"
echo "  3) php artisan serve  -> http://localhost:8000  (login: rudyekoprasetya@mail.com / 123456)"
