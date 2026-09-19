# Aplikasi Manajemen Perpustakaan

## Deskripsi

Aplikasi Manajemen Perpustakaan adalah aplikasi berbasis web yang digunakan untuk mengelola data buku, kategori, dan penerbit. Aplikasi ini menyediakan fitur untuk menampilkan, menambahkan, mengedit, menghapus, mencari, dan memvalidasi data.

## Tampilan Data Buku
[Haman Data Buku](Buku.png)

## Teknologi

* Laravel
* PHP
* MySQL
* HTML5
* CSS3
* JavaScript
* Tailwind CSS

## Fitur Aplikasi

* Menampilkan data buku
* Menambahkan data buku
* Mengedit data buku
* Menghapus data buku
* Mencari data buku berdasarkan judul
* Mengelola kategori
* Mengelola penerbit
* Validasi data
* Relasi data buku dengan kategori
* Relasi data buku dengan penerbit
* Debugging menggunakan `console.log()`
* Pengolahan data menggunakan JSON, `filter()`, dan `forEach()`

## Struktur Project

```text
uji-kompetisi/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── bukuController.php
│   │       ├── kategoriController.php
│   │       └── penerbitController.php
│   │
│   └── Models/
│       ├── buku.php
│       ├── kategori.php
│       └── penerbit.php
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
│   └── css/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── buku/
│       ├── kategori/
│       ├── penerbit/
│       └── layout/
│
├── routes/
│   └── web.php
│
├── .env
├── composer.json
├── package.json
└── README.md
```

## Cara Menjalankan Aplikasi

### 1. Clone atau buka project

Buka folder project melalui Visual Studio Code atau terminal.

### 2. Install dependency PHP

Jalankan perintah:

```bash
composer install
```

### 3. Install dependency JavaScript

Jalankan perintah:

```bash
npm install
```

### 4. Konfigurasi file `.env`

Pastikan file `.env` sudah tersedia dan sesuaikan konfigurasi database MySQL.

Contoh:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan `DB_DATABASE` dengan nama database yang digunakan.

### 5. Generate application key

Jalankan:

```bash
php artisan key:generate
```

### 6. Jalankan migration

Jalankan:

```bash
php artisan migrate
```

Jika project menggunakan seeder, jalankan:

```bash
php artisan db:seed
```

Atau:

```bash
php artisan migrate --seed
```

### 7. Jalankan server Laravel

Jalankan:

```bash
php artisan serve
```

Aplikasi dapat diakses melalui:

```text
http://127.0.0.1:8000
```

### 8. Jalankan Vite

Buka terminal baru, kemudian jalankan:

```bash
npm run dev
```

## Penggunaan Aplikasi

Setelah aplikasi berhasil dijalankan, pengguna dapat melakukan beberapa aktivitas berikut:

1. Membuka halaman data buku.
2. Melihat daftar buku yang tersedia.
3. Menambahkan data buku melalui form tambah buku.
4. Mengisi data buku dan melakukan validasi.
5. Mencari buku berdasarkan judul.
6. Melihat detail buku.
7. Mengedit data buku.
8. Menghapus data buku.
9. Mengelola data kategori.
10. Mengelola data penerbit.

## Validasi Data

Aplikasi menggunakan validasi pada proses input data. Validasi digunakan untuk memastikan data yang dimasukkan sesuai dengan ketentuan sebelum disimpan ke database.

## Pengolahan Data

Aplikasi menggunakan struktur data JSON pada halaman data buku. Data dari Laravel dapat diubah menjadi data JavaScript menggunakan:

```javascript
const dataBuku = @json($allBuku);
```

Data tersebut dapat diproses menggunakan:

```javascript
const bukuTerfilter = dataBuku.filter(function(buku) {
    return buku.tahun_terbit >= 2020;
});
```

Data hasil filter kemudian dapat ditampilkan atau diproses menggunakan:

```javascript
bukuTerfilter.forEach(function(buku) {
    console.log('Judul buku:', buku.judul);
});
```

## Debugging

Proses debugging dapat dilakukan menggunakan `console.log()` pada browser Developer Tools.

Contoh:

```javascript
console.log('Halaman data buku berhasil dimuat.');
console.log('Jumlah data buku:', dataBuku.length);
```

Developer dapat membuka **Developer Tools → Console** pada browser untuk melihat hasil debugging.

## Pengembangan

Aplikasi ini dikembangkan menggunakan framework Laravel dengan struktur Model, View, dan Controller (MVC). Data aplikasi disimpan dalam database MySQL dan antarmuka dibuat menggunakan HTML, CSS, JavaScript, serta Tailwind CSS.

## Catatan

Pastikan PHP, Composer, Node.js, npm, MySQL, dan Git telah terinstall sebelum menjalankan aplikasi.

Pastikan juga konfigurasi database pada file `.env` sudah sesuai dengan database yang digunakan.
