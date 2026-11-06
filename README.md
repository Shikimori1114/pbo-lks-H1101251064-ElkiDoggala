# Sistem Informasi Perpustakaan (REST API & Frontend Client)

**Nama**: Elki Doggala  
**NIM**: H1101251064  
**Mata Kuliah**: Pemrograman Berorientasi Objek (PBO)

---

## Deskripsi Proyek
Aplikasi Sistem Informasi Perpustakaan berbasis arsitektur **MVC (Model-View-Controller)** dengan implementasi **PSR-4 Autoloading**, **Dependency Injection (DI) Container**, serta **PDO MySQL**. Terdiri dari dua komponen utama:
1. **Backend REST API**: PHP 8+ yang melayani endpoint CRUD untuk entitas `Books` dan `Categories`.
2. **Frontend Client**: Single Page Application (SPA) berbasis Vanilla JavaScript (ES Modules) dan Tailwind CSS.

---

## Persyaratan Sistem & Dependensi
- PHP 8.0+
- MySQL / MariaDB (Laragon / XAMPP)
- Composer
- Web Browser (Brave, Chrome, Edge)

---

## Cara Menjalankan Aplikasi

### 1. Persiapan Database
1. Pastikan Service MySQL aktif di Laragon / XAMPP.
2. Buat database bernama `perpustakaan`.
3. Buat tabel `categories` dan `books` sesuai skema database proyek.

### 2. Jalankan Backend REST API (Port 8000)
```bash
cd pbo-lks-H1101251064-ElkiDoggala
composer install
php -S localhost:8000 -t public
