<div>
    <h1>تعديل صفحة حولنا</h1>

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
                <label for="titleEn">العنوان (بالإنجليزية)</label>
                <input type="text" class="form-control" id="titleEn" placeholder="العنوان (بالإنجليزية)"
                    wire:model="titleEn">
                @error('titleEn')
                    <div class="text-danger" id="titleEn-error">{{ $message }}</div>
                @enderror

            </div>

            <div class="col-lg-6">
                <label for="titleAr">العنوان (بالعربية)</label>
                <input type="text" class="form-control" id="titleAr" placeholder="العنوان (بالعربية)"
                    wire:model="titleAr">
                @error('titleAr')
                    <div class="text-danger" id="titleAr-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="contentEn">المحتوى (بالإنجليزية)</label>
                <textarea class="form-control" id="contentEn" placeholder="المحتوى (بالإنجليزية)" wire:model="contentEn"></textarea>
                @error('contentEn')
                    <div class="text-danger" id="contentEn-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="contentAr">المحتوى (بالعربية)</label>
                <textarea class="form-control" id="contentAr" placeholder="المحتوى (بالعربية)" wire:model="contentAr"></textarea>
                @error('contentAr')
                    <div class="text-danger" id="contentAr-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="image">الصورة</label>
                <input type="file" class="form-control" id="image" wire:model="image">
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" alt="صورة حولنا" class="img-thumbnail">
                @else
                    <img src="{{ asset('storage/images/aboutus/' . $aboutUs->image) }}" alt="صورة حولنا"
                        class="img-thumbnail">
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">تعديل</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('AboutUsUpdated', (data) => {
                Swal.fire({
                    icon: 'success',
                    title: 'تم تحديث التدوينة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('AboutUsError', (data) => {
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التحديث',
                    text: data.message
                });
            });
        });
    </script>
</div>
