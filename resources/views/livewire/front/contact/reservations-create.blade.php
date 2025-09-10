<div>
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <input type="text" placeholder="{{ trans('front/index.الاسم') }}" name="name" wire:model="name" required>
        @error('name')
            <div class="text-danger" id="name-error">{{ $message }}</div>
        @enderror
        <input type="text" placeholder="{{ trans('front/index.المساحة') }}" name="area" wire:model="area" required>
        @error('area')
            <div class="text-danger" id="area-error">{{ $message }}</div>
        @enderror
        <input type="text" placeholder="{{ trans('front/index.الشارع') }}" name="street" wire:model="street"
            required>
        @error('street')
            <div class="text-danger" id="street-error">{{ $message }}</div>
        @enderror
        <input type="email" placeholder="{{ trans('front/index.البريد الالكتروني') }}" name="email"
            wire:model="email" required>
        @error('email')
            <div class="text-danger" id="email-error">{{ $message }}</div>
        @enderror
        <input type="tel" placeholder="{{ trans('dashboard/master.mobile') }}" name="mobile" wire:model="mobile"
            required>
        @error('mobile')
            <div class="text-danger" id="mobile-error">{{ $message }}</div>
        @enderror
        <input type="text" placeholder="{{ trans('front/index.تاريخ الحفل') }}" name="date" wire:model="date"
            required onfocus="(this.type='date')">
        @error('date')
            <div class="text-danger" id="date-error">{{ $message }}</div>
        @enderror
        <select name="service_id" wire:model="service_id">
            <option value="">{{ trans('front/index.اختر الخدمة') }}</option>
            @foreach ($services as $service)
                <option value="{{ $service->id }}">{{ $service->trans_title }}</option>
            @endforeach
        </select>
        @error('service_id')
            <div class="text-danger" id="service_id-error">{{ $message }}</div>
        @enderror
        <select name="city_id" wire:model="city_id">
            <option value="">{{ trans('front/index.اختر المدينة') }}</option>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
        @error('city_id')
            <div class="text-danger" id="city_id-error">{{ $message }}</div>
        @enderror
        <select name="hall" wire:model="hall">
            <option value="">{{ trans('front/index.نوع الصالة') }}</option>
            <option value="indoor">{{ trans('front/index.داخلية') }}</option>
            <option value="outdoor">{{ trans('front/index.الخارجية') }}</option>
        </select>
        @error('hall')
            <div class="text-danger" id="hall-error">{{ $message }}</div>
        @enderror
        <textarea name="message" cols="30" rows="6" wire:model="message"
            placeholder="{{ trans('front/index.الرسالة') }}" required></textarea>
        @error('message')
            <div class="text-danger" id="name-error">{{ $message }}</div>
        @enderror
        <input type="submit" name="send" value="{{ trans('front/index.انشاء') }}">
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
