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
                    <th> الاسم </th>
                    <th> الهاتف </th>
                    <th> الايميل </th>
                    <th> التاريخ </th>
                    <th> المساحة </th>
                    <th> الشارع </th>
                    <th> الخدمة </th>
                    <th> المدينة </th>
                    <th> الصالة </th>
                    <th> الرسالة </th>
                    <th class="div-center">الاجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td width="9%">{{ $reservation->id }}</td>
                        <td width="9%">{{ $reservation->name }}</td>
                        <td width="9%">{{ $reservation->mobile }}</td>
                        <td width="9%">{{ $reservation->email }}</td>
                        <td width="10%">{{ $reservation->date }}</td>
                        <td width="1%">{{ $reservation->area }}</td>
                        <td width="9%">{{ $reservation->street }}</td>
                        <td width="9%">
                            {{ $reservation->service->trans_title ?? ' معرف الخدمة هو  ' . $reservation->service_id }}
                        </td>
                        <td width="9%">{{ $reservation->city->name }}</td>
                        <td width="9%">{{ $reservation->hall }}</td>
                        <td width="15%">
                            <div class="message-container">
                                {{ $reservation->message }}
                            </div>
                        </td>
                        <td class="div-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="div-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('reservations.edit', $reservation->id) }}"
                                            class="dropdown-item">
                                            <i class="ph-note-pencil me-2"></i>
                                            تعديل
                                        </a>
                                        <a href="#" onclick="performDestroy({{ $reservation->id }},this)"
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
