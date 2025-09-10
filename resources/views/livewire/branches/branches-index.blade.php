<div>
    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <div class="card-header d-flex w-100 justify-content-between align-items-center">
                <h5 class="mb-0">قائمة الافرع</h5>
                <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal"
                    data-bs-target="#create-bracnhes">
                    انشاء فرع جديدة
                </button>
            </div>
        </div>

        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th class="div-center">الاجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($branches as $branche)
                    <tr>
                        <td>{{ $branche->id }}</td>
                        <td>{{ $branche->name }}</td>
                        <td class="div-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="div-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('branches.edit', $branche->id) }}" class="dropdown-item">
                                            <i class="ph-note-pencil me-2"></i>
                                            تعديل
                                        </a>
                                        <a href="#" onclick="performDestroy({{ $branche->id }},this)"
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
