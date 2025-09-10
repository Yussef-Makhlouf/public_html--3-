<div>
    <div class="card">
        @if (session()->has('message'))
            <div class="alert alert-success m-3">
                {{ session('message') }}
            </div>
        @endif
        <div class="table-container">
            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th class="text-wrap"> تاريخ الانشاء </th>
                        <th class="text-wrap">اسم المشتري</th>
                        <th class="text-wrap">الهاتف</th>
                        <th class="text-wrap">البريد الإلكتروني</th>
                        <th class="text-wrap">تاريخ الانتهاء</th>
                        <th class="text-wrap">المنتج</th>
                        <th class="text-wrap">الخدمة</th>
                        <th class="text-wrap">العدد</th>
                        <th class="text-wrap">المساحة</th>
                        <th class="text-wrap">نوع التوصيل</th>
                        <th class="div-center text-wrap">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buys as $buy)
                        <tr>
                            <td width="" class="text-wrap">{{ $buy->created_at ?? null }}</td>
                            <td width="" class="text-wrap">{{ $buy->name ?? null }}</td>
                            <td class="text-wrap">{{ $buy->mobile ?? null }}</td>
                            <td class="text-wrap">{{ $buy->email ?? null }}</td>
                            <td class="text-wrap">{{ $buy->expire_date ?? null }}</td>
                            <td class="text-wrap">{{ $buy->product->trans_name ?? null }}</td>
                            <td class="text-wrap">{{ $buy->service->trans_title ?? null }}</td>
                            <td class="text-wrap">{{ $buy->count ?? null }}</td>
                            <td class="text-wrap">{{ $buy->area ?? null }}</td>
                            <td class="text-wrap">{{ $buy->delivery_type ?? null }}</td>
                            <td class="div-center">
                                <div class="d-inline-flex">
                                    <div class="dropdown">
                                        <a href="#" class="div-body" data-bs-toggle="dropdown">
                                            <i class="ph-list"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="{{ route('buys.edit', $buy->id) }}" class="dropdown-item">
                                                <i class="ph-note-pencil mx-2"></i>
                                                تعديل
                                            </a>
                                            <a href="{{ route('buys.show', $buy->id) }}" class="dropdown-item">
                                                <i class="ph-eye mx-2"></i>
                                                عرض
                                            </a>
                                            <a href="#" onclick="performDestroy({{ $buy->id }}, this)"
                                                class="dropdown-item">
                                                <i class="ph-trash mx-2"></i>
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
</div>
