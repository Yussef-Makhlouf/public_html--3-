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
                <label class="my-1" for="nameEn">الاسم بالإنجليزية</label>
                <input type="text" class="form-control" id="nameEn" placeholder="اسم التدوينة بالإنجليزية"
                    wire:model="nameEn">
                @error('nameEn')
                    <div class="text-danger" id="nameEn-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label class="my-1" for="nameAr">الاسم بالعربية</label>
                <input type="text" class="form-control" id="nameAr" placeholder="اسم التدوينة بالعربية"
                    wire:model="nameAr">
                @error('nameAr')
                    <div class="text-danger" id="nameAr-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label class="my-1" for="contentEn">المحتوى بالإنجليزية</label>
                <textarea class="form-control" id="contentEn" placeholder="المحتوى بالإنجليزية" wire:model="contentEn"></textarea>
                @error('contentEn')
                    <div class="text-danger" id="contentEn-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label class="my-1" for="contentAr">المحتوى بالعربية</label>
                <textarea class="form-control" id="contentAr" placeholder="المحتوى بالعربية" wire:model="contentAr"></textarea>
                @error('contentAr')
                    <div class="text-danger" id="contentAr-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label class="my-1" for="authorEn">المؤلف بالإنجليزية</label>
                <input type="text" class="form-control" id="authorEn" placeholder="المؤلف بالإنجليزية"
                    wire:model="authorEn">
                @error('authorEn')
                    <div class="text-danger" id="authorEn-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label class="my-1" for="authorAr">المؤلف بالعربية</label>
                <input type="text" class="form-control" id="authorAr" placeholder="المؤلف بالعربية"
                    wire:model="authorAr">
                @error('authorAr')
                    <div class="text-danger" id="authorAr-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label class="my-1" for="date">التاريخ</label>
                <input type="date" class="form-control" id="date" wire:model="date">
                @error('date')
                    <div class="text-danger" id="date-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6">
                <label class="my-1" for="image">الصورة</label>
                <input type="file" class="form-control" id="image" wire:model="image">
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" alt="صورة التدوينة" class="img-thumbnail">
                @else
                    <img src="{{ asset('storage/images/blog/' . $blog->image) }}" alt="صورة التدوينة"
                        class="img-thumbnail">
                @endif
                @error('image')
                    <div class="text-danger" id="image-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">تعديل</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('BlogUpdated', (data) => {
                Swal.fire({
                    icon: 'success',
                    title: 'تم تحديث التدوينة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('BlogError', (data) => {
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التحديث',
                    text: data.message
                });
            });
        });
    </script>

</div>
