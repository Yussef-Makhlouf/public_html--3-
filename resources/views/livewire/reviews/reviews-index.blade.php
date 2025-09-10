<div>
    <div class="card">
        <div class="card-header d-flex w-100 justify-content-between align-items-center">
            <h5 class="mb-0">قائمة الاراء</h5>
            <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#create-reviews">
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
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{ $review->id }}</td>
                        <td> <img src="{{ asset('storage/images/reviews/' . $review->image) }}" alt="Sub Image"
                                width="50"></td>
                        <td>{{ $review->trans_name }}</td>
                        <td width="20%">
                            {{ Str::limit($review->review, 150, '...') }}
                        </td>
                        <td class="div-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="div-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('reviews.edit', $review->id) }}" class="dropdown-item">
                                            <i class="ph-note-pencil me-2"></i>
                                            تعديل
                                        </a>
                                        <a href="#" onclick="performDestroy({{ $review->id }},this)"
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
