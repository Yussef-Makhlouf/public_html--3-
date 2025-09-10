<div>
    <h1>إنشاء صفحة حولنا</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="saveAboutUs" enctype="multipart/form-data">
        <div class="row my-3">
            <div class="col-lg-6">
                <label for="titleEn">عنوان الصفحة (بالإنجليزية)</label>
                <input type="text" class="form-control" id="titleEn" placeholder="عنوان الصفحة (بالإنجليزية)"
                    wire:model="titleEn">
                @error('titleEn')
                    <div class="text-danger" id="titleEn-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label for="titleAr">عنوان الصفحة (بالعربية)</label>
                <input type="text" class="form-control" id="titleAr" placeholder="عنوان الصفحة (بالعربية)"
                    wire:model="titleAr">
                @error('titleAr')
                    <div class="text-danger" id="titleAr-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-6">
                <label for="contentEn">محتوى الصفحة (بالإنجليزية)</label>
                <textarea class="form-control" id="contentEn" placeholder="محتوى الصفحة (بالإنجليزية)" wire:model="contentEn"></textarea>
                @error('contentEn')
                    <div class="text-danger" id="contentEn-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label for="contentAr">محتوى الصفحة (بالعربية)</label>
                <textarea class="form-control" id="contentAr" placeholder="محتوى الصفحة (بالعربية)" wire:model="contentAr"></textarea>
                @error('contentAr')
                    <div class="text-danger" id="contentAr-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="image">الصورة</label>
                <input type="file" class="form-control" id="image" wire:model="image">
                @error('image')
                    <div class="text-danger" id="image-error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group my-3">
            <button type="submit" class="btn btn-dark" id="create-button">إنشاء</button>
        </div>
    </form>

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('AboutUsAdded', (data) => {
                Livewire.emit('refreshAboutUs');
                Swal.fire({
                    icon: 'success',
                    title: 'تمت الإضافة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('AboutUsError', (data) => {
                Livewire.emit('refreshAboutUs');
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التخزين',
                    text: data.message
                });
            });
        });

        function hideErrors() {
            var titleEnError = document.getElementById('titleEn-error');
            if (titleEnError) {
                titleEnError.style.display = 'none';
            }
            var titleArError = document.getElementById('titleAr-error');
            if (titleArError) {
                titleArError.style.display = 'none';
            }
            var contentEnError = document.getElementById('contentEn-error');
            if (contentEnError) {
                contentEnError.style.display = 'none';
            }
            var contentArError = document.getElementById('contentAr-error');
            if (contentArError) {
                contentArError.style.display = 'none';
            }
            var imageError = document.getElementById('image-error');
            if (imageError) {
                imageError.style.display = 'none';
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
