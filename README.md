# منصة المنشورات | Post Platform

![منصة المنشورات](public/images/screenshot.png)

منصة تدوين تعمل بلارافيل مع لوحة تحكم للمشرفين وواجهة برمجة تطبيقات (API)

## الميزات | Features

### لوحة التحكم | Admin Dashboard
- عمليات إنشاء/قراءة/تحديث/حذف كاملة للمنشورات
- تصفية المنشورات حسب الكاتب أو العنوان
- ترتيب المنشورات حسب تاريخ النشر
- أرشفة وإلغاء أرشفة المنشورات
- إدارة المستخدمين

### ميزات المستخدم | User Features
- إنشاء وإدارة المنشورات الشخصية
- مصادقة باستخدام JWT

### واجهة API العامة | Public API
- تصفح المنشورات (وصول عام)
- إنشاء/تحديث/حذف المنشورات (للمستخدمين المسجلين)
- مصادقة باستخدام JWT

## المتطلبات | Requirements

- PHP 8.0+
- Composer
- MySQL 5.7+
- Node.js 14+ (لأصول الواجهة الأمامية)

## الصور | Screenshots

![لوحة التحكم](public/images/admin-dashboard.png)
*لوحة تحكم المشرف*

![قائمة المنشورات](public/images/posts-list.png)
*قائمة المنشورات*

![واجهة API](public/images/api-docs.png)
*وثائق واجهة API*

## التثبيت | Installation

1. استنسخ المستودع:
   ```bash
   git clone https://github.com/yourusername/post-platform.git
   cd post-platform
