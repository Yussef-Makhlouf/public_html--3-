<div>
    <div class="card">
        <div class="card-header d-flex w-100 justify-content-between align-items-center">
            <h5 class="mb-0">قائمة المنتجات</h5>
            <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#create-product">
                انشاء منتج جديد
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
                    <th>الفئة</th>
                    <th class="div-center">الاجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td> <img src="{{ asset('storage/images/product/' . $product->image) }}" alt="Sub Image"
                                width="50"></td>
                        <td>{{ $product->trans_name }}</td>
                        <td width="20%">
                            {{ Str::limit($product->trans_descreption, 150, '...') }}
                        </td>
                        <td width="20%">{{ $product->category->trans_name ?? null }}</td>
                        <td class="div-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="div-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('products.edit', $product->id) }}" class="dropdown-item">
                                            <i class="ph-note-pencil me-2"></i>
                                            تعديل
                                        </a>
                                        <a href="#" onclick="performDestroy({{ $product->id }},this)"
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
