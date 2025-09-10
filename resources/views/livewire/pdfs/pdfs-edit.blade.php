<div>
    <h1>تعديل العميل</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="update" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <label for="icon">الايقونة </label>
                <input type="file" class="form-control" id="icon" wire:model="icon">
                @if ($icon)
                    <img src="{{ $icon->temporaryUrl() }}" alt="pdf Image" class="img-thumbnail">
                @else
                    <img src="{{ asset('storage/icons/pdfs/' . $pdf->icon) }}" alt="pdf Image" class="img-thumbnail">
                @endif
                @error('icon')
                    <div class="text-danger" id="icon-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="lang">اللغة</label>
                <input type="text" class="form-control" id="lang" placeholder="اللغة" wire:model="lang">
                @error('lang')
                    <div class="text-danger" id="lang-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="file"> الملف </label>
                <input type="file" class="form-control" id="file" wire:model="file">
                @error('file')
                    <div class="text-danger" id="file-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="submitBtn d-flex justify-content-end">
            <button type="submit" class="btn btn-primary my-3">تعديل</button>
        </div>
    </form>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('pdfsError', (data) => {
                Livewire.emit('refreshPdf');
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التخزين',
                    text: data.message
                });
            });
        });
    </script>

</div>
