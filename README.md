# Badminton Reservation System

Sistem pemesanan (booking) lapangan badminton berbasis web yang dibangun menggunakan framework Laravel. Proyek ini dirancang untuk memudahkan pengguna dalam memesan lapangan secara online dan mengelola transaksi pembayaran secara otomatis.

## 🚀 Fitur Utama

- **Pemesanan Lapangan:** Pengguna dapat memilih jadwal dan memesan lapangan badminton secara langsung.
- **Integrasi Payment Gateway:** Mendukung pembayaran otomatis menggunakan **Midtrans**.
- **Manajemen Reservasi:** Sistem pengelolaan data pemesanan yang terintegrasi.
- **Tampilan Responsif:** Dibangun dengan sistem templating Blade dan Tailwind CSS.

## 🛠️ Teknologi yang Digunakan

Proyek ini dikembangkan dengan teknologi modern berikut:
- **Framework:** [Laravel 12](https://laravel.com)
- **Bahasa Pemrograman:** PHP & Blade (Templating Engine)
- **Frontend Tooling:** Tailwind CSS & Vite
- **Database:** MySQL (umum digunakan dengan Laravel)
- **Payment Gateway:** Midtrans
- **Manajer Paket:** Composer (PHP) & NPM (Node.js)

## 📋 Prasyarat Instalasi

Sebelum memulai, pastikan perangkat Anda telah terpasang:
- PHP >= 8.2 (disarankan untuk Laravel 12)
- Composer
- Node.js & NPM
- MySQL atau MariaDB
- Akun Sandbox/Production Midtrans (untuk konfigurasi API Key)

## ⚙️ Cara Instalasi

1. **Clone Repository:**
   ```bash
   git clone https://github.com/bayuapriansyah/badminton-reservation-system.git
   cd badminton-reservation-system
   ```

2. **Instal Dependensi PHP:**
   ```bash
   composer install
   ```

3. **Instal Dependensi Frontend:**
   ```bash
   npm install && npm run dev
   ```

4. **Konfigurasi Environment:**
   Salin file `.env.example` menjadi `.env` dan sesuaikan pengaturan database serta API Key Midtrans Anda.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Migrasi Database:**
   ```bash
   php artisan migrate
   ```

6. **Jalankan Server:**
   ```bash
   php artisan serve
   ```

## 📂 Susunan Proyek

Struktur folder proyek ini mengikuti standar Laravel:
- `app/`: Berisi logika inti aplikasi (Models, Controllers).
- `database/`: Berisi file migrasi dan seeder database.
- `public/`: File aset yang dapat diakses publik.
- `resources/`: Berisi file view (Blade), CSS, dan JavaScript mentah.
- `routes/`: Definisi endpoint/rute aplikasi.
- `storage/`: Penyimpanan file log, cache, dan unggahan pengguna.

## 💡 Kegunaan

Aplikasi ini ditujukan bagi pemilik GOR atau pengelola lapangan badminton untuk mendigitalisasi proses pemesanan yang sebelumnya manual. Pengguna dapat melihat ketersediaan lapangan secara real-time dan melakukan pembayaran tanpa harus melakukan konfirmasi manual berkat integrasi Midtrans.

## 🤝 Kontribusi

Kontribusi selalu terbuka untuk pengembangan yang lebih baik!
1. Fork repository ini.
2. Buat branch fitur baru (`git checkout -b fitur-keren`).
3. Commit perubahan Anda (`git commit -m 'Menambah fitur keren'`).
4. Push ke branch tersebut (`git push origin fitur-keren`).
5. Buat Pull Request.

## 📄 Lisensi

Proyek ini dilisensikan di bawah **MIT License** - lihat file [LICENSE](LICENSE) untuk detail lebih lanjut.
