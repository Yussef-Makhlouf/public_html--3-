<div>
    <h1>إنشاء عرض تقديمي</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <label for="icon">الايقونة </label>
                <input type="file" class="form-control" id="icon" wire:model="icon">
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

        <div class="form-group my-3">
            <button type="submit" class="btn btn-dark" id="create-button">إنشاء</button>
        </div>
    </form>

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('PdfAdded', (data) => {
                Livewire.emit('refreshPdf');
                Swal.fire({
                    icon: 'success',
                    title: 'تمت الإضافة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('PdfError', (data) => {
                Livewire.emit('refreshPdf');
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التخزين',
                    text: data.message
                });
            });
        });

        function hideErrors() {
            var fileError = document.getElementById('file-error');
            if (fileError) {
                fileError.style.display = 'none';
            }
            var iconError = document.getElementById('icon-error');
            if (iconError) {
                iconError.style.display = 'none';
            }
            var langError = document.getElementById('lang-error');
            if (langError) {
                langError.style.display = 'none';
            }
        }

        var createButton = document.getElementById('create-button');
        createButton.addEventListener('click', function() {
            setTimeout(function() {
                hideErrors();
            }, 500);
        });
    </script>
</div>
