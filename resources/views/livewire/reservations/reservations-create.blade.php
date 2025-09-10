<div>
    <h1>إنشاء حجز جديد</h1>

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
                <label>الخدمة</label>
                <select class="form-select" id="service_id" wire:model="service_id">
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->trans_title }}</option>
                    @endforeach
                </select>
                @error('service_id')
                    <div class="text-danger" id="service_id-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6">
                <label>الصالة</label>
                <select class="form-select" id="hall" name="hall" wire:model="hall">
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
                <select class="form-select" id="city_id" name="city_id" wire:model="city_id">
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
                <label for="message">الرسالة</label>
                <textarea class="form-control" id="message" placeholder="الرسالة" wire:model="message"></textarea>
                @error('message')
                    <div class="text-danger" id="message-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group my-3">
            <button type="submit" class="btn btn-dark" id="create-button">إنشاء</button>
        </div>
    </form>

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('ReservationAdded', (data) => {
                Livewire.emit('refreshReservations');
                Swal.fire({
                    icon: 'success',
                    title: 'تمت الإضافة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('ReservationError', (data) => {
                Livewire.emit('refreshReservations');
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
            var dateError = document.getElementById('date-error');
            if (dateError) {
                dateError.style.display = 'none';
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
            var hallError = document.getElementById('hall-error');
            if (hallError) {
                hallError.style.display = 'none';
            }
            var messageError = document.getElementById('message-error');
            if (messageError) {
                messageError.style.display = 'none';
            }
        }

        var createButton = document.getElementById('create-button');
        createButton.addEventListener('click', function() {
            setTimeout(function() {
                hideErrors();
            }, 1000);
        });
    </script>
</div>
