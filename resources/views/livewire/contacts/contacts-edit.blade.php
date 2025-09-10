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
                <label>الخدمة</label>
                <select class="form-select " id="service_id" name="service_id" wire:model="service_id">
                    <option value="">اختر الخدمة</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}"
                            {{ $service->id == $contact->service_id ? 'selected' : null }}>
                            {{ $service->trans_title }}</option>
                    @endforeach
                </select>
                @error('service_id')
                    <div class="text-danger" id="service_id-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary my-3">تعديل</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('ContactUpdated', (data) => {
                Swal.fire({
                    icon: 'success',
                    title: 'تم تحديث التدوينة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('ContactError', (data) => {
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التحديث',
                    text: data.message
                });
            });
        });
    </script>

</div>
