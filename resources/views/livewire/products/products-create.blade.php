<div>
    <h1>إنشاء منتج جديد</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <label for="nameAr">الاسم بالعربية</label>
                <input type="text" class="form-control" id="nameAr" placeholder="اسم المنتج بالعربية"
                    wire:model="nameAr">
                @error('nameAr')
                    <div class="text-danger" id="nameAr-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label for="nameEn">الاسم بالإنجليزية</label>
                <input type="text" class="form-control" id="nameEn" placeholder="اسم المنتج بالإنجليزية"
                    wire:model="nameEn">
                @error('nameEn')
                    <div class="text-danger" id="nameEn-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="descreptionAr">الوصف بالعربية</label>
                <input type="text" class="form-control" id="descreptionAr" placeholder="الوصف بالعربية"
                    wire:model="descreptionAr">
                @error('descreptionAr')
                    <div class="text-danger" id="descreptionAr-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label for="descreptionEn">الوصف بالإنجليزية</label>
                <input type="text" class="form-control" id="descreptionEn" placeholder="الوصف بالإنجليزية"
                    wire:model="descreptionEn">
                @error('descreptionEn')
                    <div class="text-danger" id="descreptionEn-error">{{ $message }}</div>
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
            <div class="col-lg-6">
                <label>الفئة</label>
                <select class="form-select" id="category_id" name="category_id" wire:model="category_id">
                    <option value="">اختر الفئة</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->trans_name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger" id="category_id-error">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="form-group my-3">
            <button type="submit" class="btn btn-dark" id="create-button">إنشاء</button>
        </div>
    </form>

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('productAdded', (data) => {
                Livewire.emit('refreshProducts');
                Swal.fire({
                    icon: 'success',
                    title: 'تمت الإضافة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('productError', (data) => {
                Livewire.emit('refreshProducts');
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التخزين',
                    text: data.message
                });
            });
        });

        function hideErrors() {
            var nameArError = document.getElementById('nameAr-error');
            if (nameArError) {
                nameArError.style.display = 'none';
            }

            var nameEnError = document.getElementById('nameEn-error');
            if (nameEnError) {
                nameEnError.style.display = 'none';
            }

            var descreptionArError = document.getElementById('descreptionAr-error');
            if (descreptionArError) {
                descreptionArError.style.display = 'none';
            }

            var descreptionEnError = document.getElementById('descreptionEn-error');
            if (descreptionEnError) {
                descreptionEnError.style.display = 'none';
            }

            var categoryError = document.getElementById('category_id-error');
            if (categoryError) {
                categoryError.style.display = 'none';
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
