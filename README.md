# 💰 Payroll Service 💰

> Sistem Manajemen Karyawan dan Penggajian (Payroll) komprehensif berbasis web, dibangun menggunakan framework Laravel untuk efisiensi dan akurasi pengelolaan SDM.

![Laravel](https://img.shields.io/badge/Laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)

## 📖 Tentang Proyek

**Payroll Service** adalah aplikasi berbasis web yang dirancang untuk mendigitalisasi proses HR dan penggajian. Proyek ini mendemonstrasikan implementasi sistem multi-role (Admin dan Karyawan) yang aman, manajemen basis data relasional, serta antarmuka yang modern dan responsif. Aplikasi ini mempermudah pencatatan absensi, pengajuan cuti/izin, dan perhitungan gaji karyawan.

## ✨ Fitur Utama

* **🔐 Multi-Role Authentication:** Sistem login aman dengan pemisahan akses yang jelas antara *Admin* dan *Karyawan*.
* **👥 Manajemen Karyawan (Admin):** Modul lengkap untuk mengelola (*CRUD*) data karyawan perusahaan secara terpusat.
* **📅 Sistem Absensi:**
  * Karyawan dapat mencatatkan kehadiran mereka secara digital.
  * Admin dapat memantau rekap absensi seluruh karyawan.
* **📝 Sistem Pengajuan:** Karyawan dapat membuat pengajuan (seperti cuti, izin, atau klaim) melalui dashboard mereka.
* **💵 Manajemen Gaji (Payroll):** Perhitungan gaji otomatis berdasarkan data karyawan dan absensi.
* **🖨️ Cetak Laporan:** Fitur untuk mencetak laporan gaji atau slip gaji (Cetak/Detail Cetak).

## 🛠️ Teknologi yang Digunakan

* **Backend Framework:** Laravel (PHP)
* **Frontend Styling:** Tailwind CSS dengan *build tool* Vite
* **Database:** Relasional Database (Bawaan Laravel Migrations)
* **Authentication:** Laravel Auth (Breeze/UI)

## 🚀 Cara Instalasi & Penggunaan (Local Development)

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di mesin lokal Anda:

1.  **Clone repositori ini:**
    ```bash
    git clone https://github.com/adyvka31/payroll-service.git
    ```
2.  **Masuk ke direktori proyek:**
    ```bash
    cd payroll-service
    ```
3.  **Instal dependensi PHP & Node.js:**
    ```bash
    composer install
    npm install
    ```
4.  **Konfigurasi Environment:**
    * Salin file `.env.example` menjadi `.env`.
    ```bash
    cp .env.example .env
    ```
    * Sesuaikan konfigurasi database (DB_DATABASE, DB_USERNAME, DB_PASSWORD) di file `.env`.
5.  **Generate Application Key:**
    ```bash
    php artisan key:generate
    ```
6.  **Migrasi Database (dan jalankan Seeder jika ada):**
    ```bash
    php artisan migrate --seed
    ```
7.  **Build aset frontend:**
    ```bash
    npm run dev
    ```
8.  **Jalankan server lokal:**
    ```bash
    php artisan serve
    ```
    Aplikasi dapat diakses melalui browser di `http://localhost:8000`

---
*Dikembangkan untuk memberikan solusi digitalisasi manajemen HR berbasis arsitektur MVC pada Laravel.*
