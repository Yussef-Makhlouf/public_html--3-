<div>
    <h1>تعديل الفئة</h1>

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
                <label for="nameEn"> الاسم بالانجليزي</label>
                <input type="text" class="form-control" id="nameEn" placeholder="اسم الفئة بالانجليزي"
                    wire:model="nameEn">
                @error('nameEn')
                    <div class="text-danger" id="nameEn-error">{{ $message }}</div>
                @enderror

            </div>
            <div class="col-lg-6">
                <label for="nameAr"> الاسم بالعربي</label>
                <input type="text" class="form-control" id="nameAr" placeholder="اسم الفئة بالعربي"
                    wire:model="nameAr">
                @error('nameAr')
                    <div class="text-danger" id="nameAr-error">{{ $message }}</div>
                @enderror

            </div>

            <div class="col-lg-6">
                <label for="descriptionEn">الوصف بالانجليزي</label>
                <textarea class="form-control" id="descriptionEn" placeholder="الوصف بالانجليزي" wire:model="descriptionEn"></textarea>
                @error('descriptionEn')
                    <div class="text-danger" id="descriptionEn-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="descriptionAr">الوصف بالعربي</label>
                <textarea class="form-control" id="descriptionAr" placeholder="الوصف بالعربي" wire:model="descriptionAr"></textarea>
                @error('descriptionAr')
                    <div class="text-danger" id="descriptionAr-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="image">الصورة </label>
                <input type="file" class="form-control" id="image" wire:model="image">
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" alt="categories Image" class="img-thumbnail">
                @else
                    <img src="{{ asset('storage/images/category/' . $category->image) }}" alt="categories Image"
                        class="img-thumbnail">
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">تعديل</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('categoriesUpdated', (data) => {
                Swal.fire({
                    icon: 'success',
                    title: 'تم تحديث بنجاح',
                    text: data.message
                });
            });

            Livewire.on('categoriesError', (data) => {
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التحديث',
                    text: data.message
                });
            });
        });
    </script>

</div>
