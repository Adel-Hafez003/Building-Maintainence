# Building Maintenance (Laravel API)

Back-end Laravel لإدارة طلبات صيانة المباني:
- **Tenants** يرسلون طلبات صيانة.
- **Technicians** لديهم ملف مهني ويتم إسناد الطلبات لهم.
- **Admin** يدير الفنيين والخدمات والمناطق.

> التقنيات: Laravel 11, Sanctum, Eloquent API Resources, MySQL.

---

## المتطلبات
- PHP 8.2+
- Composer
- MySQL/MariaDB
- (اختياري) Node.js

---

## التشغيل المحلي

```bash
# 1) نسخ ملف البيئة
cp .env.example .env

# 2) تثبيت الحزم
composer install

# 3) توليد مفتاح التطبيق
php artisan key:generate

# 4) عدّل إعدادات قاعدة البيانات في .env (DB_DATABASE/DB_USERNAME/DB_PASSWORD)

# 5) الهجرة (+ Seeder اختياري إن موجود)
php artisan migrate --seed

# 6) تشغيل السيرفر
php artisan serve
# http://127.0.0.1:8000


