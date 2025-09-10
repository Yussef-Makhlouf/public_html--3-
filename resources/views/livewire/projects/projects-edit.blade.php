@php
use Illuminate\Support\Facades\Storage;
@endphp

<div>
    <h1>تعديل المشروع</h1>

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
                <div class="text-danger" id="titleAr-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="titleEn">العنوان (إنجليزي)</label>
            <input type="text" class="form-control" id="titleEn" placeholder="العنوان بالإنجليزية"
                wire:model="titleEn">
            @error('titleEn')
                <div class="text-danger" id="titleEn-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="descriptionAr">الوصف (عربي)</label>
            <input type="text" class="form-control" id="descriptionAr" placeholder="الوصف بالعربية"
                wire:model="descriptionAr">
            @error('descriptionAr')
                <div class="text-danger" id="descriptionAr-error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group my-3">
            <label for="client">العميل</label>
            <input type="text" class="form-control" id="client" placeholder="العميل"
                wire:model="client">
            @error('client')
                <div class="text-danger" id="client-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="descriptionEn">الوصف (إنجليزي)</label>
            <input type="text" class="form-control" id="descriptionEn" placeholder="الوصف بالإنجليزية"
                wire:model="descriptionEn">
            @error('descriptionEn')
                <div class="text-danger" id="descriptionEn-error">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group my-3">
            <label for="date">التاريخ</label>
            <input type="date" class="form-control" id="date" wire:model="date">
            @error('date')
                <div class="text-danger" id="date-error">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group my-3">
            <label for="main_image">الصورة الرئيسية</label>
            <input type="file" class="form-control" id="main_image" wire:model="main_image">
            @if ($main_image)
                <img src="{{ $main_image->temporaryUrl() }}" alt="Main Image" class="img-thumbnail">
            @else
                <img src="{{ Storage::url('images/projects/' . $project->main_image) }}" alt="Main Image"
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
                @foreach (json_decode($project->sub_images) ?? [] as $subImage)
                    <img src="{{ Storage::url('images/projects/sub_images/' . $subImage) }}" class="img-thumbnail"
                        alt="Sub Image" width="100">
                @endforeach
            @endif
            @error('sub_images.*')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="col-lg-6">
                <label>الخدمة</label>
                <select class="form-select " id="service_id" name="service_id" wire:model="service_id">
                    <option value="">اختر الخدمة</option>
                    @foreach ($services ?? [] as $service)
                        <option value="{{ $service->id }}"
                            {{ $service->id == $project->service_id ? 'selected' : null }}>
                            {{ $service->trans_title }}</option>
                    @endforeach
                </select>
                @error('service_id')
                    <div class="text-danger" id="service_id-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">تعديل</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('projectUpdated', (data) => {
                Swal.fire({
                    icon: 'success',
                    title: 'تم تحديث المشروع بنجاح',
                    text: data.message
                });
            });

            Livewire.on('projectError', (data) => {
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التحديث',
                    text: data.message
                });
            });
        });
    </script>
</div>
