# 🏗️ هيكل المشروع الكامل - Complete Project Structure

## 📁 **الجذر الرئيسي (Root Directory)**
```
e:\public_html (3)\
├── app\                                # منطق التطبيق
├── artisan                            # سطر أوامر Laravel
├── bootstrap\                         # ملفات التهيئة
├── composer.json                      # تبعيات PHP
├── composer.lock                      # قفل التبعيات
├── config\                            # ملفات التكوين
├── database\                          # قاعدة البيانات
├── lang\                              # ملفات الترجمة
├── public\                            # الملفات العامة
├── resources\                         # الموارد (عروض، CSS، JS)
├── routes\                            # ملفات المسارات
├── storage\                           # التخزين
├── tests\                             # الاختبارات
└── vendor\                            # مكتبات PHP
```

---

## 🎯 **مجلد التطبيق (app/)**
```
app\
├── Actions\                           # إجراءات Fortify
│   └── Fortify\
│       ├── CreateNewUser.php
│       ├── PasswordValidationRules.php
│       ├── ResetUserPassword.php
│       ├── UpdateUserPassword.php
│       └── UpdateUserProfileInformation.php
├── Console\                           # أوامر Artisan
│   └── Kernel.php
├── Exceptions\                        # معالجة الأخطاء
│   └── Handler.php
├── Http\                              # طبقة HTTP
│   ├── Controllers\                   # المتحكمات
│   │   ├── AboutUsController.php
│   │   ├── AdminController.php
│   │   ├── BlogsController.php
│   │   ├── BrancheController.php
│   │   ├── BuyController.php
│   │   ├── CategoryController.php
│   │   ├── CityController.php
│   │   ├── ContactController.php
│   │   ├── Controller.php
│   │   ├── front\
│   │   │   └── FrontController.php
│   │   ├── HomeController.php
│   │   ├── OurClientController.php
│   │   ├── PdfController.php
│   │   ├── ProductController.php
│   │   ├── ProjectController.php
│   │   ├── ReservationController.php
│   │   ├── ReviewsController.php
│   │   ├── ServiceController.php
│   │   ├── SpecialOfferController.php
│   │   └── UserAuthController.php
│   ├── Kernel.php                     # نواة HTTP
│   ├── Livewire\                      # مكونات Livewire
│   │   ├── AboutUs\
│   │   │   ├── AboutUsCreate.php
│   │   │   ├── AboutUsEdit.php
│   │   │   └── AboutUsIndex.php
│   │   ├── Blogs\
│   │   │   ├── BlogsCreate.php
│   │   │   ├── BlogsEdit.php
│   │   │   └── BlogsIndex.php
│   │   ├── Branches\
│   │   │   ├── BranchesCreate.php
│   │   │   ├── BranchesEdit.php
│   │   │   └── BranchesIndex.php
│   │   ├── Buys\
│   │   │   ├── BuysCreate.php
│   │   │   ├── BuysEdit.php
│   │   │   ├── BuysIndex.php
│   │   │   └── BuysShow.php
│   │   ├── Categories\
│   │   │   ├── CategoriesCreate.php
│   │   │   ├── CategoriesEdit.php
│   │   │   └── CategoriesIndex.php
│   │   ├── Contacts\
│   │   │   ├── ContactsCreate.php
│   │   │   ├── ContactsEdit.php
│   │   │   └── ContactsIndex.php
│   │   ├── Front\
│   │   │   └── Contact\
│   │   │       ├── BuysCreate.php
│   │   │       ├── ContactsCreate.php
│   │   │       ├── IndexCreate.php
│   │   │       └── ReservationsCreate.php
│   │   ├── Offers\
│   │   │   ├── OffersCreate.php
│   │   │   ├── OffersEdit.php
│   │   │   └── OffersIndex.php
│   │   ├── OurClients\
│   │   │   ├── OurClientsCreate.php
│   │   │   ├── OurClientsEdit.php
│   │   │   └── OurClientsIndex.php
│   │   ├── Pdfs\
│   │   │   ├── PdfsCreate.php
│   │   │   ├── PdfsEdit.php
│   │   │   └── PdfsIndex.php
│   │   ├── Products\
│   │   │   ├── ProductsCreate.php
│   │   │   ├── ProductsEdit.php
│   │   │   └── ProductsIndex.php
│   │   ├── Projects\
│   │   │   ├── ProjectsCreate.php
│   │   │   ├── ProjectsEdit.php
│   │   │   └── ProjectsIndex.php
│   │   ├── Reservations\
│   │   │   ├── ReservationsCreate.php
│   │   │   ├── ReservationsEdit.php
│   │   │   └── ReservationsIndex.php
│   │   ├── Reviews\
│   │   │   ├── ReviewsCreate.php
│   │   │   ├── ReviewsEdit.php
│   │   │   └── ReviewsIndex.php
│   │   ├── ServicesCreate.php
│   │   ├── ServicesEdit.php
│   │   └── ServicesIndex.php
│   └── Middleware\                    # الوسطاء
│       ├── Authenticate.php
│       ├── EncryptCookies.php
│       ├── PreventRequestsDuringMaintenance.php
│       ├── RedirectIfAuthenticated.php
│       ├── RedirectToDefaultPrefix.php
│       ├── TrimStrings.php
│       ├── TrustHosts.php
│       ├── TrustProxies.php
│       └── VerifyCsrfToken.php
├── Models\                            # النماذج
│   ├── AboutUs.php
│   ├── Admin.php
│   ├── Blogs.php
│   ├── Branche.php
│   ├── Buy.php
│   ├── Category.php
│   ├── City.php
│   ├── Contact.php
│   ├── OurClient.php
│   ├── Pdf.php
│   ├── Product.php
│   ├── Project.php
│   ├── Reservation.php
│   ├── Reviews.php
│   ├── Service.php
│   ├── SpecialOffer.php
│   └── User.php
├── Providers\                         # مقدمي الخدمة
│   ├── AppServiceProvider.php
│   ├── AuthServiceProvider.php
│   ├── BroadcastServiceProvider.php
│   ├── EventServiceProvider.php
│   ├── FortifyServiceProvider.php
│   └── RouteServiceProvider.php
└── Traits\                           # السمات
    ├── Trans.php
    └── UserTypeTrait.php
```

