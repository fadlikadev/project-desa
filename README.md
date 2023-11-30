### Project : Aplikasi Peminjaman Barang dan Fasilitas Desa

- Developer : Tim Developer Desa Bojongsoang
- Front-End : Mohamad Fadlika
- Back-End  : Iqbal Al-Bantani

**Deskrispi Aplikasi**

Web aplikasi peminjaman barang dan fasilitas desa adalah platform inovatif yang dirancang untuk memudahkan penduduk desa dalam meminjam berbagai barang dan fasilitas yang tersedia di lingkungan mereka. Dibangun dengan tujuan memperkuat keterlibatan komunitas dan memfasilitasi pertukaran barang secara efisien, aplikasi ini menawarkan sejumlah fitur yang memudahkan proses peminjaman.

Antarmuka yang ramah pengguna memungkinkan pengguna untuk menjelajahi katalog barang yang tersedia dengan mudah. Setiap barang atau fasilitas memiliki deskripsi lengkap, foto, dan ketersediaan yang terupdate secara real-time, memudahkan penduduk desa untuk memilih apa yang mereka butuhkan.

Penduduk desa dapat melakukan peminjaman melalui aplikasi dengan beberapa klik saja. Mereka dapat menentukan tanggal, waktu, dan durasi peminjaman sesuai kebutuhan mereka. Keamanan dan keandalan sistem adalah prioritas utama, dengan sistem verifikasi yang ketat untuk memastikan integritas transaksi dan informasi pengguna.

Secara keseluruhan, web aplikasi peminjaman barang dan fasilitas desa tidak hanya memudahkan akses terhadap barang-barang yang dibutuhkan, tetapi juga memperkuat koneksi sosial dan kerjasama di dalam komunitas desa. Dengan menyediakan platform yang praktis dan efisien, aplikasi ini bertujuan untuk meningkatkan kualitas hidup serta interaksi antarwarga di lingkungan desa.

### Teknologi yang Digunakan
- Bahasa Pemrograman: HTML, CSS, JavaScript, PHP, SQL
- Framework: Laravel 7.0 dan Bootstrap 4.5
- Database: mySQL

**Langkah-langkah menggunakan Aplikasi**
1. Clone project dengan code
```shell
https://github.com/fadlikadev/project-desa.git
```
2. Import inventory-desa.sql ke database
3. sesuaikan database pada .env
4. update composer
```shell
composer update
```
5. Aplikasi Web siap digunakan

### Akses Admin
Membuat account admin dan bisa diverifikasi memlalui database (Harus migrasi Database terlebih dahulu)

### USE CASE PRIORITY
| Use Case                     | Priority | Status |
|------------------------------|----------|--------|
| Register          | Tinggi   | **Selesai** |
| Login          | Tinggi   | **Selesai** |
| CRUD User oleh Admin          | Tinggi   | **Selesai** |
| CRUD Data Barang oleh Admin          | Tinggi   | **Selesai** |
| CRUD Data Fasilitas oleh Admin          | Tinggi   | **Selesai** |
| CRUD Peminjaman Barang oleh Admin          | Tinggi   | **Selesai** |
| CRUD Peminjaman Fasilitas oleh Admin          | Tinggi   | **Selesai** |
| CRUD Peminjaman Barang oleh User          | Tinggi   | **Selesai** |
| CRUD Peminjaman Fasilitas oleh User          | Tinggi   | **Selesai** |
| CRU Profil Biodata          | Tinggi   | **Selesai** |
| CRU Informasi Pada Dashboard          | Tinggi   | **Selesai** |
| CRUD Narahubung          | Tinggi   | **Selesai** |
| Ubah Password Akun          | Tinggi   | **Selesai** |
| CRU Identitas Web Aplikasi          | Tinggi   | **Selesai** |
