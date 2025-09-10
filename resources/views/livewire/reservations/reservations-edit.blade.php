<div>
    <h1>تعديل التدوينة</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="update" enctype="multipart/form-data">
        <div class="row my-3">
            <div class="col-lg-6">
                <label for="name">الاسم</label>
                <input type="text" class="form-control" id="name" placeholder="الﺇسم" wire:model="name">
                @error('name')
                    <div class="text-danger" id="name-error">{{ $message }}</div>
                @enderror

            </div>

            <div class="col-lg-6">
                <label for="mobile">الوصف</label>
                <input type="text" class="form-control" id="mobile" placeholder="الجوال" wire:model="mobile">
                @error('mobile')
                    <div class="text-danger" id="mobile-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-6">
                <label for="email">الايميل</label>
                <input type="text" class="form-control" id="email" placeholder="الجوال" wire:model="email">
                @error('email')
                    <div class="text-danger" id="email-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label for="date">التاريخ</label>
                <input type="date" class="form-control" id="date" wire:model="date">
                @error('date')
                    <div class="text-danger" id="date-error">{{ $message }}</div>
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
            <div class="col-lg-6">
                <label for="street">الشارع</label>
                <input type="text" class="form-control" id="street" placeholder="الشارع" wire:model="street">
                @error('street')
                    <div class="text-danger" id="street-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-6">
                <label for="message">الرسالة</label>
                <textarea class="form-control" id="message" placeholder="الرسالة" wire:model="message"></textarea>
                @error('message')
                    <div class="text-danger" id="message-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6">
                <label>الصالة</label>
                <select class="form-control select" id="hall" name="hall" wire:model="hall">
                    <option value="indoor">داخلية</option>
                    <option value="outdoor">خارجية</option>
                </select>
                @error('hall')
                    <div class="text-danger" id="hall-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-6">
                <label>المدينة</label>
                <select class="form-control select" id="city_id" name="city_id" wire:model="city_id">
                    <option value="" disabled>اختر المدينة</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('city_id')
                    <div class="text-danger" id="city_id-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6">
                <label>الخدمة</label>
                <select class="form-control select" id="service_id" name="service_id" wire:model="service_id">
                    <option value="" disabled>اختر الخدمة</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                    @endforeach
                </select>
                @error('service_id')
                    <div class="text-danger" id="service_id-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group my-3">
            <button type="submit" class="btn btn-primary">تعديل</button>
        </div>
    </form>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('ReservationUpdated', (data) => {
                Swal.fire({
                    icon: 'success',
                    title: 'تم تحديث التدوينة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('ReservationError', (data) => {
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التحديث',
                    text: data.message
                });
            });
        });
    </script>

</div>
