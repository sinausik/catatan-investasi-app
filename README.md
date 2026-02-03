# 📊 Catatan Investasi

**Catatan Investasi** adalah aplikasi web berbasis **Laravel** yang saya buat untuk mencatat dan memantau seluruh aktivitas investasi pribadi, terutama di **saham**, dan ke depan memungkinkan untuk **emas** maupun **crypto**.

Motivasi utama aplikasi ini adalah karena aset tersebar di **beberapa platform sekuritas** dan **beragam jenis investasi**, sehingga diperlukan satu dashboard terpusat untuk:

- 📌 Melihat **modal berjalan** (total dana yang sedang diinvestasikan)
- 📈 Memantau **floating profit / loss** (aset berstatus HOLD)
- 💰 Mengetahui **realized profit (take profit)** dari aset yang sudah SOLD
- 📊 Mendapatkan estimasi **nilai portfolio saat ini** secara keseluruhan

Aplikasi ini **bukan alat trading otomatis**, melainkan **catatan historis dan evaluasi pribadi** untuk membantu pengambilan keputusan investasi berdasarkan pengalaman sendiri.

---

## 🚀 Tech Stack

- **Laravel** 12
- **PHP** 8.4
- **Filament** v5 (Admin Panel)
- **MySQL / MariaDB**
- Integrasi harga aset via **Yahoo Finance (unofficial)**

---

## ✨ Fitur Utama

- Manajemen **Asset** (saham, emas, dll)
- Pencatatan **Investment / Transaksi** (BUY, HOLD, SOLD)
- Perhitungan otomatis:
    - Modal investasi
    - Floating profit
    - Realized profit

- Update harga aset terbaru (manual / Yahoo Finance)
- Dashboard portfolio (Filament)

---

## 🌐 Demo

🔗 **Demo aplikasi**:
👉 [https://demo.rchtechno.com/catatan-investasi](https://demo.rchtechno.com/catatan-investasi)

> Catatan: demo hanya untuk preview fitur, data dapat berubah sewaktu-waktu.

---

## 🧑‍💻 Instalasi (Local / Server)

Ikuti langkah berikut untuk menjalankan project ini di lokal atau server Anda.

### 1️⃣ Clone Repository

```bash
git clone https://github.com/sinausik/catatan-investasi.git
cd catatan-investasi
```

---

### 2️⃣ Install Dependency

```bash
composer install
```

---

### 3️⃣ Copy & Konfigurasi Environment

```bash
cp .env.example .env
```

Lalu sesuaikan konfigurasi database di file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=catatan_investasi
DB_USERNAME=root
DB_PASSWORD=
```

---

### 4️⃣ Generate App Key

```bash
php artisan key:generate
```

---

### 5️⃣ Migrasi Database

```bash
php artisan migrate
```

---

### 6️⃣ Buat User Filament (Admin)

Karena aplikasi ini menggunakan **Filament v5**, jalankan:

```bash
php artisan make:filament-user
```

Ikuti prompt untuk membuat user pertama (email & password).

---

### 7️⃣ Jalankan Aplikasi

```bash
php artisan serve
```

Akses aplikasi di:

- Frontend: `http://localhost:8000`
- Admin Panel (Filament): `http://localhost:8000/dashboard`

---

## 🔐 Catatan Keamanan

- Pastikan file `.env` **tidak di-commit** ke repository
- Gunakan konfigurasi queue & scheduler sesuai kebutuhan server

---

## 📌 Roadmap (Rencana Pengembangan)

- [ ] Dashboard grafik portfolio
- [ ] Histori harga aset
- [ ] Multi-currency (USD → IDR)
- [ ] Dukungan emas & crypto
- [ ] Export laporan (Excel / PDF)

---

## 🤝 Kontribusi

Project ini bersifat **personal project**, namun jika ingin berdiskusi atau memberi masukan, silakan buka issue atau pull request.

---

## 👤 Author

Dibuat oleh **Rahmad Setia Budi**
GitHub: [https://github.com/sinausik](https://github.com/sinausik)

---

## 📄 Lisensi

Project ini menggunakan lisensi **MIT**.

Silakan gunakan, modifikasi, dan kembangkan sesuai kebutuhan.
