<div>
    <h1>إنشاء شراء جديد</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="row my-3">
            <div class="col-lg-6">
                <label for="name">الاسم</label>
                <input type="text" class="form-control" id="name" placeholder="الاسم" wire:model="name">
                @error('name')
                    <div class="text-danger" id="name-error">{{ $message }}</div>
                @enderror

            </div>

            <div class="col-lg-6">
                <label for="mobile">الجوال</label>
                <input type="text" class="form-control" id="mobile" placeholder="الجوال" wire:model="mobile">
                @error('mobile')
                    <div class="text-danger" id="mobile-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-6">
                <label for="email">الايميل</label>
                <input type="text" class="form-control" id="email" placeholder="الايميل" wire:model="email">
                @error('email')
                    <div class="text-danger" id="email-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label for="expire_date">تاريخ الانتهاء</label>
                <input type="date" class="form-control" id="expire_date" wire:model="expire_date">
                @error('expire_date')
                    <div class="text-danger" id="expire_date-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-6">
                <label for="area">المساحة</label>
                <input type="text" class="form-control" id="area" placeholder="المساحة" wire:model="area">
                @error('area')
                    <div class="text-danger" id="area-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6" wire:ignore>
                <label>الخدمة</label>
                <select class="form-select" id="service_id" name="service_id" wire:model="service_id">
                    <option value="" disabled>اختر الخدمة</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->trans_title }}</option>
                    @endforeach
                </select>
                @error('service_id')
                    <div class="text-danger" id="service_id-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-6">
                <label for="count">العدد</label>
                <input type="text" class="form-control" id="count" placeholder="العدد" wire:model="count">
                @error('count')
                    <div class="text-danger" id="count-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6">
                <label>المنتج</label>
                <select class="form-select" id="product_id" name="product_id" wire:loading.attr="disabled"
                    wire:model="product_id">
                    <option value="" disabled>اختر المنتج</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->trans_name }}</option>
                    @endforeach
                </select>
                @error('product_id')
                    <div class="text-danger" id="product_id-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-6" wire:ignore>
                <label>نوع التوصيل</label>
                <select class="form-select" id="delivery_type" name="delivery_type" wire:model="delivery_type">
                    <option value="" selected>اختر نوع التوصيل</option>
                    <option value="delivery">مع توصيل</option>
                    <option value="without_delivery">بدون توصيل</option>
                </select>
                @error('delivery_type')
                    <div class="text-danger" id="delivery_type-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="message">الرسالة</label>
                <textarea class="form-control" id="message" placeholder="الرسالة" wire:model="message"></textarea>
                @error('message')
                    <div class="text-danger" id="message-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-6" id="cityContainer" wire:ignore>
                <label>المدينة</label>
                <select class="form-select" id="city_id" name="city_id" wire:model="city_id">
                    <option value="" disabled>اختر المدينة</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('city_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6" id="streetContainer" wire:ignore>
                <label>الشارع</label>
                <input type="text" class="form-control" id="street" name="street" wire:model="street">
                @error('street')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6" id="addressContainer" wire:ignore>
            <label>العنوان</label>
            <textarea class="form-control" id="address" name="address" wire:model="address"></textarea>
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-6" id="branchIdContainer" wire:ignore>
            <label>الفرع</label>
            <select class="form-select" id="branch_id" name="branch_id" wire:model="branch_id">
                <option value="" disabled>اختر الفرع</option>
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->trans_name }}</option>
                @endforeach
            </select>
            @error('branch_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <button type="submit" class="btn btn-primary" id="create-button">انشاء</button>
        </div>
    </form>

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('BuyAdded', (data) => {
                Livewire.emit('refreshBuys');
                Swal.fire({
                    icon: 'success',
                    title: 'تمت الإضافة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('BuyError', (data) => {
                Livewire.emit('refreshBuys');
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التخزين',
                    text: data.message
                });
            });
        });

        function hideErrors() {
            var nameError = document.getElementById('name-error');
            if (nameError) {
                nameError.style.display = 'none';
            }

            var mobileError = document.getElementById('mobile-error');
            if (mobileError) {
                mobileError.style.display = 'none';
            }

            var emailError = document.getElementById('email-error');
            if (emailError) {
                emailError.style.display = 'none';
            }
            var areaError = document.getElementById('area-error');
            if (areaError) {
                areaError.style.display = 'none';
            }
            var streetError = document.getElementById('street-error');
            if (streetError) {
                streetError.style.display = 'none';
            }
            var service_idError = document.getElementById('service_id-error');
            if (service_idError) {
                service_idError.style.display = 'none';
            }
            var city_idError = document.getElementById('city_id-error');
            if (city_idError) {
                city_idError.style.display = 'none';
            }
            var messageError = document.getElementById('message-error');
            if (messageError) {
                messageError.style.display = 'none';
            }
            var expire_dateError = document.getElementById('expire_date-error');
            if (expire_dateError) {
                expire_dateError.style.display = 'none';
            }
            var delivery_typeError = document.getElementById('delivery_type-error');
            if (delivery_typeError) {
                delivery_typeError.style.display = 'none';
            }
            var countError = document.getElementById('count-error');
            if (countError) {
                countError.style.display = 'none';
            }
            var addressError = document.getElementById('address-error');
            if (addressError) {
                addressError.style.display = 'none';
            }
            var branch_idError = document.getElementById('branch_id-error');
            if (branch_idError) {
                branch_idError.style.display = 'none';
            }
        }
        // قم بتعريف متغير للاحتفاظ بمرجع إلى حقول الإدخال ومراقبة تغييراتها
        const deliveryTypeSelect = document.getElementById('delivery_type');
        const cityContainer = document.getElementById('cityContainer');
        const streetContainer = document.getElementById('streetContainer');
        const addressContainer = document.getElementById('addressContainer');
        const branchIdContainer = document.getElementById('branchIdContainer');
        cityContainer.style.display = 'none';
        streetContainer.style.display = 'none';
        addressContainer.style.display = 'none';
        branchIdContainer.style.display = 'none';
        // قم بإخفاء/إظهار حقول الإدخال عند تغيير نوع التوصيل
        deliveryTypeSelect.addEventListener('change', function() {

            const selectedOption = deliveryTypeSelect.options[deliveryTypeSelect.selectedIndex].value;
            console.log(selectedOption);
            if (selectedOption === 'without_delivery') {
                cityContainer.style.display = 'none';
                console.log(cityContainer);
                streetContainer.style.display = 'none';
                addressContainer.style.display = 'none';
                branchIdContainer.style.display = 'grid';
            } else {
                cityContainer.style.display = 'grid';
                streetContainer.style.display = 'grid';
                addressContainer.style.display = 'grid';
                branchIdContainer.style.display = 'none';
            }
        });
    </script>
    <script>
        var createButton = document.getElementById('create-button');
        createButton.addEventListener('click', function() {
            setTimeout(function() {
                hideErrors();
            }, 1000);
        });
    </script>
</div>
