<form wire:submit.prevent="uploadAvatar" action="/profile/upload-avatar" method="POST" enctype="multipart/form-data">
    @csrf

    <div
        x-data="{ uploading: false, progress: 0 }"
        x-on:livewire-upload-start="uploading = true"
        x-on:livewire-upload-finish="uploading = false"
        x-on:livewire-upload-cancel="uploading = false"
        x-on:livewire-upload-error="uploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress"
    >
        <!-- File Input -->
        <div class="mb-3">
            <label for="avatar" class="form-label">
            Choose a picture to set as Avatar
            </label>
            <input wire:model="avatar" type="file" name="avatar" id="avatar" class="form-control" accept="image/*" required>
        </div>

        {{-- Error --}}
        @error('avatar')
            <p class="alert alert-danger small">{{ $message }}</p>
        @enderror

        {{-- Preview --}}
        @if ($avatar)
            @if (str_starts_with($avatar->getMimeType(), 'image/'))
                <div class="my-3">
                    <p class="text-muted">Preview:</p>
                    <img src="{{ $avatar->temporaryUrl() }}" class="img-thumbnail" width="500">
                </div>
            @endif
        @endif
 
        <!-- Progress Bar -->
        <div x-show="uploading" class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
            <div x-bind:style="`width: ${progress}%`" class="progress-bar progress-bar-striped progress-bar-animated"></div>
        </div>
    </div>

    {{-- Submit --}}
    <button wire:loading.attr="disabled" wire:target="avatar" class="btn btn-primary" type="submit">
        <span role="status">Submit</span>
    </button>
</form>
