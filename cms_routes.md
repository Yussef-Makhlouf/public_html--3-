# 🎯 مسارات CMS - لوحة التحكم

## 🔐 **مسارات تسجيل الدخول**
```
GET  /cms/{guard}/login              # صفحة تسجيل الدخول
     مثال: /cms/admin/login
```

## 🏠 **الصفحة الرئيسية**
```
GET  /home                          # الصفحة الرئيسية للوحة التحكم
GET  /chart-data                    # بيانات الرسوم البيانية
```

## 📊 **مسارات إدارة المحتوى (CMS Admin)**

### **1. الفئات (Categories)**
```
GET     /cms/admin/categories           # عرض قائمة الفئات
GET     /cms/admin/categories/create    # صفحة إنشاء فئة جديدة
POST    /cms/admin/categories           # حفظ فئة جديدة
GET     /cms/admin/categories/{id}      # عرض فئة محددة
GET     /cms/admin/categories/{id}/edit # صفحة تعديل فئة
PUT     /cms/admin/categories/{id}      # تحديث فئة
DELETE  /cms/admin/categories/{id}      # حذف فئة
```

### **2. المنتجات (Products)**
```
GET     /cms/admin/products             # عرض قائمة المنتجات
GET     /cms/admin/products/create      # صفحة إنشاء منتج جديد
POST    /cms/admin/products             # حفظ منتج جديد
GET     /cms/admin/products/{id}        # عرض منتج محدد
GET     /cms/admin/products/{id}/edit   # صفحة تعديل منتج
PUT     /cms/admin/products/{id}        # تحديث منتج
DELETE  /cms/admin/products/{id}        # حذف منتج
```

### **3. الخدمات (Services)**
```
GET     /cms/admin/services             # عرض قائمة الخدمات
GET     /cms/admin/services/create      # صفحة إنشاء خدمة جديدة
POST    /cms/admin/services             # حفظ خدمة جديدة
GET     /cms/admin/services/{id}        # عرض خدمة محددة
GET     /cms/admin/services/{id}/edit   # صفحة تعديل خدمة
PUT     /cms/admin/services/{id}        # تحديث خدمة
DELETE  /cms/admin/services/{id}        # حذف خدمة
```

### **4. الفروع (Branches)**
```
GET     /cms/admin/branches             # عرض قائمة الفروع
GET     /cms/admin/branches/create      # صفحة إنشاء فرع جديد
POST    /cms/admin/branches             # حفظ فرع جديد
GET     /cms/admin/branches/{id}        # عرض فرع محدد
GET     /cms/admin/branches/{id}/edit   # صفحة تعديل فرع
PUT     /cms/admin/branches/{id}        # تحديث فرع
DELETE  /cms/admin/branches/{id}        # حذف فرع
```

### **5. المقالات (Blogs)**
```
GET     /cms/admin/blogs                # عرض قائمة المقالات
GET     /cms/admin/blogs/create         # صفحة إنشاء مقال جديد
POST    /cms/admin/blogs                # حفظ مقال جديد
GET     /cms/admin/blogs/{id}           # عرض مقال محدد
GET     /cms/admin/blogs/{id}/edit      # صفحة تعديل مقال
PUT     /cms/admin/blogs/{id}           # تحديث مقال
DELETE  /cms/admin/blogs/{id}           # حذف مقال
```

### **6. من نحن (About Us)**
```
GET     /cms/admin/about_us             # عرض قائمة صفحات من نحن
GET     /cms/admin/about_us/create      # صفحة إنشاء صفحة من نحن جديدة
POST    /cms/admin/about_us             # حفظ صفحة من نحن جديدة
GET     /cms/admin/about_us/{id}        # عرض صفحة من نحن محددة
GET     /cms/admin/about_us/{id}/edit   # صفحة تعديل صفحة من نحن
PUT     /cms/admin/about_us/{id}        # تحديث صفحة من نحن
DELETE  /cms/admin/about_us/{id}        # حذف صفحة من نحن
```

### **7. عملاؤنا (Our Clients)**
```
GET     /cms/admin/our-clients          # عرض قائمة العملاء
GET     /cms/admin/our-clients/create   # صفحة إضافة عميل جديد
POST    /cms/admin/our-clients          # حفظ عميل جديد
GET     /cms/admin/our-clients/{id}     # عرض عميل محدد
GET     /cms/admin/our-clients/{id}/edit # صفحة تعديل عميل
PUT     /cms/admin/our-clients/{id}     # تحديث عميل
DELETE  /cms/admin/our-clients/{id}     # حذف عميل
```

### **8. التقييمات (Reviews)**
```
GET     /cms/admin/reviews              # عرض قائمة التقييمات
GET     /cms/admin/reviews/create       # صفحة إضافة تقييم جديد
POST    /cms/admin/reviews              # حفظ تقييم جديد
GET     /cms/admin/reviews/{id}         # عرض تقييم محدد
GET     /cms/admin/reviews/{id}/edit    # صفحة تعديل تقييم
PUT     /cms/admin/reviews/{id}         # تحديث تقييم
DELETE  /cms/admin/reviews/{id}         # حذف تقييم
```

