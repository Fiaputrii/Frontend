# 📚 Sistem Perwalian

Proyek ini merupakan aplikasi berbasis Laravel yang menyediakan fitur **CRUD (Create, Read, Update, Delete)** untuk entitas **Mahasiswa** dan **Dosen Wali**. Data mahasiswa diambil dari **API eksternal**, dan pengguna aplikasi dibatasi hanya untuk dua peran: **Mahasiswa** dan **Dosen Wali**.

---
## Link Backend ##
🔗 **Repositori Backend:** [fasshashaa/Perwalian-Backend](https://github.com/fasshashaa/Perwalian-Backend)

---

## 🚀 Fitur Utama

- 🔐 Autentikasi pengguna berdasarkan role:
  - Mahasiswa
  - Dosen Wali
- 📋 CRUD Mahasiswa (dengan data dari API eksternal), dapat menampilkan data mahasiswa
- 💬 Dosen dapat memberikan **saran akademik** kepada mahasiswa
- 📅 Mahasiswa dapat melakukan **penjadwalan perwalian** dengan dosen wali
- 📄 Tampilan responsif dan user-friendly
- 🔄 Sinkronisasi data dari API eksternal

---

## ⚙️ Teknologi yang Digunakan

- [Laravel](https://laravel.com/) - Framework PHP yang digunakan untuk membangun aplikasi web secara lebih cepat, rapi, dan terstruktur.
  - Mengatur Struktur Kode (MVC):
    - Model: Mengelola data dan database  
    - View: Tampilan antarmuka pengguna (HTML, Blade)  
    - Controller: Mengatur alur logika aplikasi  
- [Bootstrap](https://getbootstrap.com/) - Untuk tampilan
- RESTful API - Untuk sumber data mahasiswa eksternal
- MySQL - Sebagai database lokal

---

## 🗃️ Database

Silakan unduh dan import file SQL melalui link:

👉 [Download SQL di repositori Frontend]()

---

## 🖥️ Setup Backend (CodeIgniter)

### 1. Clone Repo Backend
```bash
git clone https://github.com/fasshashaa/Perwalian-Backend
```

### 2. Install Dependency CodeIgniter
```bash
composer install
```

### 3. Menjalankan CodeIgniter
```bash
php spark serve
```
### 4. Cek Endpoint


## 🖥️ Setup Frontend (Laravel)

### 1. Melalui terminal/cmd
```bash
composer create-project laravel/laravel (nama-projek)
```

### 2. Melalui Laragon
- Buka Laragon
- Klik kanan Quick app
- Laravel

### 3. Install Dependency Laravel
```Install Dependency Laravel
```

## Halaman Login ##
![image](https://github.com/user-attachments/assets/aa6cbc88-7f3d-41fe-9a95-cb6dafc95cc1)


file resources -> views -> auth -> login.blade.php
![pbf1](https://github.com/user-attachments/assets/7ae2c7d5-4d97-4b1b-b3ba-8a53c665e29c)


## Dashboard Dosen Wali ##
![image](https://github.com/user-attachments/assets/3fce36fd-5304-429d-b06a-129b5e871155)

### Side Bar Dosen Wali  ###
file resources -> views -> layouts -> dosen.blade.php
![pbf2](https://github.com/user-attachments/assets/1afc6b22-2365-4ad2-90b8-f5b73c0587e3)

### Jadwal Perwalian ###
file resources -> views -> dosen wali -> riwayat-pertemuan -> index.blade.php
![pbf3](https://github.com/user-attachments/assets/74106e10-36e9-4c85-906b-7dca30338365)

### Daftar Mahasiswa ###
![image](https://github.com/user-attachments/assets/f5dbb16d-5c37-4f25-9517-cca64eeb9e96)

file resources-> views -> dosen wali -> mahasiswa -> index.blade.php
![pbf4](https://github.com/user-attachments/assets/1b1987db-14dd-41ea-b1c4-a895ff4d3d6e)


## Dashboard Mahasiswa ##
![image](https://github.com/user-attachments/assets/4419b3ea-e096-41bd-8fc4-4f77164cc435)

### Side Bar Mahasiswa ###
file resources -> views -> layouts -> mahasiswa.blade.php
![pbf5](https://github.com/user-attachments/assets/8b768f32-7c7d-4672-8cbc-d4130637f6a0)

### Daftar Jadwal Perwalian ###
file resources -> views -> mahasiswa -> riwayat-perwalian -> index.blade.php
![pbf6](https://github.com/user-attachments/assets/ec3052d8-9ed7-4447-b9a8-f13ff5ba0ac4)
