<div>
    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header d-flex w-100 justify-content-between align-items-center">
            <h5 class="mb-0">قائمة التصنيفات</h5>
            <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#create-category">
                انشاء
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
                    <th>الصورة</th>
                    <th>الاسم</th>
                    <th>الوصف</th>
                    <th class="div-center">الاجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td> <img src="{{ asset('storage/images/category/' . $category->image) }}" alt="Sub Image"
                                width="50"></td>
                        <td>{{ $category->trans_name }}</td>
                        <td>
                            <div class="message-container">
                                {{ Str::limit($category->trans_description, 150, '...') }}
                            </div>
                        </td>
                        <td class="div-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="div-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('categories.edit', $category->id) }}" class="dropdown-item">
                                            <i class="ph-note-pencil me-2"></i>
                                            تعديل
                                        </a>
                                        <a href="#" onclick="performDestroy({{ $category->id }},this)"
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
    <!-- /basic datatable -->
</div>
