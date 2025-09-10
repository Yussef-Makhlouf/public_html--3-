<div>
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
    <form id="saveContact" wire:submit.prevent="saveContact" enctype="multipart/form-data">
        <div class="row">
            <div class="col-1">
                <label for="name">{{ trans('front/index.الاسم') }}</label>
                <input type="text" class="form-control" name="name" id="name"
                    placeholder="{{ trans('front/index.الاسم') }}" wire:model="name">
                @error('name')
                    <div class="text-danger" id="name-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-1">
                <label for="service_id">{{ trans('front/index.اختر الخدمة') }}</label>
                <select class="form-select" id="service_id" name="service_id" wire:model="service_id">
                    <option value="">{{ trans('front/index.اختر الخدمة') }}</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->trans_title }}</option>
                    @endforeach
                </select>
                @error('service_id')
                    <div class="text-danger" class="form-control" id="service_id-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label for="email">{{ trans('front/index.البريد الالكتروني') }}</label>
                <input type="email" class="form-control" name="email" id="email"
                    placeholder="{{ trans('front/index.البريد الالكتروني') }}" wire:model="email">
                @error('email')
                    <div class="text-danger" id="email-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-1">
                <label for="phone">{{ trans('front/index.الهاتف') }}</label>
                <input type="text" class="form-control" name="phone" id="phone"
                    placeholder=" {{ trans('front/index.الهاتف') }}" wire:model="mobile">
                @error('mobile')
                    <div class="text-danger" id="mobile-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label for="msg">{{ trans('front/index.الرسالة') }}</label>
                <textarea class="form-control" name="msg" id="msg" cols="30" rows="5"
                    placeholder="{{ trans('front/index.الرسالة') }}" wire:model="message"></textarea>
                @error('message')
                    <div class="text-danger" id="message-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <input type="submit" value="{{ trans('front/index.انشاء') }}" id="create-button">
    </form>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('ContactAdded', (data) => {
                Livewire.emit('refreshContacts');
                Swal.fire({
                    icon: 'success',
                    title: 'تمت الإضافة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('ContactError', (data) => {
                Livewire.emit('refreshContacts');
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

            var messageError = document.getElementById('message-error');
            if (messageError) {
                messageError.style.display = 'none';
            }
            var emailError = document.getElementById('email-error');
            if (emailError) {
                emailError.style.display = 'none';
            }
            var service_idError = document.getElementById('service_id-error');
            if (service_idError) {
                service_idError.style.display = 'none';
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
