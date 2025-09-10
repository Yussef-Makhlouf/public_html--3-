<div>
    <h1>تعديل الرﺃي</h1>

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
                <label for="nameAr">العنوان (بالعربي)</label>
                <input type="text" class="form-control" id="nameAr" placeholder="العنوان (بالعربي)"
                    wire:model="nameAr">
                @error('nameAr')
                    <div class="text-danger" id="nameAr-error">{{ $message }}</div>
                @enderror

            </div>
            <div class="col-lg-6">
                <label for="nameEn">العنوان (بالإنجليزية)</label>
                <input type="text" class="form-control" id="nameEn" placeholder="العنوان (بالإنجليزية)"
                    wire:model="nameEn">
                @error('nameEn')
                    <div class="text-danger" id="nameEn-error">{{ $message }}</div>
                @enderror

            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-6">
                <label for="descreptionAr">الوصف (بالعربية)</label>
                <textarea class="form-control" id="descreptionAr" placeholder="الوصف (بالعربية)" wire:model="descreptionAr"></textarea>
                @error('descreptionAr')
                    <div class="text-danger" id="descreptionAr-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="descreptionEn">الوصف (بالإنجليزية) </label>
                <textarea class="form-control" id="descreptionEn" placeholder="الوصف (بالإنجليزية)" wire:model="descreptionEn"></textarea>
                @error('descreptionEn')
                    <div class="text-danger" id="descreptionEn-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="image">الصورة </label>
                <input type="file" class="form-control" id="image" wire:model="image">
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" alt="reviews Image" class="img-thumbnail">
                @else
                    <img src="{{ asset('storage/images/reviews/' . $reviews->image) }}" alt="reviews Image"
                        class="img-thumbnail">
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">تعديل</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('reviewsUpdated', (data) => {
                Swal.fire({
                    icon: 'success',
                    name: 'تم التحديث بنجاح',
                    text: data.message
                });
            });

            Livewire.on('reviewsError', (data) => {
                Swal.fire({
                    icon: 'error',
                    name: 'فشلت عملية التحديث',
                    text: data.message
                });
            });
        });
    </script>

</div>
