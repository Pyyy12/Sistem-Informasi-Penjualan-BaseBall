# ⚾ HomeRun Gear Store - Baseball Equipment E-Commerce

<p align="center">
  <img src="https://images.unsplash.com/photo-1508344928928-7165b67de128?auto=format&fit=crop&w=1200&q=80" alt="HomeRun Gear Banner" width="100%" style="border-radius: 12px; max-height: 380px; object-fit: cover;">
</p>

Aplikasi web e-commerce berbasis **Laravel 11** untuk toko perlengkapan olahraga baseball dan softball. Dilengkapi dengan manajemen katalog terstruktur, filter kategori, keranjang belanja berbasis session, hingga alur checkout dan kalkulasi stok otomatis.

---

## 🚀 Fitur Utama

- **Katalog Produk Terkategori:** Pengelompokan perlengkapan (Bats, Gloves, Balls, Protective Gear, Cleats).
- **Pencarian & Filter Instan:** Filter produk berdasarkan kategori dan pencarian keyword nama atau brand (Rawlings, Wilson, Mizuno, dll.).
- **Detail Produk & Related Items:** Tampilan spesifikasi detail produk disertai rekomendasi barang terkait dalam kategori yang sama.
- **Shopping Cart (Session-Based):** Tambah barang, ubah kuantitas, dan hapus item tanpa memerlukan login pelanggan terlebih dahulu.
- **Checkout & Order Management:** Form pemesanan dengan validasi input, generate nomor invoice unik (`HRG-XXXXXX`), dan pemotongan stok otomatis via database transaction.
- **UI Modern & Responsif:** Menggunakan tema dark mode sporty berbasis Tailwind CSS.

---

## 🛠️ Tech Stack

- **Framework:** [Laravel 11](https://laravel.com)
- **Bahasa:** PHP 8.2+
- **Database:** MySQL / MariaDB / PostgreSQL
- **Frontend / Styling:** Blade Templating & [Tailwind CSS](https://tailwindcss.com) (via CDN)
- **Icons:** Heroicons SVG

---

## 📂 Struktur Database

- `categories` — Menyimpan kategori gear baseball (`bats`, `gloves`, dll.).
- `products` — Data perlengkapan, brand, harga, stok, gambar, dan relasi ke kategori.
- `orders` — Informasi transaksi, invoice code, kontak pembeli, dan alamat pengiriman.
- `order_items` — Detail produk yang dibeli pada setiap transaksi.

---

## ⚙️ Panduan Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project ini di lingkungan lokal:

### 1. Clone Repositori

```bash
git clone [https://github.com/username/baseball-store.git](https://github.com/username/baseball-store.git)
cd baseball-store
