# 🌟 Web Nostalgia Anak 2000an - UTS PWEB Praktikum

Website ini dibuat untuk mengenang berbagai hal yang membuat masa kecil kita tak terlupakan dari kartun favorit, lagu legendaris, hingga game klasik yang menemani hari-hari di masa kecil kita. Dibuat menggunakan Laravel 12.

## 🎯 Fitur Utama

- 🔐 **Login User (Simulasi Sesi)**
  - Login menggunakan username & password.
  - Validasi form dengan pesan error.

- 🏠 **Dashboard Nostalgia**
  - Menampilkan daftar item nostalgia berdasarkan kategori.
  - Fitur filter berdasarkan kategori: Kartun, Permainan, Lagu.

- 📋 **Pengelolaan Data**
  - Melihat semua data nostalgia.
  - Menampilkan jumlah total nostalgia.
  - Halaman tambah data baru dengan validasi lengkap.

- 👤 **Profil User**
  - Menampilkan nama user yang login.
  - Statistik kategori favorit.
  - Level nostalgia berdasarkan jumlah koleksi.
  - Fakta nostalgia unik yang ditampilkan secara acak.

- 🚪 **Logout**
  - Menghapus session dan redirect ke halaman login.

## 📁 Struktur Folder Terkait

- `app/Http/Controllers/PageController.php` - Semua logic utama ada di sini.
- `resources/views/` - Folder yang berisi tampilan Blade:
  - `login.blade.php`
  - `dashboard.blade.php`
  - `pengelolaan.blade.php`
  - `createNostalgia.blade.php`
  - `profile.blade.php`

## 🧠 Teknologi yang Digunakan

- Laravel 12
- Blade Template Engine
- TailwindCSS 

## ✅ Cara Menjalankan

1. Clone repo ini
2. Jalankan server Laravel:
   ```bash
   npm run dev
   ```
   ```bash
   php artisan serve
   ```

3. Akses `http://127.0.0.1:8000`
4. Login menggunakan username dan password bebas

## ❤️ Dibuat Dengan Cinta oleh

**Richie Olajuwon Santoso - 232410101019**
