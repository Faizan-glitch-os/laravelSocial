<x-layout docTitle="Manage Avatar">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="/profile/upload-avatar" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="avatar" class="form-label">
                            Choose a picture to set as Avatar
                        </label>
                        <input type="file" name="avatar" id="avatar" class="form-control" required>
                    </div>
                    @error('avatar')
                    <p class="alert alert-danger small">{{ $message }} </p>
                    @enderror
                    <button class="btn btn-primary text-sm">Upload</button>
                </form>
            </div>
            
        </div>
    </div>
</x-layout>