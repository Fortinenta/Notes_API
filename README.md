# Notes API - Laravel REST API

## Deskripsi
REST API untuk sistem manajemen notes dengan autentikasi JWT menggunakan Laravel 9.52.20

## Requirements
- PHP >= 8.0
- Composer
- MySQL
- XAMPP (recommended)
- Laravel Framework 9.52.20

## Instalasi untuk Development
1. Clone repository ini:
   ```bash
   git clone [URL_REPOSITORY_ANDA]
   cd Notes
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Copy environment file:
   ```bash
   cp .env.example .env
   ```

4. Generate application key:
   ```bash
   php artisan key:generate
   ```

5. Konfigurasi database di file .env:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=notes
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. Generate JWT secret key:
   ```bash
   php artisan jwt:secret
   ```

7. Jalankan migration dan seeder:
   ```bash
   php artisan migrate
   php artisan db:seed (jika ada)
   ```

8. Start development server:
   ```bash
   php artisan serve
   ```

## API Endpoints
### Authentication
- POST /api/auth/register - Registrasi user
- POST /api/auth/login - Login user
- POST /api/auth/logout - Logout user
- POST /api/auth/refresh - Refresh token
- GET /api/auth/profile - Get user profile

### Notes Management
- GET /api/notes - Get all user notes
- POST /api/notes - Create new note
- GET /api/notes/{id} - Get specific note
- PUT /api/notes/{id} - Update note
- DELETE /api/notes/{id} - Delete note

## Testing
```bash
php artisan test
```

## API Documentation
- Swagger: [http://localhost:8000/api/documentation](http://localhost:8000/api/documentation)
- Postman Collection: Lihat folder `postman-collection/`

## Database Schema
- Users: id, name, email, password, timestamps
- Notes: id, title, content, user_id, timestamps

## Tech Stack
- Laravel 9.52.20
- MySQL Database
- JWT Authentication
- Swagger Documentation