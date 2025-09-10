<div>
    <h1>تعديل المنتج</h1>

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
        <div class="form-group my-3">
            <label for="nameAr">الاسم (عربي)</label>
            <input type="text" class="form-control" id="nameAr" wire:model="nameAr">
            @error('nameAr')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="nameEn">الاسم (إنجليزي)</label>
            <input type="text" class="form-control" id="nameEn" wire:model="nameEn">
            @error('nameEn')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="descreptionAr">الوصف (عربي)</label>
            <input type="text" class="form-control" id="descreptionAr" wire:model="descreptionAr">
            @error('descreptionAr')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="descreptionEn">الوصف (إنجليزي)</label>
            <input type="text" class="form-control" id="descreptionEn" wire:model="descreptionEn">
            @error('descreptionEn')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="image">الصورة</label>
            <input type="file" class="form-control" id="image" wire:model="image">
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" alt="Main Image" class="img-thumbnail">
            @else
                <img src="{{ asset('storage/images/product/' . $product->image) }}" alt="Main Image"
                    class="img-thumbnail">
            @endif
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">تعديل</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('productUpdated', (data) => {
                Swal.fire({
                    icon: 'success',
                    title: 'تم تحديث المنتج بنجاح',
                    text: data.message
                });
            });

            Livewire.on('productError', (data) => {
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التحديث',
                    text: data.message
                });
            });
        });
    </script>
</div>
