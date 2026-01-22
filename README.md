## 📄 **README.md**

# 📚 Project Web Perpustakaan Laravel

Aplikasi web sederhana untuk mengelola data perpustakaan menggunakan **Laravel**.  
Dilengkapi dengan fitur **CRUD**, **autentikasi role (Admin & User)**, dan **tampilan responsif dengan Bootstrap**.

---

## 🚀 Fitur Utama

- 🔐 **Login & Register** (Auth Role)
- 📘 **Manajemen Buku**
  - Tambah, edit, hapus, dan lihat data buku
- 👥 **Manajemen Pengguna (Admin)**
- 🧭 **Tampilan Responsif** menggunakan Bootstrap
- ⚙️ **Struktur MVC** Laravel yang terorganisir

---

## 🛠️ Teknologi yang Digunakan

| Komponen | Teknologi |
|-----------|------------|
| Framework | Laravel 10 |
| Frontend | Bootstrap 5, Blade Template, Axios 1.7.4 (HTTP Client untuk AJAX request, Vite 6.0 (FrontEnd build tool) |
| Backend | PHP 8+ |
| Database | SqLite 3 (bisa diintegrasikan) |
| Version Control | Git & GitHub |

---

## 📦 Instalasi
1. Clone repositori ini:
   ```bash
   git clone https://github.com/Davin164/Project-WebPerpustakaan-Laravel.git
   ````

2. Masuk ke direktori project:

   ```bash
   cd Project-WebPerpustakaan-Laravel
   ```

3. Install dependencies:

   ```bash
   composer install
   npm install
   npm run dev
   ```

4. Salin file `.env.example` menjadi `.env`:

   ```bash
   cp .env.example .env
   ```

5. Atur koneksi database di file `.env`

6. Generate application key:

   ```bash
   php artisan key:generate
   ```

7. Jalankan migrasi database:

   ```bash
   php artisan migrate
   ```

8. Jalankan server:

   ```bash
   php artisan serve
   ```

Akses di browser: **[http://localhost:8000](http://localhost:8000)**

---

## 📊 Struktur Folder

```
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/
```

---

## 📎 Catatan

* Database masih bisa diganti atau disesuaikan sesuai kebutuhan.
* Pastikan environment sudah mendukung PHP 8+ dan Composer.

---

## 👨‍💻 Pengembang

**Davin Gabriel J |**
**Mahasiswa Sistem Informasi - Universitas Sriwijaya**
🖥️ GitHub: [@Davin164](https://github.com/Davin164)

---

## 📜 Lisensi

Proyek ini menggunakan lisensi MIT — silakan gunakan dan modifikasi sesuai kebutuhan.
