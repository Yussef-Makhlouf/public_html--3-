# 📋 مسارات ملفات لوحة التحكم - Dashboard File Paths

## 🎯 **ملفات العرض (Views)**
```
resources/views/cms/
├── master.blade.php                    # الملف الرئيسي للوحة التحكم
├── sidebar.blade.php                   # الشريط الجانبي
├── home.blade.php                      # الصفحة الرئيسية
├── about_us/
│   ├── create.blade.php               # إنشاء صفحة من نحن
│   ├── edit.blade.php                 # تعديل صفحة من نحن
│   └── index.blade.php                # عرض صفحات من نحن
├── admins/
│   ├── create.blade.php               # إنشاء مدير جديد
│   ├── edit.blade.php                 # تعديل بيانات المدير
│   └── index.blade.php                # عرض قائمة المديرين
├── blogs/
│   ├── create.blade.php               # إنشاء مقال جديد
│   ├── edit.blade.php                 # تعديل المقال
│   └── index.blade.php                # عرض قائمة المقالات
├── branches/
│   ├── create.blade.php               # إنشاء فرع جديد
│   ├── edit.blade.php                 # تعديل بيانات الفرع
│   └── index.blade.php                # عرض قائمة الفروع
├── buys/
│   ├── create.blade.php               # إنشاء عملية شراء
│   ├── edit.blade.php                 # تعديل عملية الشراء
│   ├── index.blade.php                # عرض قائمة المشتريات
│   └── show.blade.php                 # عرض تفاصيل الشراء
├── categories/
│   ├── create.blade.php               # إنشاء فئة جديدة
│   ├── edit.blade.php                 # تعديل الفئة
│   └── index.blade.php                # عرض قائمة الفئات
├── contacts/
│   ├── create.blade.php               # إنشاء جهة اتصال
│   ├── edit.blade.php                 # تعديل جهة الاتصال
│   └── index.blade.php                # عرض قائمة جهات الاتصال
├── offers/
│   ├── create.blade.php               # إنشاء عرض خاص
│   ├── edit.blade.php                 # تعديل العرض الخاص
│   └── index.blade.php                # عرض قائمة العروض الخاصة
├── our_clients/
│   ├── create.blade.php               # إضافة عميل جديد
│   ├── edit.blade.php                 # تعديل بيانات العميل
│   └── index.blade.php                # عرض قائمة العملاء
├── pdfs/
│   ├── create.blade.php               # رفع ملف PDF جديد
│   ├── edit.blade.php                 # تعديل ملف PDF
│   └── index.blade.php                # عرض قائمة ملفات PDF
├── products/
│   ├── create.blade.php               # إنشاء منتج جديد
│   ├── edit.blade.php                 # تعديل المنتج
│   └── index.blade.php                # عرض قائمة المنتجات
├── projects/
│   ├── create.blade.php               # إنشاء مشروع جديد
│   ├── edit.blade.php                 # تعديل المشروع
│   └── index.blade.php                # عرض قائمة المشاريع
├── reservations/
│   ├── create.blade.php               # إنشاء حجز جديد
│   ├── edit.blade.php                 # تعديل الحجز
│   └── index.blade.php                # عرض قائمة الحجوزات
├── reviews/
│   ├── create.blade.php               # إضافة تقييم جديد
│   ├── edit.blade.php                 # تعديل التقييم
│   └── index.blade.php                # عرض قائمة التقييمات
└── services/
    ├── create.blade.php               # إنشاء خدمة جديدة
    ├── edit.blade.php                 # تعديل الخدمة
    └── index.blade.php                # عرض قائمة الخدمات
```

## 🎮 **ملفات التحكم (Controllers)**
```
app/Http/Controllers/
├── AboutUsController.php              # تحكم في صفحات من نحن
├── AdminController.php                # تحكم في المديرين
├── BlogsController.php                # تحكم في المقالات
├── BrancheController.php              # تحكم في الفروع
├── BuyController.php                  # تحكم في المشتريات
├── CategoryController.php             # تحكم في الفئات
├── CityController.php                 # تحكم في المدن
├── ContactController.php              # تحكم في جهات الاتصال
├── HomeController.php                 # تحكم في الصفحة الرئيسية
├── OurClientController.php            # تحكم في العملاء
├── PdfController.php                  # تحكم في ملفات PDF
├── ProductController.php              # تحكم في المنتجات
├── ProjectController.php              # تحكم في المشاريع
├── ReservationController.php          # تحكم في الحجوزات
├── ReviewsController.php              # تحكم في التقييمات
├── ServiceController.php              # تحكم في الخدمات
├── SpecialOfferController.php         # تحكم في العروض الخاصة
└── UserAuthController.php             # تحكم في المصادقة
```

## 🌐 **ملفات الترجمة**
```
lang/
├── ar/dashboard/
│   └── master.php                     # الترجمة العربية
└── en/dashboard/
    └── master.php                     # الترجمة الإنجليزية
```

## 🛣️ **ملفات المسارات**
```
routes/
└── web.php                            # مسارات الويب (يحتوي على مسارات لوحة التحكم)
```

## 📊 **ملفات الأصول (Assets)**
```
public/cms/assets/
├── css/
│   ├── rtl/                           # ملفات CSS للعربية
│   └── ltr/                           # ملفات CSS للإنجليزية
├── js/
│   ├── app.js                         # ملف JavaScript الرئيسي
│   ├── crud.js                        # ملف JavaScript للعمليات
│   ├── custom.js                      # ملف JavaScript مخصص
│   └── vendor/                        # مكتبات JavaScript
├── icons/                             # أيقونات لوحة التحكم
└── fonts/                             # خطوط النصوص
```

## ⚙️ **ملفات التكوين**
```
config/
└── auth.php                           # إعدادات المصادقة
```

## 📁 **ملفات قاعدة البيانات**
```
database/migrations/
├── 2023_06_01_125121_create_admins_table.php    # جدول المديرين
└── 2023_06_15_214350_create_cities_table.php    # جدول المدن
```

## 🏗️ **ملفات النماذج (Models)**
```
app/Models/
├── Admin.php                          # نموذج المدير
├── Blogs.php                          # نموذج المقالات
└── [Other Models...]                  # نماذج أخرى
```

---
**📝 ملاحظة:** جميع هذه الملفات تعمل معاً لتشكيل نظام لوحة التحكم الكامل في مشروع Laravel