---

## ⚙️ **ملفات التكوين (config/)**
```
config\
├── app.php                            # إعدادات التطبيق
├── auth.php                           # إعدادات المصادقة
├── broadcasting.php                   # إعدادات البث
├── cache.php                          # إعدادات التخزين المؤقت
├── cors.php                           # إعدادات CORS
├── database.php                       # إعدادات قاعدة البيانات
├── filesystems.php                    # إعدادات نظام الملفات
├── fortify.php                        # إعدادات Fortify
├── hashing.php                        # إعدادات التشفير
├── laravellocalization.php            # إعدادات الترجمة
├── livewire.php                       # إعدادات Livewire
├── logging.php                        # إعدادات السجلات
├── mail.php                           # إعدادات البريد
├── openweather.php                    # إعدادات الطقس
├── queue.php                          # إعدادات الطوابير
├── sanctum.php                        # إعدادات Sanctum
├── services.php                       # إعدادات الخدمات
├── session.php                        # إعدادات الجلسات
└── view.php                           # إعدادات العروض
```

---

## 🗄️ **قاعدة البيانات (database/)**
```
database\
├── cities.json                        # بيانات المدن
├── factories\                         # مصانع البيانات
│   ├── AboutUsFactory.php
│   ├── BlogsFactory.php
│   ├── BrancheFactory.php
│   ├── BuyFactory.php
│   ├── CityFactory.php
│   ├── ContactFactory.php
│   ├── OurClientFactory.php
│   ├── PdfFactory.php
│   ├── ProductFactory.php
│   ├── ProjectFactory.php
│   ├── ReservationFactory.php
│   ├── ReviewsFactory.php
│   ├── ServiceFactory.php
│   └── UserFactory.php
├── migrations\                        # ملفات الهجرة
│   └── [25 ملف هجرة]
└── seeders\                          # بذور البيانات
    ├── AboutUsSeeder.php
    ├── AdminSeeder.php
    ├── BlogsSeeder.php
    ├── BrancheSeeder.php
    ├── BuySeeder.php
    ├── CitiesTableSeeder.php
    ├── CitySeeder.php
    ├── ContactSeeder.php
    ├── DatabaseSeeder.php
    ├── OurClientSeeder.php
    ├── PdfSeeder.php
    ├── ProductSeeder.php
    ├── ProjectSeeder.php
    ├── ReservationSeeder.php
    ├── ReviewsSeeder.php
    └── ServiceSeeder.php
```

---

## 🌐 **الترجمة (lang/)**
```
lang\
├── ar\                               # العربية
│   ├── auth.php
│   ├── dashboard\
│   │   └── master.php
│   ├── front\
│   │   └── master.php
│   ├── pagination.php
│   ├── passwords.php
│   └── validation.php
├── en\                               # الإنجليزية
│   ├── auth.php
│   ├── dashboard\
│   │   └── master.php
│   ├── front\
│   │   └── master.php
│   ├── pagination.php
│   ├── passwords.php
│   └── validation.php
└── en.json
```

---

