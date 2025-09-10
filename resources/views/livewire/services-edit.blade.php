@php
use Illuminate\Support\Facades\Storage;
@endphp

<div>
    <h1>تعديل الخدمة</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() ?? [] as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="update" enctype="multipart/form-data">
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
            @if ($main_image)
                <img src="{{ $main_image->temporaryUrl() }}" alt="Main Image" class="img-thumbnail">
            @else
                <img src="{{ Storage::url('images/service/' . $service->main_image) }}" alt="Main Image"
                    class="img-thumbnail">
            @endif
            @error('main_image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label for="sub_images">الصور الفرعية</label>
            <input type="file" class="form-control" id="sub_images" multiple wire:model="sub_images">
            @if ($sub_images)
                @foreach ($sub_images ?? [] as $subImage)
                    <img src="{{ $subImage->temporaryUrl() }}" class="img-thumbnail" alt="Sub Image" width="100">
                @endforeach
            @else
                @foreach (json_decode($service->sub_images) ?? [] as $subImage)
                    <img src="{{ Storage::url('images/sub_images_service/' . $subImage) }}" class="img-thumbnail"
                        alt="Sub Image" width="100">
                @endforeach
            @endif

            @error('sub_images.*')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="video_type">Video Type</label>
            <select wire:model="videoType" class="form-select" wire:model='videoType'>
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
                <iframe class="frame-application my-3
                " width="350" height="200"
                    src="https://www.youtube.com/embed/{{ $service->video }}"
                    title="Embed YouTube Video from URL | PHP | JavaScript (jQuery)" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
        @elseif ($videoType === 'upload')
            <div class="form-group my-3">
                <label for="video" class="my-1">الفيديو</label>
                <input type="file" class="form-control" id="video" wire:model="video">

                <span
                    class="badge bg-light border-start border-width-3 text-body rounded-start-0 border-pink mt-3 mb-1">
                    معاينة فيديو الخدمة
                </span>
                <div class="video">
                    <video class="mb-3" width="320" controls>
                        <source src="{{ Storage::url('videos/service/' . $service->video) }}"
                            type="video/mp4">
                    </video>
                </div>
                @error('video')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @if ($video)
                    <span
                        class="badge bg-light border-start border-width-3 text-body rounded-start-0 border-purple mt-1 mb-1">
                        الفيديو الذي سيتم رفعه
                    </span>
                    <div class="form-group mb-3">
                        <video width="320" controls>
                            <source src="{{ $video->temporaryUrl() }}">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @endif
            </div>
        @endif

        <button type="submit" class="btn btn-primary">تعديل</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('serviceUpdated', (data) => {
                Swal.fire({
                    icon: 'success',
                    title: 'تم تحديث الخدمة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('serviceError', (data) => {
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التحديث',
                    text: data.message
                });
            });
        });
    </script>
</div>
