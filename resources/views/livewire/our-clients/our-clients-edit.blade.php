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
                <label for="image">الصورة </label>
                <input type="file" class="form-control" id="image" wire:model="image">
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" alt="aboutus Image" class="img-thumbnail">
                @else
                    <img src="{{ asset('storage/images/ourClient/' . $ourClient->image) }}" alt="aboutus Image"
                        class="img-thumbnail">
                @endif
            </div>
        </div>
        <div class="submitBtn d-flex justify-content-end">
            <button type="submit" class="btn btn-primary my-3">تعديل</button>
        </div>
    </form>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('ClientAdded', (data) => {
                Swal.fire({
                    icon: 'success',
                    title: 'تم تحديث التدوينة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('ClientError', (data) => {
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التحديث',
                    text: data.message
                });
            });
        });
    </script>

</div>
