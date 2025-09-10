<div>
    <div class="card">
        @if (session()->has('message'))
            <div class="alert alert-success m-3">
                {{ session('message') }}
            </div>
        @endif
        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الايقونة</th>
                    <th>الملف</th>
                    <th>اللغة</th>
                    <th class="div-center">الاجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pdfs as $pdf)
                    <tr>
                        <td>{{ $pdf->id }}</td>
                        <td> <img src="{{ asset('storage/icons/pdfs/' . $pdf->icon) }}" alt="icon Image" width="50">
                        </td>
                        <td> <a href="{{ asset('storage/files/pdfs/' . $pdf->file) }}" class="btn btn-dark">
                                {{ $pdf->file }} </a>
                        </td>
                        <td> {{ $pdf->lang }}
                        </td>
                        <td class="div-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="div-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('pdfs.edit', $pdf->id) }}" class="dropdown-item">
                                            <i class="ph-note-pencil me-2"></i>
                                            تعديل
                                        </a>
                                        <a href="#" onclick="performDestroy({{ $pdf->id }},this)"
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