### **9. جهات الاتصال (Contacts)**
```
GET     /cms/admin/contacts             # عرض قائمة جهات الاتصال
GET     /cms/admin/contacts/create      # صفحة إضافة جهة اتصال جديدة
POST    /cms/admin/contacts             # حفظ جهة اتصال جديدة
GET     /cms/admin/contacts/{id}        # عرض جهة اتصال محددة
GET     /cms/admin/contacts/{id}/edit   # صفحة تعديل جهة اتصال
PUT     /cms/admin/contacts/{id}        # تحديث جهة اتصال
DELETE  /cms/admin/contacts/{id}        # حذف جهة اتصال
```

### **10. الحجوزات (Reservations)**
```
GET     /cms/admin/reservations         # عرض قائمة الحجوزات
GET     /cms/admin/reservations/create  # صفحة إنشاء حجز جديد
POST    /cms/admin/reservations         # حفظ حجز جديد
GET     /cms/admin/reservations/{id}    # عرض حجز محدد
GET     /cms/admin/reservations/{id}/edit # صفحة تعديل حجز
PUT     /cms/admin/reservations/{id}    # تحديث حجز
DELETE  /cms/admin/reservations/{id}    # حذف حجز
```

### **11. المشتريات (Buys)**
```
GET     /cms/admin/buys                 # عرض قائمة المشتريات
GET     /cms/admin/buys/create          # صفحة إنشاء عملية شراء جديدة
POST    /cms/admin/buys                 # حفظ عملية شراء جديدة
GET     /cms/admin/buys/{id}            # عرض عملية شراء محددة
GET     /cms/admin/buys/{id}/edit       # صفحة تعديل عملية شراء
PUT     /cms/admin/buys/{id}            # تحديث عملية شراء
DELETE  /cms/admin/buys/{id}            # حذف عملية شراء
```

### **12. ملفات PDF**
```
GET     /cms/admin/pdfs                 # عرض قائمة ملفات PDF
GET     /cms/admin/pdfs/create          # صفحة رفع ملف PDF جديد
POST    /cms/admin/pdfs                 # حفظ ملف PDF جديد
GET     /cms/admin/pdfs/{id}            # عرض ملف PDF محدد
GET     /cms/admin/pdfs/{id}/edit       # صفحة تعديل ملف PDF
PUT     /cms/admin/pdfs/{id}            # تحديث ملف PDF
DELETE  /cms/admin/pdfs/{id}            # حذف ملف PDF
```

### **13. العروض الخاصة (Special Offers)**
```
GET     /cms/admin/special_offers       # عرض قائمة العروض الخاصة
GET     /cms/admin/special_offers/create # صفحة إنشاء عرض خاص جديد
POST    /cms/admin/special_offers       # حفظ عرض خاص جديد
GET     /cms/admin/special_offers/{id}  # عرض عرض خاص محدد
GET     /cms/admin/special_offers/{id}/edit # صفحة تعديل عرض خاص
PUT     /cms/admin/special_offers/{id}  # تحديث عرض خاص
DELETE  /cms/admin/special_offers/{id}  # حذف عرض خاص
```

### **14. المشاريع (Projects)**
```
GET     /cms/admin/projects             # عرض قائمة المشاريع
GET     /cms/admin/projects/create      # صفحة إنشاء مشروع جديد
POST    /cms/admin/projects             # حفظ مشروع جديد
GET     /cms/admin/projects/{id}        # عرض مشروع محدد
GET     /cms/admin/projects/{id}/edit   # صفحة تعديل مشروع
PUT     /cms/admin/projects/{id}        # تحديث مشروع
DELETE  /cms/admin/projects/{id}        # حذف مشروع
```

### **15. المديرين (Admins)**
```
GET     /cms/admin/admins               # عرض قائمة المديرين
GET     /cms/admin/admins/create        # صفحة إنشاء مدير جديد
POST    /cms/admin/admins               # حفظ مدير جديد
GET     /cms/admin/admins/{id}          # عرض مدير محدد
GET     /cms/admin/admins/{id}/edit     # صفحة تعديل مدير
PUT     /cms/admin/admins/{id}          # تحديث مدير
DELETE  /cms/admin/admins/{id}          # حذف مدير
POST    /cms/admin/admins_update/{id}   # تحديث خاص للمديرين
```

---

## 🔒 **الحماية والأمان**
- جميع مسارات CMS محمية بـ `auth:admin` middleware
- مسارات تسجيل الدخول محمية بـ `guest:admin` middleware
- جميع المسارات تدعم الترجمة متعددة اللغات

---

## 📝 **ملاحظات مهمة**
- جميع المسارات تبدأ بـ `/cms/admin/` للوحة التحكم
- مسارات تسجيل الدخول تبدأ بـ `/cms/{guard}/login`
- الصفحة الرئيسية متاحة على `/home`
- جميع المسارات تدعم HTTP Methods المختلفة (GET, POST, PUT, DELETE)