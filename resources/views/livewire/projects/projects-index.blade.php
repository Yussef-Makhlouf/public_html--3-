@php
use Illuminate\Support\Facades\Storage;
@endphp

<div>
    <div class="card">
        <div class="card-header d-flex w-100 justify-content-between align-items-center">
            <h5 class="mb-0">قائمة المشاريع</h5>
            <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#create-project">
                انشاء مشروع جديد
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
                    <th>العميل</th>
                    <th>التاريخ</th>
                    <th>الوصف</th>
                    <th>الخدمة</th>
                    <th>الصور الفرعية</th>
                    <th class="div-center">الاجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects ?? [] as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td> <img src="{{ Storage::url('images/projects/' . $project->main_image) }}" alt="Sub Image" width="50">
                        </td>
                        <td>{{ $project->trans_title }}</td>
                        <td>{{ $project->client }}</td>
                        <td>{{ $project->date }}</td>
                        <td width="20%">
                            {{ Str::limit($project->trans_description, 150, '...') }}
                        </td>
                        <td width="20%">{{ $project->service->trans_title ?? null }}</td>
                        <td>
                            <div class="sub_images d-flex flex-wrap justify-content-center gap-1" style="width: 150px;">
                                @foreach (json_decode($project->sub_images, true) ?? [] as $subImage)
                                    <div class="sub_img">
                                        <img src="{{ Storage::url('images/projects/sub_images/' . $subImage) }}" alt="Sub Image" width="70"
                                            class="img-thumbnail">
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        <td class="div-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="div-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('projects.edit', $project->id) }}" class="dropdown-item">
                                            <i class="ph-note-pencil me-2"></i>
                                            تعديل
                                        </a>
                                        <a href="#" onclick="performDestroy({{ $project->id }},this)"
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
</div>
