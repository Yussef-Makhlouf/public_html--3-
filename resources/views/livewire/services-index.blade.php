@php
use Illuminate\Support\Facades\Storage;
@endphp

<div>
    <div class="card">
        <div class="card-header d-flex w-100 justify-content-between align-items-center">
            <h5 class="mb-0">قائمة الخدمات</h5>
            <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#create-service">
                انشاء خدمة جديدة
            </button>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success m-3">
                {{ session('message') }}
            </div>
        @endif
        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الصورة الرئيسية</th>
                    <th>العنوان</th>
                    <th>الوصف</th>
                    <th>الصور الفرعية</th>
                    <th>الفيديو</th>
                    <th class="div-center">الاجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services ?? [] as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td> <img src="{{ Storage::url('images/service/' . $service->main_image) }}" alt="Sub Image"
                                width="50"></td>
                        <td>{{ $service->trans_title }}</td>
                        <td width="20%">{{ Str::limit($service->trans_description, 150, '...') }}</td>
                        <td>
                            <div class="sub_images d-flex flex-wrap justify-content-center gap-1" style="width: 150px;">
                                @foreach (json_decode($service->sub_images, true) ?? [] as $subImage)
                                    <div class="sub_img">
                                        <img src="{{ Storage::url('images/sub_images_service/' . $subImage) }}"
                                            alt="Sub Image" width="70" class="img-thumbnail">
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        <td>
                            @if (Str::contains($service->videoType, 'upload'))
                                <video width="150" height="100" controls>
                                    <source src="{{ Storage::url('videos/service/' . $service->video) }}"
                                        type="video/mp4">
                                </video>
                            @else
                                <iframe width="200" height="100"
                                    src="https://www.youtube.com/embed/{{ $service->video }}" frameborder="0"
                                    allowfullscreen></iframe>
                            @endif
                        </td>

                        <td class="div-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="div-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('services.edit', $service->id) }}" class="dropdown-item">
                                            <i class="ph-note-pencil me-2"></i>
                                            تعديل
                                        </a>
                                        <a href="#" onclick="performDestroy({{ $service->id }},this)"
                                            class="dropdown-item">
                                            <i class="ph-trash me-2"></i>
                                            حذف
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    =
</div>
