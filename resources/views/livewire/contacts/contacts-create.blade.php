<div>
    <h1>إنشاء اتصال جديد</h1>

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

    <form wire:submit.prevent="saveContact" enctype="multipart/form-data">
        <div class="row my-3">
            <div class="col-lg-6">
                <label for="name">الاسم</label>
                <input type="text" class="form-control" id="name" placeholder="اسم" wire:model="name">
                @error('name')
                    <div class="text-danger" id="name-error">{{ $message }}</div>
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
        <div class="row">
            <div class="col-lg-6">
                <label for="email">الايميل</label>
                <input type="text" class="form-control" id="email" placeholder="الايميل" wire:model="email">
                @error('email')
                    <div class="text-danger" id="email-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="mobile">الهاتف</label>
                <input type="text" class="form-control" id="mobile" placeholder="الهاتف" wire:model="mobile">
                @error('mobile')
                    <div class="text-danger" id="mobile-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label>الخدمة</label>
                <select class="form-select " id="service_id" name="service_id" wire:model="service_id">
                    <option value="">اختر الخدمة</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->trans_title }}</option>
                    @endforeach
                </select>
                @error('service_id')
                    <div class="text-danger" id="service_id-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group my-3">
            <button type="submit" class="btn btn-dark" id="create-button">إنشاء</button>
        </div>
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
