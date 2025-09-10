<div>
    <h1>إنشاء تدوينة جديدة</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="saveBlog" enctype="multipart/form-data">
        <div class="row my-3">
            <div class="col-lg-6">
                <label for="nameEn">الاسم (بالإنجليزية)</label>
                <input type="text" class="form-control" id="nameEn" placeholder="اسم التدوينة بالإنجليزية"
                    wire:model="nameEn">
                @error('nameEn')
                    <div class="text-danger" id="nameEn-error">{{ $message }}</div>
                @enderror

            </div>

            <div class="col-lg-6">
                <label for="nameAr">الاسم (بالعربية)</label>
                <input type="text" class="form-control" id="nameAr" placeholder="اسم التدوينة بالعربية"
                    wire:model="nameAr">
                @error('nameAr')
                    <div class="text-danger" id="nameAr-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="contentEn">المحتوى (بالإنجليزية)</label>
                <textarea class="form-control" id="contentEn" placeholder="المحتوى بالإنجليزية" wire:model="contentEn"></textarea>
                @error('contentEn')
                    <div class="text-danger" id="contentEn-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label for="contentAr">المحتوى (بالعربية)</label>
                <textarea class="form-control" id="contentAr" placeholder="المحتوى بالعربية" wire:model="contentAr"></textarea>
                @error('contentAr')
                    <div class="text-danger" id="contentAr-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="authorEn">المؤلف (بالإنجليزية)</label>
                <input type="text" class="form-control" id="authorEn" placeholder="المؤلف بالإنجليزية"
                    wire:model="authorEn">
                @error('authorEn')
                    <div class="text-danger" id="authorEn-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label for="authorAr">المؤلف (بالعربية)</label>
                <input type="text" class="form-control" id="authorAr" placeholder="المؤلف بالعربية"
                    wire:model="authorAr">
                @error('authorAr')
                    <div class="text-danger" id="authorAr-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-6">
                <label for="image">الصورة</label>
                <input type="file" class="form-control" id="image" wire:model="image">
                @error('image')
                    <div class="text-danger" id="image-error">{{ $message }}</div>
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

        <div class="form-group my-3">
            <button type="submit" class="btn btn-dark" id="create-button">إنشاء</button>
        </div>
    </form>

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('BlogAdded', (data) => {
                Livewire.emit('refreshBlogs');
                Swal.fire({
                    icon: 'success',
                    title: 'تمت الإضافة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('BlogError', (data) => {
                Livewire.emit('refreshBlogs');
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التخزين',
                    text: data.message
                });
            });
        });

        function hideErrors() {
            var nameEnError = document.getElementById('nameEn-error');
            if (nameEnError) {
                nameEnError.style.display = 'none';
            }

            var nameArError = document.getElementById('nameAr-error');
            if (nameArError) {
                nameArError.style.display = 'none';
            }

            var contentEnError = document.getElementById('contentEn-error');
            if (contentEnError) {
                contentEnError.style.display = 'none';
            }

            var contentArError = document.getElementById('contentAr-error');
            if (contentArError) {
                contentArError.style.display = 'none';
            }

            var authorEnError = document.getElementById('authorEn-error');
            if (authorEnError) {
                authorEnError.style.display = 'none';
            }

            var authorArError = document.getElementById('authorAr-error');
            if (authorArError) {
                authorArError.style.display = 'none';
            }

            var imageError = document.getElementById('image-error');
            if (imageError) {
                imageError.style.display = 'none';
            }

            var dateError = document.getElementById('date-error');
            if (dateError) {
                dateError.style.display = 'none';
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
