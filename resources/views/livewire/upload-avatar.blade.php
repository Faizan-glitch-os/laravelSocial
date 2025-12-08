<div class="container d-flex justify-content-center my-5">
    <div class="card shadow-lg" style="max-width: 500px; width: 100%;">
        <div class="card-header text-center bg-primary text-white">
            <h5 class="mb-0">Update Your Avatar</h5>
        </div>

        <form wire:submit.prevent="uploadAvatar" enctype="multipart/form-data">
            @csrf

            <div class="card-body"
                 x-data="{ uploading: false, progress: 0 }"
                 x-on:livewire-upload-start="uploading = true"
                 x-on:livewire-upload-finish="uploading = false"
                 x-on:livewire-upload-cancel="uploading = false"
                 x-on:livewire-upload-error="uploading = false"
                 x-on:livewire-upload-progress="progress = $event.detail.progress">

                <!-- Current Avatar -->
                <div class="text-center mb-4">
                    <img src="{{ auth()->user()->avatar ?? '/images/default-avatar.png' }}"
                         alt="Current Avatar"
                         class="rounded-circle border shadow-sm"
                         width="120" height="120">
                    <p class="text-muted mt-2">Current Avatar</p>
                </div>

                <!-- File Input -->
                <div class="mb-3">
                    <label for="avatar" class="form-label fw-bold">Choose a new picture</label>
                    <input wire:model="avatar" type="file" id="avatar"
                           class="form-control" accept="image/*" required>
                </div>

                <!-- Error -->
                @error('avatar')
                    <p class="alert alert-danger small">{{ $message }}</p>
                @enderror

                <!-- Preview -->
                @if ($avatar && str_starts_with($avatar->getMimeType(), 'image/'))
                    <div class="text-center my-3">
                        <p class="text-muted">Preview:</p>
                        <img src="{{ $avatar->temporaryUrl() }}"
                             class="rounded-circle border shadow-sm"
                             width="150" height="150">
                    </div>
                @endif

                <!-- Progress Bar -->
                <div x-show="uploading" class="progress mt-3" style="height: 8px;">
                    <div x-bind:style="`width: ${progress}%`"
                         class="progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                </div>
            </div>

            <!-- Submit -->
            <div class="card-footer text-center">
                <button wire:loading.attr="disabled" wire:target="avatar"
                        class="btn btn-primary px-4" type="submit">
                    <span class="spinner-border spinner-border-sm me-2" wire:loading wire:target="avatar"></span>
                    Upload Avatar
                </button>
            </div>
        </form>
    </div>
</div>
