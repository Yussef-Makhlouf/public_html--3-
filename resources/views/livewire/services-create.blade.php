<div>
    <h1>إنشاء خدمة جديدة</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="saveService" enctype="multipart/form-data">
        <div class="form-group my-3">
            <label for="titleAr">العنوان (عربي)</label>
            <input type="text" class="form-control" id="titleAr" placeholder="العنوان بالعربية" wire:model="titleAr">
            @error('titleAr')
                <div class="text-danger" id="title-ar-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="titleEn">العنوان (إنجليزي)</label>
            <input type="text" class="form-control" id="titleEn" placeholder="العنوان بالإنجليزية"
                wire:model="titleEn">
            @error('titleEn')
                <div class="text-danger" id="title-en-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="descriptionAr">الوصف (عربي)</label>
            <input type="text" class="form-control" id="descriptionAr" placeholder="الوصف بالعربية"
                wire:model="descriptionAr">
            @error('descriptionAr')
                <div class="text-danger" id="description-ar-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="descriptionEn">الوصف (إنجليزي)</label>
            <input type="text" class="form-control" id="descriptionEn" placeholder="الوصف بالإنجليزية"
                wire:model="descriptionEn">
            @error('descriptionEn')
                <div class="text-danger" id="description-en-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="main_image">الصورة الرئيسية</label>
            <input type="file" class="form-control" id="main_image" wire:model="main_image">
        </div>

        <div class="form-group my-3">
            <label for="sub_images">الصور الفرعية</label>
            <input type="file" class="form-control" id="sub_images" multiple wire:model="sub_images">
        </div>

        <div class="form-group my-3">
            <label for="video_type">Video Type</label>
            <select wire:model="videoType" class="form-select">
                <option selected>-- اختر نوع الفيديو --</option>
                <option value="youtube">YouTube</option>
                <option value="upload">Upload</option>
            </select>
            @error('videoType')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        @if ($videoType === 'youtube')
            <div class="form-group my-3">
                <label for="youtube_link" class="my-1"> رابط الفيديو </label>
                <input type="text" id="youtube_link" placeholder="رابط الفيديو" wire:model="youtubeLink"
                    class="form-control">
                @error('youtubeLink')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        @elseif ($videoType === 'upload')
            <div class="form-group my-3">
                <label for="video" class="my-1">الفيديو</label>
                <input type="file" class="form-control" id="video" wire:model="video">
                @error('video')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        @endif
        <div class="form-group my-3">
            <button type="submit" class="btn btn-dark" id="create-button">إنشاء</button>
        </div>
    </form>

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('serviceAdded', (data) => {
                Livewire.emit('refreshServices');
                Swal.fire({
                    icon: 'success',
                    title: 'تمت الإضافة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('serviceError', (data) => {
                Livewire.emit('refreshServices');
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التخزين',
                    text: data.message
                });
            });
        });
        var createButton = document.getElementById('create-button');
        createButton.addEventListener('click', function() {
            setTimeout(function() {
                hideErrors();
            }, 1000);
        });

        function hideErrors() {
            var titleArError = document.getElementById('title-ar-error');
            if (titleArError) {
                titleArError.style.display = 'none';
            }

            var titleEnError = document.getElementById('title-en-error');
            if (titleEnError) {
                titleEnError.style.display = 'none';
            }

            var descriptionArError = document.getElementById('description-ar-error');
            if (descriptionArError) {
                descriptionArError.style.display = 'none';
            }

            var descriptionEnError = document.getElementById('description-en-error');
            if (descriptionEnError) {
                descriptionEnError.style.display = 'none';
            }
        }
    </script>
</div>
