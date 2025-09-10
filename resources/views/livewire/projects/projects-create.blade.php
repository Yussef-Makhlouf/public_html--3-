<div>
    <h1>إنشاء مشروع جديد</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="form-group my-3">
            <label for="titleAr">العنوان (عربي)</label>
            <input type="text" class="form-control" id="titleAr" placeholder="العنوان بالعربية" wire:model="titleAr">
            @error('titleAr')
                <div class="text-danger" id="titleAr-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="titleEn">العنوان (إنجليزي)</label>
            <input type="text" class="form-control" id="titleEn" placeholder="العنوان بالإنجليزية"
                wire:model="titleEn">
            @error('titleEn')
                <div class="text-danger" id="titleEn-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="descriptionAr">الوصف (عربي)</label>
            <input type="text" class="form-control" id="descriptionAr" placeholder="الوصف بالعربية"
                wire:model="descriptionAr">
            @error('descriptionAr')
                <div class="text-danger" id="descriptionAr-error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label for="client">العميل</label>
            <input type="text" class="form-control" id="client" placeholder="العميل"
                wire:model="client">
            @error('client')
                <div class="text-danger" id="client-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="descriptionEn">الوصف (إنجليزي)</label>
            <input type="text" class="form-control" id="descriptionEn" placeholder="الوصف بالإنجليزية"
                wire:model="descriptionEn">
            @error('descriptionEn')
                <div class="text-danger" id="descriptionEn-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="main_image">الصورة الرئيسية</label>
            <input type="file" class="form-control" id="main_image" wire:model="main_image" accept="image/*">
            @error('main_image')
                <div class="text-danger" id="main_image-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="sub_images">الصور الفرعية</label>
            <input type="file" class="form-control" id="sub_images" multiple wire:model="sub_images" accept="image/*">
            @error('sub_images')
                <div class="text-danger" id="sub_images-error">{{ $message }}</div>
            @enderror
            @error('sub_images.*')
                <div class="text-danger" id="sub_images-error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label for="date">التاريخ</label>
            <input type="date" class="form-control" id="date" wire:model="date">
            @error('date')
                <div class="text-danger" id="date-error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label>الخدمة</label>
            <select class="form-select " id="service_id" name="service_id" wire:model="service_id">
                <option value="">اختر الخدمة</option>
                    @foreach ($services ?? [] as $service)
                    <option value="{{ $service->id }}">{{ $service->trans_title }}</option>
                @endforeach
            </select>
            @error('service_id')
                <div class="text-danger" id="service_id-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <button type="submit" class="btn btn-dark" id="create-button">إنشاء</button>
        </div>
    </form>

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('ProjectAdded', (data) => {
                Livewire.emit('refreshProjects');
                Swal.fire({
                    icon: 'success',
                    title: 'تمت الإضافة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('ProjectError', (data) => {
                Livewire.emit('refreshProjects');
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التخزين',
                    text: data.message
                });
            });
        });
        var createButton = document.getElementById('create-button');
        createButton.addEventListener('click', function() {
            setTimeout(function() {
                hideErrors();
            }, 1000);
        });

        function hideErrors() {
            var titleArError = document.getElementById('titleAr-error');
            if (titleArError) {
                titleArError.style.display = 'none';
            }

            var titleEnError = document.getElementById('titleEn-error');
            if (titleEnError) {
                titleEnError.style.display = 'none';
            }

            var descriptionArError = document.getElementById('descriptionAr-error');
            if (descriptionArError) {
                descriptionArError.style.display = 'none';
            }

            var descriptionEnError = document.getElementById('descriptionEn-error');
            if (descriptionEnError) {
                descriptionEnError.style.display = 'none';
            }
        }
    </script>

</div>
