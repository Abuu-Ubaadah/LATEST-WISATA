<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## 🚀 Struktur CRUD Product - Laravel API  
![Laravel](https://img.shields.io/badge/Laravel-10-red?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8-blue?style=for-the-badge&logo=php)
![Sanctum](https://img.shields.io/badge/Auth-Sanctum-purple?style=for-the-badge)

> **CASE: Membangun CRUD Untuk Produk Dengan API Authentication Menggunakan Laravel Sanctum** 🚀

---

## 🎬 Demo Animasi  

🚀 **Lihat Demo API CRUD** 👉 [Klik Di Sini](#)

<p align="center">
  <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExYWxvczQ0b2N0ZHRqZGFhaDRkdXJvdmtobTdmZXllb2NhZWJmbjFjbSZlcD12MV9naWZzX3NlYXJjaCZjdD1n/ZVikW1x3lEtHi/giphy.gif" width="600" />
</p>

---

## 📂 Struktur Direktori CRUD Product
```
📦 proyek-laravel
├── 📂 app
│   ├── 📂 Http
│   │   ├── 📂 Controllers
│   │   │   ├── ProductController.php
│   │   │   └── Api
│   │   │       └── ProductApiController.php
│   │   ├── 📂 Middleware
│   │   └── 📂 Requests
│   ├── 📂 Models
│   │   └── Product.php
│   ├── 📂 Services
│   └── 📂 Providers
├── 📂 routes
│   ├── api.php
│   ├── web.php
├── 📂 database
├── 📂 storage
├── .env
├── artisan
└── composer.json
```
📌 **Penjelasan**:
- **`app/Http/Controllers/ProductController.php`** → Mengelola CRUD Product Untuk Web.
- **`app/Http/Controllers/Api/ProductApiController.php`** → Mengelola API CRUD Product Dengan Autentikasi Token.
- **`app/Models/Product.php`** → Model Product Untuk Eloquent ORM.
- **`routes/api.php`** → Routing Untuk API Menggunakan Sanctum.
- **`routes/web.php`** → Routing Untuk Akses Berbasis Web.

---

## 🚀 Implementasi CRUD Product API Dengan Token

### 🔗 1. Buat Route Product API
Tambahkan Route API Di **`routes/api.php`**

### 🎯 2. Buat Controller Product API
Buat file **`app/Http/Controllers/Api/ProductApiController.php`**

---

## 🔑 Autentikasi dengan Sanctum
Pastikan User Sudah Login Dan Mendapatkan Token. Gunakan Token Ini Saat Mengakses API:
```http
Authorization: Bearer <your_token_here>
```
Contoh Request Dengan Insomnia/Postman:
```bash
curl -X GET "http://127.0.0.1:8000/api/products" -H "Authorization: Bearer <your_token_here>"
```

---

## 🛠️ Instalasi & Setup 
```bash
# Clone Repository
git clone https://github.com/username/repo-name.git

# Masuk Ke Folder Proyek
cd repo-name

# Install Dependencies
composer install

# Copy file .env
cp .env.example .env

# Generate Key
php artisan key:generate

# Jalankan Migrasi Database
php artisan migrate --seed

# Jalankan Server Lokal
php artisan serve
```

---

## 📌 Konsep MVC di Laravel
Laravel menggunakan **MVC (Model-View-Controller)** untuk memisahkan logika aplikasi:
- **Model** → Berinteraksi dengan database menggunakan Eloquent ORM.
- **View** → Menampilkan data dalam bentuk template Blade.
- **Controller** → Menangani request dan mengelola alur aplikasi.

<p align="center">
  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/MVC-Process.svg/1280px-MVC-Process.svg.png" width="500" />
</p>

---

## 🤝 Kontribusi 
🚀 Feel Free Untuk Berkontribusi!
1. **Fork** Repo Ini
2. **Buat Branch Baru** (`git checkout -b fitur-baru`)
3. **Commit Perubahan** (`git commit -m 'Menambahkan fitur X'`)
4. **Push Branch** (`git push origin fitur-baru`)
5. **Buka Pull Request** 🚀

---

## 📄 Lisensi  
MIT License © 2025 - Dibuat Dengan ❤️ Oleh [Abuu 'Ubaadah Muhammad Yaziid Shabriyy](#).


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
