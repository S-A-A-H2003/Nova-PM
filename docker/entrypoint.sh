#!/bin/bash
set -e

# Render يحدد المنفذ عبر متغير البيئة PORT، نستخدم قيمة افتراضية 8080 محلياً
export PORT="${PORT:-8080}"

# تعويض المتغير PORT داخل قالب nginx وإنشاء ملف الإعداد الفعلي
envsubst '${PORT}' < /etc/nginx/templates/default.conf.template > /etc/nginx/http.d/default.conf

# نسخ ملف .env من متغيرات البيئة إذا لم يكن موجوداً (Render يوفرها كـ Environment Variables عادة)
if [ ! -f /var/www/html/.env ]; then
    cp /var/www/html/.env.example /var/www/html/.env || true
fi

cd /var/www/html

php artisan key:generate --force || true

# تفريغ وإعادة بناء كاش الإعدادات والراوتس والفيوهات لتحسين الأداء
php artisan config:cache
php artisan route:cache
php artisan view:cache

# تشغيل الميغريشن تلقائياً عند كل نشر (يمكن حذف هذا السطر إذا تفضل التشغيل اليدوي)
php artisan migrate --force

exec "$@"
