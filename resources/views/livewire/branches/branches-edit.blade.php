<div>
    <h1>تعديل الفرع</h1>

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
        <div class="form-group my-3">
            <label for="name">الاسم</label>
            <input type="text" class="form-control" id="name" value="{{ $name }}" wire:model="name">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">تعديل</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('brancheUpdated', (data) => {
                Swal.fire({
                    icon: 'success',
                    title: 'تم تحديث الفرع بنجاح',
                    text: data.message
                });
            });

            Livewire.on('brancheError', (data) => {
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التحديث',
                    text: data.message
                });
            });
        });
    </script>

</div>