## 🌍 **الملفات العامة (public/)**
```
public\
├── cms\                              # أصول لوحة التحكم
│   └── assets\
│       ├── css\
│       │   ├── ltr\                  # CSS للإنجليزية
│       │   └── rtl\                  # CSS للعربية
│       ├── demo\                     # ملفات العرض التوضيحي
│       ├── fonts\                    # الخطوط
│       ├── icons\                    # الأيقونات
│       ├── images\                   # الصور
│       ├── js\                       # ملفات JavaScript
│       └── scss\                     # ملفات SCSS
├── front\                            # أصول الموقع الأمامي
│   └── assets\
│       ├── css\
│       ├── images\
│       └── js\
├── favicon.ico
├── index.php                         # نقطة الدخول
├── robots.txt
├── storage\                          # الملفات المخزنة
└── vendor\                           # مكتبات JavaScript
```

---

## 🎨 **الموارد (resources/)**
```
resources\
├── css\
│   └── app.css                       # CSS الرئيسي
├── js\
│   ├── app.js                        # JavaScript الرئيسي
│   └── bootstrap.js                  # Bootstrap JS
└── views\                            # ملفات العرض
    ├── auth\                         # صفحات المصادقة
    │   ├── confirm-password.blade.php
    │   ├── forgot-password.blade.php
    │   ├── list.blade.php
    │   ├── login.blade.php
    │   ├── register.blade.php
    │   ├── reset-password.blade.php
    │   ├── two-factor-challenge.blade.php
    │   └── verify-email.blade.php
    ├── cms\                          # لوحة التحكم
    │   ├── about_us\
    │   ├── admins\
    │   ├── blogs\
    │   ├── branches\
    │   ├── buys\
    │   ├── categories\
    │   ├── contacts\
    │   ├── home.blade.php
    │   ├── master.blade.php
    │   ├── offers\
    │   ├── our_clients\
    │   ├── pdfs\
    │   ├── products\
    │   ├── projects\
    │   ├── reservations\
    │   ├── reviews\
    │   ├── services\
    │   └── sidebar.blade.php
    ├── frontend\                     # الموقع الأمامي
    │   ├── about.blade.php
    │   ├── blog_details.blade.php
    │   ├── blog.blade.php
    │   ├── booking.blade.php
    │   ├── clients.blade.php
    │   ├── contactus.blade.php
    │   ├── index.blade.php
    │   ├── master.blade.php
    │   ├── policy.blade.php
    │   ├── products_details.blade.php
    │   ├── products.blade.php
    │   ├── services.blade.php
    │   ├── terms_and_conditions.blade.php
    │   ├── works_details.blade.php
    │   └── works.blade.php
    ├── livewire\                     # مكونات Livewire
    │   ├── about-us\
    │   ├── blogs\
    │   ├── branches\
    │   ├── buys\
    │   ├── categories\
    │   ├── contacts\
    │   ├── front\
    │   ├── offers\
    │   ├── our-clients\
    │   ├── pdfs\
    │   ├── products\
    │   ├── projects\
    │   ├── reservations\
    │   ├── reviews\
    │   └── services\
    └── welcome.blade.php
```

---

## 🛣️ **المسارات (routes/)**
```
routes\
├── api.php                           # مسارات API
├── channels.php                      # مسارات البث
├── console.php                       # أوامر Artisan
└── web.php                           # مسارات الويب
```

---

## 💾 **التخزين (storage/)**
```
storage\
├── app\
│   ├── livewire-tmp\                 # ملفات Livewire المؤقتة
│   └── public\                       # الملفات العامة
├── debugbar\                         # سجلات Debugbar
├── framework\
│   ├── cache\                        # التخزين المؤقت
│   ├── sessions\                     # الجلسات
│   ├── testing\                      # ملفات الاختبار
│   └── views\                        # عروض مُجمعة
└── logs\
    └── laravel.log                   # سجل Laravel
```

---

## 🧪 **الاختبارات (tests/)**
```
tests\
├── CreatesApplication.php
├── Feature\
│   └── ExampleTest.php
├── TestCase.php
└── Unit\
    └── ExampleTest.php
```

---

## 📦 **المكتبات (vendor/)**
```
vendor\
├── laravel\                          # إطار Laravel
├── livewire\                         # مكتبة Livewire
├── mcamara\                          # مكتبة الترجمة
├── spatie\                           # مكتبات Spatie
├── symfony\                          # مكونات Symfony
└── [مكتبات أخرى...]
```

---

## 📋 **ملفات إضافية**
```
├── .env                              # متغيرات البيئة
├── .env.example                      # مثال متغيرات البيئة
├── .gitignore                        # ملفات Git المُتجاهلة
├── package.json                      # تبعيات Node.js
├── webpack.mix.js                    # إعدادات Mix
└── README.md                         # ملف README
```

---

**📝 ملاحظة:** هذا هو الهيكل الكامل لمشروع Laravel مع لوحة تحكم وموقع أمامي متعدد اللغات
