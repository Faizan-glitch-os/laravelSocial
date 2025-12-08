<div class="container d-flex justify-content-center my-5">
  <div class="card shadow-lg border-0 rounded-4" style="max-width: 700px; width: 100%;">
    <div class="card-header bg-primary text-white text-center rounded-top-4">
      <h4 class="mb-0">Create a New Post</h4>
    </div>

    <form wire:submit.prevent="createPost" action="/post/create" method="POST">
      @csrf
      <div class="card-body p-4">

        <!-- Title -->
        <div class="mb-4">
          <label for="post-title" class="form-label fw-bold">Title</label>
          <input maxlength="50" wire:model="title" required name="title" id="post-title"
                 class="form-control form-control-lg rounded-pill"
                 type="text" placeholder="Enter a catchy title" autocomplete="off" />
          <small class="text-muted">
            Characters left:
            <span class="fw-bold text-danger" x-text="50 - $wire.title.length"></span>
          </small>
          @error('title')
            <div class="alert alert-danger small mt-2">{{ $message }}</div>
          @enderror
        </div>

        <!-- Body -->
        <div class="mb-4">
          <label for="post-body" class="form-label fw-bold">Body Content</label>
          <textarea wire:model="body" required name="body" id="post-body"
                    class="form-control rounded-3" rows="6"
                    placeholder="Write your thoughts..."></textarea>
          @error('body')
            <div class="alert alert-danger small mt-2">{{ $message }}</div>
          @enderror
        </div>

        <!-- Submit -->
        <div class="text-center">
          <button wire:loading.attr="disabled" wire:target="title,body"
                  class="btn btn-success btn-lg px-5 rounded-pill shadow-sm" type="submit">
            <span wire:loading wire:target="title,body" class="spinner-border spinner-border-sm me-2"></span>
            Publish Post
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
