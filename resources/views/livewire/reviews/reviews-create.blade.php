<div>
    <h1>إنشاء رﺃي </h1>

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
    <form wire:submit.prevent="saveReviews" enctype="multipart/form-data">
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
            Livewire.on('reviewsAdded', (data) => {
                Livewire.emit('refreshReviews');
                Swal.fire({
                    icon: 'success',
                    name: 'تمت الإضافة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('ReviewsError', (data) => {
                Livewire.emit('reviewError');
                Swal.fire({
                    icon: 'error',
                    name: 'فشلت عملية التخزين',
                    text: data.message
                });
            });
        });

        function hideErrors() {
            var nameArError = document.getElementById('nameAr-error');
            if (nameArError) {
                nameArError.style.display = 'none';
            }
            var descreptionArError = document.getElementById('descreptionAr-error');
            if (descreptionArError) {
                descreptionArError.style.display = 'none';
            }
            var descreptionEnError = document.getElementById('descreptionEn-error');
            if (descreptionEnError) {
                descreptionEnError.style.display = 'none';
            }
            var nameEnError = document.getElementById('nameEn-error');
            if (nameEnError) {
                nameEnError.style.display = 'none';
            }
            var descreptionError = document.getElementById('descreption-error');
            if (descreptionError) {
                descreptionError.style.display = 'none';
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
