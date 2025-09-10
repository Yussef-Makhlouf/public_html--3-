<div>
    <h1>إنشاء الفئة</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="row my-3">
            <div class="col-lg-6">
                <label for="nameAr">الاسم بالعربي</label>
                <input type="text" class="form-control" id="nameAr" placeholder="الاسم" wire:model="nameAr">
                @error('nameAr')
                    <div class="text-danger" id="name-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="nameEn">الاسم بالﺇنجليزي</label>
                <input type="text" class="form-control" id="nameEn" placeholder="الاسم" wire:model="nameEn">
                @error('nameEn')
                    <div class="text-danger" id="name-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label for="descriptionAr">الوصف بالعربي</label>
                <textarea class="form-control" id="descriptionAr" placeholder="الوصف بالعربي" wire:model="descriptionAr"></textarea>
                @error('descriptionAr')
                    <div class="text-danger" id="descriptionAr-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="descriptionEn">الوصف بالانجليزي</label>
                <textarea class="form-control" id="descriptionEn" placeholder="الوصف بالانجليزي" wire:model="descriptionEn"></textarea>
                @error('descriptionEn')
                    <div class="text-danger" id="descriptionEn-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="image">الصورة </label>
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
            Livewire.on('CategoryAdded', (data) => {
                Livewire.emit('refreshCategories');
                Swal.fire({
                    icon: 'success',
                    name: 'تمت الإضافة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('CategoryError', (data) => {
                Livewire.emit('refreshCategories');
                Swal.fire({
                    icon: 'error',
                    name: 'فشلت عملية التخزين',
                    text: data.message
                });
            });
        });

        function hideErrors() {
            var nameError = document.getElementById('name-error');
            if (nameError) {
                nameError.style.display = 'none';
            }
            var descriptionError = document.getElementById('description-error');
            if (descriptionError) {
                descriptionError.style.display = 'none';
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
